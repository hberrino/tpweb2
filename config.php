<?php
// config.php
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DB', 'goth_store');
define('MYSQL_HOST', 'localhost');

$carpeta = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
define('BASE_URL', ($carpeta === '' ? '/' : $carpeta . '/'));
