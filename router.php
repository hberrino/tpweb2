<?php

$params = explode('/', $action);

switch ($params[0]) {
    
    case 'home':
        echo "Bienvenido a la tienda gótica.";
        break;

        case 'productos':
            require_once 'app/controllers/ProductoController.php';
            $controller = new ProductoController();
        
            if (isset($params[1]) && $params[1] === 'ver' && isset($params[2])) {
                $controller->verProducto($params[2]);
        
            } elseif (isset($params[1]) && $params[1] === 'crear') {
                $controller->mostrarFormulario();
        
            } elseif (isset($params[1]) && $params[1] === 'guardar') {
                $controller->guardarProducto();
            }
            elseif (isset($params[1]) && $params[1] === 'eliminar' && isset($params[2])) {
                    $controller->eliminarProducto($params[2]);
            }elseif (isset($params[1]) && $params[1] === 'editar' && isset($params[2])) {
                $controller->mostrarFormularioEditar($params[2]);
            
            } elseif (isset($params[1]) && $params[1] === 'actualizar') {
                $controller->actualizarProducto();
            } else {
                $controller->mostrarProductos(); 
            }
            break;

            case 'categorias':
                require_once 'app/controllers/CategoriaController.php';
                $controller = new CategoriaController();
            
                if (isset($params[1]) && $params[1] === 'ver' && isset($params[2])) {
                    $controller->verCategoria($params[2]);
                } else {
                    $controller->mostrarCategorias();
                }
                break;
                
                case 'login':
                    require_once 'app/controllers/AuthController.php';
                    $controller = new AuthController();
                    $controller->mostrarLogin();
                    break;
                
                case 'auth':
                    require_once 'app/controllers/AuthController.php';
                    $controller = new AuthController();
                    $controller->login();
                    break;
                
                case 'logout':
                    require_once 'app/controllers/AuthController.php';
                    $controller = new AuthController();
                    $controller->logout();
                    break;
    default:
        echo "404 - Página no encontrada.";
        break;
}