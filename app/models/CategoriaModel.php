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
    public function insertarCategoria($nombre) {
        $query = $this->db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $query->execute([$nombre]);
    }
    
    public function eliminarPorId($id) {
        $query = $this->db->prepare("DELETE FROM categorias WHERE categoria_id = ?");
        $query->execute([$id]);
    }
    
    public function actualizarCategoria($id, $nombre) {
        $query = $this->db->prepare("UPDATE categorias SET nombre = ? WHERE categoria_id = ?");
        $query->execute([$nombre, $id]);
    }
}