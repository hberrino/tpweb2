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

    private function checkAuth() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
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
        $vieneDeCategoria = true;

        require 'app/views/productos.phtml';
    }

    public function mostrarFormulario() {
        $this->checkAuth();
        require 'app/views/formulario_categoria.phtml';
    }

    public function guardarCategoria() {
        $this->checkAuth();

        if (empty($_POST['nombre'])) {
            echo "Falta el nombre";
            return;
        }

        $this->categoriaModel->insertarCategoria($_POST['nombre']);

        header("Location: " . BASE_URL . "categorias");
        exit;
    }

    public function eliminarCategoria($id) {
        $this->checkAuth();

        $this->categoriaModel->eliminarPorId($id);

        header("Location: " . BASE_URL . "categorias");
        exit;
    }

    public function mostrarFormularioEditar($id) {
        $this->checkAuth();

        $categoria = $this->categoriaModel->obtenerPorId($id);

        if (!$categoria) {
            echo "Categoría no encontrada";
            return;
        }

        require 'app/views/formulario_categoria_edit.phtml';
    }

    public function actualizarCategoria() {
        $this->checkAuth();

        if (empty($_POST['id']) || empty($_POST['nombre'])) {
            echo "Faltan datos";
            return;
        }

        $this->categoriaModel->actualizarCategoria(
            $_POST['id'],
            $_POST['nombre']
        );

        header("Location: " . BASE_URL . "categorias");
        exit;
    }
}
