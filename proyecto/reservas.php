<?php
require_once 'includes/config.php';
require_once 'includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'cancha_id' => $_POST['cancha_id'],
        'cliente_id' => $_POST['cliente_id'],
        'fecha' => $_POST['fecha'],
        'hora_inicio' => $_POST['hora_inicio'],
        'hora_fin' => $_POST['hora_fin'],
        'precio' => $_POST['precio']
    ];
    
    if (crearReserva($datos)) {
        $mensaje = "Reserva realizada con éxito!";
    } else {
        $error = "Error al realizar la reserva. Intente nuevamente.";
    }
}

$cancha_id = isset($_GET['cancha_id']) ? $_GET['cancha_id'] : null;
require_once 'templates/header.php';
?>

<div class="container">
    <h1>Reservar Cancha</h1>
    
    <?php if (isset($mensaje)): ?>
    <div class="alert alert-success"><?php echo $mensaje; ?></div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="reservas.php">
        <div class="form-group">
            <label for="cancha_id">Cancha</label>
            <select class="form-control" id="cancha_id" name="cancha_id" required>
                <?php foreach (obtenerCanchas() as $cancha): ?>
                <option value="<?php echo $cancha['id']; ?>" <?php echo ($cancha['id'] == $cancha_id) ? 'selected' : ''; ?>>
                    <?php echo $cancha['nombre']; ?> (<?php echo ucfirst($cancha['tipo']); ?>)
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <input type="text" class="form-control" id="cliente_id" name="cliente_id" required>
        </div>
        
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="hora_inicio">Hora de inicio</label>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
            </div>
            <div class="form-group col-md-6">
                <label for="hora_fin">Hora de fin</label>
                <input type="time" class="form-control" id="hora_fin" name="hora_fin" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio total</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
    </form>
</div>

<?php require_once 'templates/footer.php'; ?>