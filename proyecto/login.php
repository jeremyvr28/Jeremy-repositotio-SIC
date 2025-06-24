<?php
require_once __DIR__ . '/includes/config.php';

if(estaAutenticado()) {
    header('Location: ' . SITE_URL);
    exit;
}

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    if(loginUsuario($email, $password)) {
        header('Location: ' . SITE_URL);
        exit;
    } else {
        $error = 'Email o contraseña incorrectos';
    }
}

require_once __DIR__ . '/templates/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">Iniciar Sesión</h2>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger">
                            <p class="mb-0"><?= $error ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Cambio clave: acción del formulario con URL completa -->
                    <form method="POST" action="<?= SITE_URL ?>login.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </form>
                    
                    <!-- Cambio: URL completa para el enlace -->
                    <div class="text-center mt-3">
                        <p>¿No tienes una cuenta? <a href="<?= SITE_URL ?>registro.php">Regístrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/templates/footer.php';
?>