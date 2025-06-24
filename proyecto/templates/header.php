<?php
// Verificación de configuración (esto debe ir PRIMERO, antes de cualquier HTML)
if (!defined('SITE_NAME')) {
    die('<div style="font-family: Arial; padding: 20px; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; max-width: 600px; margin: 50px auto;">
        <h3>Error de Configuración</h3>
        <p>El archivo <strong>config.php</strong> no se cargó correctamente.</p>
        <p>Soluciones:</p>
        <ol>
            <li>Asegúrate que existe <code>includes/config.php</code></li>
            <li>Verifica que contiene: <code>define(\'SITE_NAME\', \'Techsport360\');</code></li>
            <li>Inclúyelo ANTES de header.php: <code>require_once __DIR__ . \'/includes/config.php\';</code></li>
        </ol>
    </div>');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title ?? 'Techsport360') . ' | ' . htmlspecialchars(SITE_NAME); ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            padding-top: 60px;
            background-color: #f8f9fa;
            /* Fondo mejorado con imagen */
            background-image: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), 
                              url('https://img.freepik.com/fotos-premium/fondo-abstracto-rayas-diagonales-monocromaticas-blanco-gris_968500-142.jpg');
            background-size: cover;
            background-attachment: fixed;
            min-height: 100vh;
        }
        .navbar {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .nav-link {
            transition: all 0.3s;
            border-radius: 4px;
            padding: 8px 12px;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        .card {
            transition: all 0.3s ease;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <!-- Barra de navegación mejorada -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-futbol me-2"></i>
                <?php echo htmlspecialchars(SITE_NAME); ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home me-1"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="canchas.php">
                            <i class="fas fa-map-marked-alt me-1"></i> Canchas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservas.php">
                            <i class="fas fa-calendar-check me-1"></i> Reservas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <i class="fas fa-phone me-1"></i> Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container mt-4">

    <!-- Agrega esto en tu header.php donde quieras mostrar el menú de usuario -->
<?php if(estaAutenticado()): ?>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
            <?= $_SESSION['usuario']['nombre'] ?>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="reservas.php">Mis Reservas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </div>
<?php else: ?>
    <div class="d-flex gap-2">
        <a href="login.php" class="btn btn-primary"">Iniciar Sesión</a>
        <a href="registro.php" class="btn btn-primary">Registrarse</a>
    </div>
<?php endif; ?>