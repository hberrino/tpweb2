<?php
// app/models/CategoriaModel.php

require_once 'app/models/Model.php';

class CategoriaModel extends Model {

    public function obtenerTodas() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    public function obtenerPorId($id) {
        $query = $this->db->prepare("SELECT * FROM categorias WHERE categoria_id = :id");
        $query->execute(['id' => $id]);

        $categoria = $query->fetch(PDO::FETCH_OBJ);

        return $categoria;
    }
}