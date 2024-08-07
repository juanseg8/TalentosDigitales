<?php
$session = session();
$perfil = $session->get('perfil_id');
?>

<footer class="footer mt-5">
    <div class="footer-content">
        <nav class="quick-links-nav mt-4">
            <ul class="quick-links">
                <?php if ($perfil == 1) : ?>
                    <li><a href="login">Login</a></li>
                    <li><a href="registro">Registro</a></li>
                    <li><a href="usuarios">Usuarios</a></li>
                    <li><a href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a></li>
                <?php elseif ($perfil == 2) : ?>
                    <li><a href="quienes_somos">Quienes somos</a></li>
                    <li><a href="acerca_de">Acerca de</a></li>
                    <li><a href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a></li>
                <?php else : ?>
                    <li><a href="quienes_somos">Quienes somos</a></li>
                    <li><a href="acerca_de">Acerca de</a></li>
                    <li><a href="login">Login</a></li>
                    <li><a href="registro">Registro</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="social-media mt-5">
            <img class="logo mx-3" src="assets/img/whatsapp.png" alt="logo_whatsapp" />
            <img class="logo mx-3" src="assets/img/facebook.png" alt="logo_facebook" />
            <img class="logo mx-3" src="assets/img/instagram.png" alt="logo_instagram" />
        </div>
        <p class="mt-5">Derechos de autor © Juan Sebastian Guilisasti 2024 | InnovaWeb Labs</p>
    </div>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>