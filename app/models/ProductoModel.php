<?php
// app/models/ProductoModel.php
require_once 'app/models/Model.php';

class ProductoModel extends Model {

    // equivalente a findAll() en Springboot
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
}