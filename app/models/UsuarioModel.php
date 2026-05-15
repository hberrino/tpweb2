<?php

require_once 'app/models/Model.php';

class UsuarioModel extends Model {

    public function obtenerPorEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}