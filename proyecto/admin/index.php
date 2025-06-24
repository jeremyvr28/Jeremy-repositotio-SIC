<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/templates/header.php';
?>

<main class="container mt-4">
    <!-- Hero Section Mejorada -->
    <section class="hero-section text-center py-5 mb-5 rounded-3" style="
        background: linear-gradient(135deg,rgb(109, 167, 125) 0%,rgb(179, 179, 179) 100%);
        color: white;
        box-shadow: 0 4px 20px rgb(255, 255, 255);
    ">

<h1 class="display-4 fw-bold mb-3">Techsport360</h1>
        <p class="lead mb-4">Reserva canchas deportivas en simples pasos</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#canchas" class="btn btn-outline-light btn-lg px-4">Ver Canchas</a>
            <a href="#" class="btn btn-outline-light btn-lg px-4">Cómo Reservar</a>
        </div>
    </section>

    <!-- Sección de Canchas -->
    <section id="canchas" class="mb-5">
        <h2 class="text-center mb-4 fw-bold"> </h2>
        <div class="row g-4">
            <?php
            // Array con datos de las canchas
            $canchas = [
                [
                    'tipo' => 'futbol',
                    'titulo' => 'Fútbol',
                    'descripcion' => 'Canchas profesionales de césped sintético.',
                    'imagen' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=800',
                    'color' => 'success'
                ],
                [
                    'tipo' => 'tenis',
                    'titulo' => 'Tenis',
                    'descripcion' => 'Canchas de arcilla y cemento.',
                    'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHTqMkWntK30hgpq3Jv3ueZxPenjpzp5xjvg&s',
                    'color' => 'danger'
                ],
                [
                    'tipo' => 'padel',
                    'titulo' => 'Pádel',
                    'descripcion' => 'Canchas cubiertas y al aire libre.',
                    'imagen' => 'https://cdn.shopify.com/s/files/1/0798/8746/6842/files/Capital-Sports-Padel-Center-Caracas_480x480.jpg?v=1712320724',
                    'color' => 'primary'
                ],
                [
                    'tipo' => 'voley',
                    'titulo' => 'Vóley',
                    'descripcion' => 'Canchas de arena y piso duro.',
                    'imagen' => 'https://sportsurfaces.com/wp-content/uploads/2020/10/how-to-build-a-sand-volleyball-court.jpg',
                    'color' => 'warning'
                ]
            ];

            foreach ($canchas as $cancha) {
                echo '
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="position-relative">
                            <img src="' . $cancha['imagen'] . '" 
                                 class="card-img-top"
                                 alt="Cancha de ' . $cancha['tipo'] . '"
                                 style="height: 200px; object-fit: cover;">
                            <span class="badge bg-' . $cancha['color'] . ' position-absolute top-0 end-0 m-2">
                                ' . strtoupper($cancha['tipo']) . '
                            </span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5 mb-3">' . $cancha['titulo'] . '</h3>
                            <p class="card-text text-muted mb-4">' . $cancha['descripcion'] . '</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="canchas.php?tipo=' . $cancha['tipo'] . '" 
                                   class="btn btn-' . $cancha['color'] . ' btn-sm">
                                    <i class="fas fa-calendar-alt me-2"></i>Reservar
                                </a>
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>2h min.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- Sección adicional de beneficios -->
    <section class="bg-light p-5 rounded-3 mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">¿Por qué reservar con nosotros?</h2>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Sistema de reservas 24/7</li>
                    <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Canchas de primera calidad</li>
                    <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Precios competitivos</li>
                    <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Confirmación inmediata</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="https://i.pinimg.com/736x/ba/ef/81/baef818bedefab47071bf592092062f7.jpg" 
                     alt="Personas disfrutando deportes" 
                     class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </section>
</main>

<style>
    .hover-effect {
        transition: all 0.3s ease;
    }
    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .card-img-top {
        border-top-left-radius: 0.375rem !important;
        border-top-right-radius: 0.375rem !important;
    }
</style>

<?php
require_once __DIR__ . '/templates/footer.php';
?>