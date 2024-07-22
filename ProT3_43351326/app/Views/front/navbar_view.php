<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="principal">
            <img src="assets/img/logo.png" class="logo_empresa" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if ($perfil == 1) : ?>
            <div class="btn btn-secondary active btn-sm mx-4">
                <a href="#">ADMIN: <?php echo $nombre; ?> </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="registro">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('/logout'); ?>" tabindex="-1">Cerrar Sesión</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button type="button" class="btn btn-primary">Search</button>
                </form>
            </div>
    </div>

<?php elseif ($perfil == 2) : ?>
    <div class="btn btn-secondary active btn-sm mx-4">
        <a href="#">CLIENTE: <?php echo $nombre; ?> </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="quienes_somos">Quienes somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="acerca_de">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('/logout'); ?>" tabindex="-1">Cerrar Sesión</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button type="button" class="btn btn-primary">Search</button>
        </form>
    </div>
    </div>

<?php else : ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="quienes_somos">Quienes somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="acerca_de">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="registro">Registro</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button type="button" class="btn btn-primary">Search</button>
        </form>
    </div>
    </div>
<?php endif; ?>
</nav>