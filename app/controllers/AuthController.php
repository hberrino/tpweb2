<?php

require_once 'app/models/UsuarioModel.php';

class AuthController {

    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function mostrarLogin() {
        require 'app/views/login.phtml';
    }

    public function login() {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->obtenerPorEmail($email);

        // PDF: password_verify :contentReference[oaicite:2]{index=2}
        if ($user && password_verify($password, $user->password)) {

            session_start();
            $_SESSION['USER_ID'] = $user->user_id;

            header("Location: /tpweb2/productos");
            exit;

        } else {
            $error = "Credenciales incorrectas";
            require 'app/views/login.phtml';
        }
    }

    public function logout() {
        session_start();
        session_destroy();

        header("Location: /tpweb2/login");
        exit;
    }
}