<?php
// /includes/config.php
session_start();

// Configuración básica obligatoria
define("SITE_NAME", "Techsports360"); // Nombre exacto que busca tu sistema
define('SITE_URL', 'http://localhost/Proyecto/');

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'techsport360');

// Configuración de rutas
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', SITE_URL);

// Incluir funciones (asegúrate que el archivo existe)
require_once __DIR__ . '/funciones.php';
require_once __DIR__ . '/auth.php'; 