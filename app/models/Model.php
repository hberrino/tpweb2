<?php
// app/models/Model.php

class Model {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO(
                "mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8", 
                MYSQL_USER, 
                MYSQL_PASS
            );
        } catch (PDOException $e) {

            if ($e->getCode() == 1049) {
                $this->deploy();
            } else {
                die("Error de conexión: " . $e->getMessage());
            }
        }
    }

    private function deploy() {
        $pdo = new PDO("mysql:host=".MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
        
        $pdo->exec("CREATE DATABASE IF NOT EXISTS " . MYSQL_DB . " DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci");
        $pdo->exec("USE " . MYSQL_DB);
        
        $sql = file_get_contents('goth_store.sql');
        
        $pdo->exec($sql);
        
        $this->db = $pdo;
        
    }
}