<?php
// app/controllers/ProductoController.php
require_once 'app/models/ProductoModel.php';
require_once 'app/models/CategoriaModel.php';

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
  
        $producto = $this->model->obtenerPorId($id);

        if (!$producto) {
            echo "<h1>Error 404: El producto no existe en el catálogo.</h1>";
            return;
        }

        require 'app/views/detalle.phtml';
    }
    public function mostrarFormulario() {

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->obtenerTodas();
    
        require 'app/views/formulario_prod.phtml';
    }
    public function guardarProducto() {

        if (empty($_POST['nombre']) || empty($_POST['precio']) || empty($_POST['categoria_id'])) {
            echo "Faltan datos obligatorios";
            return;
        }
    
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria_id = $_POST['categoria_id'];
    
        $this->model->insertarProducto($nombre, $precio, $categoria_id);
    
        header("Location: /tpweb2/productos");
        exit;
    }
    public function eliminarProducto($id) {

        $this->model->eliminarPorId($id);
    
        header("Location: /tpweb2/productos");
        exit;
    }
    public function mostrarFormularioEditar($id) {

        $producto = $this->model->obtenerPorId($id);
    
        if (!$producto) {
            echo "Producto no encontrado";
            return;
        }
    
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->obtenerTodas();
    
        require 'app/views/formulario_prod_edit.phtml';
    }
    public function actualizarProducto() {

        if (empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['precio']) || empty($_POST['categoria_id'])) {
            echo "Faltan datos";
            return;
        }
    
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria_id = $_POST['categoria_id'];
    
        $this->model->actualizarProducto($id, $nombre, $precio, $categoria_id);
    
        header("Location: /tpweb2/productos");
        exit;
    }
}