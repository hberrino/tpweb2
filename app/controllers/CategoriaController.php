<?php
// app/controllers/CategoriaController.php

require_once 'app/models/CategoriaModel.php';
require_once 'app/models/ProductoModel.php';

class CategoriaController {

    private $categoriaModel;
    private $productoModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
        $this->productoModel = new ProductoModel();
    }

    public function mostrarCategorias() {
        $categorias = $this->categoriaModel->obtenerTodas();

        require 'app/views/categorias.phtml';
    }

    public function verCategoria($id) {

        $categoria = $this->categoriaModel->obtenerPorId($id);

        if (!$categoria) {
            echo "<h1>404 - La categoría no existe</h1>";
            return;
        }

        $productos = $this->productoModel->obtenerPorCategoria($id);

        $titulo = "Productos de la categoría: " . $categoria->nombre;
        $esCategoria = true;

        require 'app/views/productos.phtml';
    }
}