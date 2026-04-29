<?php
// app/models/ProductoModel.php
require_once 'app/models/Model.php';

class ProductoModel extends Model {

    // equivalente a findAll() en Springboot que ya viene en repository 
    public function obtenerTodos() {
        $query = $this->db->prepare(
            "SELECT p.*, c.nombre AS categoria_nombre 
             FROM productos p 
             JOIN categorias c ON p.categoria_id = c.categoria_id"
        );
        
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }
    // Equivalente a un findById()
    public function obtenerPorId($id) {
        $query = $this->db->prepare(
            "SELECT p.*, c.nombre AS categoria_nombre 
             FROM productos p 
             JOIN categorias c ON p.categoria_id = c.categoria_id 
             WHERE p.producto_id = :id"
        );
        
        $query->execute(['id' => $id]);
        
        $producto = $query->fetch(PDO::FETCH_OBJ);
        
        return $producto;
    } 
}