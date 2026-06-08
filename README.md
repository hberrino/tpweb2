INTEGRANTES: Hernan Berrino Malaccorto. Correo: berrinohernan@gmail.com
Temática del TPE: Tienda de Indumentaria y Accesorios tematica gótica.
Descripción: Sistema de gestión para un e-commerce de estética gótica. La base de datos modela una relación de 1 a N, donde una categoría genérica (como Ropa, Piercings o Accesorios) puede contener múltiples productos específicos, pero cada producto pertenece a una sola categoría.

El proyecto está desarrollado en PHP siguiendo una arquitectura tipo MVC (Modelo, Vista, Controlador).

- Los controllers manejan la lógica de la aplicación y las rutas.
- Los models se encargan del acceso a datos mediante PDO y MySQL.
- Las views (.phtml) renderizan la interfaz y muestran la información.

El enrutamiento se realiza mediante `.htaccess`, permitiendo el uso de URLs semánticas como:

- /productos
- /productos/ver/{id}
- /categorias
- /categorias/ver/{id}

Las URLs del sistema se arman con la constante BASE_URL definida en config.php. Por eso el proyecto puede estar dentro de una subcarpeta de htdocs sin depender de que la carpeta se llame exactamente tpweb2.

---

Para ejecutar el proyecto:

- XAMPP (Apache y MySQL)
- PHP 8 o superior
- Navegador web

1. Clonar el repositorio:
   git clone https://github.com/hberrino/tpweb2/

2. Copiar la carpeta del proyecto dentro de:
   C:\xampp\htdocs\

   La carpeta puede llamarse tpweb2 u otro nombre, por ejemplo:
   C:\xampp\htdocs\tpweb2
   C:\xampp\htdocs\pruebaweb2

3. Iniciar XAMPP:
   - Apache
   - MySQL

4. Importar DB:
   - Importar goth_store.sql desde http://localhost/phpmyadmin/

5. Acceder desde el navegador:
   http://localhost/nombre-de-la-carpeta

   Ejemplos:
   http://localhost/tpweb2
   http://localhost/pruebaweb2

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
http://localhost/nombre-de-la-carpeta/login

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
