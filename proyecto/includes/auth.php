<?php
// includes/auth.php

function registrarUsuario($datos) {
    $conexion = conexionDB();
    
    // Validar y sanitizar datos
    $nombre = filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
    $email = filter_var($datos['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($datos['password'], PASSWORD_DEFAULT);
    
    // Verificar si el email ya existe
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    
    if($stmt->rowCount() > 0) {
        return ['error' => 'El email ya está registrado'];
    }
    
    // Insertar nuevo usuario
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    if($stmt->execute([$nombre, $email, $password])) {
        return ['success' => 'Usuario registrado correctamente'];
    }
    
    return ['error' => 'Error al registrar el usuario'];
}

function loginUsuario($email, $password) {
    $conexion = conexionDB();
    
    $stmt = $conexion->prepare("SELECT id, nombre, email, password FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nombre' => $usuario['nombre'],
            'email' => $usuario['email']
        ];
        return true;
    }
    
    return false;
}

function estaAutenticado() {
    return isset($_SESSION['usuario']);
}

function cerrarSesion() {
    session_destroy();
    header('Location: ' . URL_ROOT . '/index.php');
    exit;
}