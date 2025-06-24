<?php
// Versión corregida con rutas absolutas
require_once __DIR__ . '/includes/config.php';

// Destruir la sesión completamente
session_unset();    // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión

// Redireccionar al login con URL absoluta
header('Location: ' . SITE_URL . 'login.php');
exit;