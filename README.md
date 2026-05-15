INTEGRANTES: Hernan Berrino Malaccorto. Correo: berrinohernan@gmail.com
Temática del TPE: Tienda de Indumentaria y Accesorios tematica gótica.
Descripción: Sistema de gestión para un e-commerce de estética gótica. La base de datos modela una relación de 1 a N, donde una categoría genérica (como Ropa, Piercings o Accesorios) puede contener múltiples productos específicos, pero cada producto pertenece a una sola categoría.
---

## Estructura del Proyecto

El proyecto está desarrollado en PHP siguiendo una arquitectura tipo MVC (Modelo, Vista, Controlador).

- Los controllers manejan la lógica de la aplicación y las rutas.
- Los models se encargan del acceso a datos mediante PDO y MySQL.
- Las views (.phtml) renderizan la interfaz y muestran la información.

El enrutamiento se realiza mediante `.htaccess`, permitiendo el uso de URLs semánticas como:

- /productos
- /productos/ver/{id}
- /categorias
- /categorias/ver/{id}

---

## Requisitos

Para ejecutar el proyecto se necesita:

- XAMPP (Apache y MySQL)
- PHP 8 o superior
- Navegador web

---

## Instalación y ejecución

1. Clonar el repositorio:
   git clone <url-del-repo>

2. Copiar la carpeta del proyecto dentro de:
   C:\xampp\htdocs\

3. Iniciar XAMPP:
   - Apache
   - MySQL

4. Acceder desde el navegador:
   http://localhost/tpweb2

---

## Base de datos

El sistema cuenta con auto-creación de base de datos.

Si la base no existe:
- Se crea automáticamente
- Se ejecuta el script goth_store.sql
- Se generan las tablas necesarias

La configuración se encuentra en el archivo config.php.

---

## Usuario administrador

Para acceder a las funciones de administración:

Usuario: webadmin  
Contraseña: admin  

Login:
http://localhost/tpweb2/login

---

## Funcionalidades

### Acceso público
- Listado de productos
- Detalle de producto
- Listado de categorías
- Productos por categoría

### Acceso administrador (requiere login)
- Agregar productos
- Editar productos
- Eliminar productos
- Agregar categorías
- Editar categorías
- Eliminar categorías

---

## Seguridad

- Se utiliza sesión ($_SESSION) para controlar acceso
- Las contraseñas se almacenan con password_hash()
- La validación se realiza con password_verify()
- Las rutas de administración están protegidas

---

## Notas

- Se utiliza PDO para la conexión a base de datos
- Se respeta la separación de responsabilidades (MVC)
- Las acciones de modificación solo están disponibles para usuarios autenticados