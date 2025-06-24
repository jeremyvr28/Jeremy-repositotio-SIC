</div> <!-- Cierre del container -->

<!-- Footer -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fas fa-futbol me-2"></i> <?php echo SITE_NAME; ?></h5>
                <p class="text-muted">Sistema de gestión de reservas deportivas.</p>
            </div>
            <div class="col-md-4" id="contacto">
                <h5>Contacto</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Av. Deportiva 123</li>
                    <li><i class="fas fa-phone me-2"></i> +51 123 456 789</li>
                    <li><i class="fas fa-envelope me-2"></i> info@canchasdeportivas.com</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Horario</h5>
                <ul class="list-unstyled">
                    <li>Lunes a Viernes: 8am - 10pm</li>
                    <li>Sábados: 7am - 11pm</li>
                    <li>Domingos: 7am - 9pm</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts personalizados -->
<script>
    // Función para calcular automáticamente el precio al seleccionar horas
    document.addEventListener('DOMContentLoaded', function() {
        const canchaSelect = document.getElementById('cancha_id');
        const horaInicio = document.getElementById('hora_inicio');
        const horaFin = document.getElementById('hora_fin');
        const precioInput = document.getElementById('precio');
        
        if(canchaSelect && horaInicio && horaFin && precioInput) {
            canchaSelect.addEventListener('change', calcularPrecio);
            horaInicio.addEventListener('change', calcularPrecio);
            horaFin.addEventListener('change', calcularPrecio);
            
            function calcularPrecio() {
                // Aquí deberías implementar la lógica para calcular el precio basado en:
                // 1. La cancha seleccionada (precio por hora)
                // 2. La diferencia entre hora inicio y fin
                // Ejemplo básico:
                const horas = (new Date(`1970-01-01T${horaFin.value}`) - new Date(`1970-01-01T${horaInicio.value}`)) / (1000 * 60 * 60);
                if(horas > 0) {
                    precioInput.value = (horas * 50).toFixed(2); // 50 es un valor ejemplo
                }
            }
        }
    });
</script>
</body>
</html>