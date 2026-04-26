<?php
// app/controllers/ProductoController.php
require_once 'app/models/ProductoModel.php';

class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }

    public function mostrarProductos() {
        // 1. Pedimos los datos al Modelo
        $productos = $this->model->obtenerTodos();

        // 2. Llamamos a la Vista
        require 'app/views/productos.phtml';
    }
}