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

        if ($user && password_verify($password, $user->password)) {

            session_start();
            $_SESSION['USER_ID'] = $user->user_id;

            header("Location: " . BASE_URL . "productos");
            exit;

        } else {
            $error = "Credenciales incorrectas";
            require 'app/views/login.phtml';
        }
    }

    public function logout() {
        session_start();
        session_destroy();

        header("Location: " . BASE_URL . "login");
        exit;
    }
}
