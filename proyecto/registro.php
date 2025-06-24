<?php
require_once __DIR__ . '/includes/config.php';

if(estaAutenticado()) {
    header('Location: ' . SITE_URL);
    exit;
}

$errores = [];
$success = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = registrarUsuario($_POST);
    
    if(isset($resultado['error'])) {
        $errores[] = $resultado['error'];
    } else {
        $success = $resultado['success'];
        header('Refresh: 3; URL=' . SITE_URL . 'login.php');
    }
}

require_once __DIR__ . '/templates/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">Registro de Usuario</h2>
                    
                    <?php if(!empty($errores)): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errores as $error): ?>
                                <p class="mb-0"><?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($success): ?>
                        <div class="alert alert-success">
                            <p class="mb-0"><?= $success ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/templates/footer.php';
?>