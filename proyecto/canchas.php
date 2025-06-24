<?php
require_once 'includes/config.php';
require_once 'includes/funciones.php';
require_once 'templates/header.php';

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null;
$canchas = obtenerCanchas($tipo);
?>

<div class="container">
    <h1>Canchas <?php echo $tipo ? ucfirst($tipo) : 'Disponibles'; ?></h1>
    
    <div class="row">
        <?php foreach ($canchas as $cancha): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo $cancha['imagen']; ?>" class="card-img-top" alt="<?php echo $cancha['nombre']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cancha['nombre']; ?></h5>
                    <p class="card-text">
                        <strong>Tipo:</strong> <?php echo ucfirst($cancha['tipo']); ?><br>
                        <strong>Precio por hora:</strong> $<?php echo $cancha['precio_hora']; ?><br>
                        <strong>Descripción:</strong> <?php echo $cancha['descripcion']; ?>
                    </p>
                    <a href="reservas.php?cancha_id=<?php echo $cancha['id']; ?>" class="btn btn-success">Reservar</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>