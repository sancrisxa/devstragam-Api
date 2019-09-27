<?php
require 'environment.php';
global $config;
$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/projects/b7web/php-do-zero-ao-profissional/Modulo-16-PHP-Super-Avancado/estrutura-mvc/");
    $config['dbname'] = 'estrutura_mvc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
    $config['jwt_secret_key'] = 'abC123!';

} else {
    define("BASE_URL", "http://localhost/estrutura-mvc/");
    // $config['dbname'] = 'estrutura-mvc';
    // $config['host'] = 'localhost';
    // $config['dbuser'] = 'root';
    // $config['dbpass'] = '';
    // $config['jwt_secret_key'] = 'abC123!';
}

global $db;

try {
    $db = new PDO("mysql:dbname" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
} 