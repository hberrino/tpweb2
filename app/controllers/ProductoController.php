<?php
// app/controllers/ProductoController.php
require_once 'app/models/ProductoModel.php';

class ProductoController {
    private $model; // entity de Springboot

    public function __construct() {
        $this->model = new ProductoModel();
    }

    public function mostrarProductos() {

        $productos = $this->model->obtenerTodos();

        require 'app/views/productos.phtml';
    }
    public function verProducto($id) {
        // Pedimos un solo producto al modelo
        $producto = $this->model->obtenerPorId($id);

        // Si el producto no existe (ej: pusieron un ID que no está en la base), cortamos
        if (!$producto) {
            echo "<h1>Error 404: El producto no existe en el catálogo.</h1>";
            return;
        }

        // Si existe, llamamos a la vista del detalle
        require 'app/views/detalle.phtml';
    }
}