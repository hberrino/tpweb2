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
    public function obtenerPorCategoria($id) {
        $query = $this->db->prepare(
            "SELECT p.*, c.nombre AS categoria_nombre 
             FROM productos p 
             JOIN categorias c ON p.categoria_id = c.categoria_id
             WHERE p.categoria_id = :id"
        );
    
        $query->execute(['id' => $id]);
    
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $productos;
    }
    public function insertarProducto($nombre, $precio, $categoria_id) {

        $query = $this->db->prepare(
            "INSERT INTO productos (nombre, precio, categoria_id)
             VALUES (?, ?, ?)"
        );
    
        $query->execute([$nombre, $precio, $categoria_id]);
    }
    public function eliminarPorId($id) {

        $query = $this->db->prepare("DELETE FROM productos WHERE producto_id = ?");
        $query->execute([$id]);
    }
    public function actualizarProducto($id, $nombre, $precio, $categoria_id) {

        $query = $this->db->prepare(
            "UPDATE productos 
             SET nombre = ?, precio = ?, categoria_id = ?
             WHERE producto_id = ?"
        );
    
        $query->execute([$nombre, $precio, $categoria_id, $id]);
    }
}