<?php
require_once 'db.php';

function obtenerCanchas($tipo = null) {
    $db = new Database();
    $conn = $db->getConnection();
    
    $sql = "SELECT * FROM canchas";
    if ($tipo) {
        $sql .= " WHERE tipo = :tipo";
    }
    
    $stmt = $conn->prepare($sql);
    if ($tipo) {
        $stmt->bindParam(':tipo', $tipo);
    }
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function verificarDisponibilidad($cancha_id, $fecha, $hora_inicio, $hora_fin) {
    $db = new Database();
    $conn = $db->getConnection();
    
    $sql = "SELECT id FROM reservas 
            WHERE cancha_id = :cancha_id 
            AND fecha = :fecha 
            AND (
                (:hora_inicio BETWEEN hora_inicio AND hora_fin) 
                OR (:hora_fin BETWEEN hora_inicio AND hora_fin)
                OR (hora_inicio BETWEEN :hora_inicio AND :hora_fin)
            )";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cancha_id', $cancha_id);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fin', $hora_fin);
    
    $stmt->execute();
    return $stmt->rowCount() == 0;
}

function crearReserva($datos) {
    $db = new Database();
    $conn = $db->getConnection();
    
    $sql = "INSERT INTO reservas (cancha_id, cliente_id, fecha, hora_inicio, hora_fin, precio, estado)
            VALUES (:cancha_id, :cliente_id, :fecha, :hora_inicio, :hora_fin, :precio, 'pendiente')";
    
    $stmt = $conn->prepare($sql);
    return $stmt->execute($datos);
}
?>

<?php
// includes/funciones.php

function conexionDB() {
    try {
        $conexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET NAMES utf8");
        return $conexion;
    } catch(PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

// Otras funciones que ya tengas...