<?php

$params = explode('/', $action);

switch ($params[0]) {
    
    case 'home':
        echo "Estás en la página principal de la tienda gótica.";
        break;

        case 'productos':
            require_once 'app/controllers/ProductoController.php';
            $controller = new ProductoController();
            
            if (isset($params[1]) && $params[1] === 'ver' && isset($params[2])) {
                $controller->verProducto($params[2]);
            } else {
                $controller->mostrarProductos(); 
            }
            break;

    case 'categorias':
        if (isset($params[1]) && $params[1] === 'ver' && isset($params[2])) {
            echo "Viendo los productos de la categoría ID: " . $params[2];
        } else {
            echo "Acá cargaremos el listado de todas las categorías.";
        }
        break;

    default:
        echo "404 - Página no encontrada en el abismo gótico.";
        break;
}