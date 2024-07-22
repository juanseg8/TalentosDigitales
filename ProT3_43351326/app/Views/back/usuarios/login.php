<section class="form-section">
    <form method="post" action="<?php echo base_url('/enviar_ingreso') ?>" class="">

        <!-- Mensaje de error -->
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="email" class="m-2">Correo electrónico</label>
            <input name="email" type="email" class="form-control w-50 shadow" id="email" placeholder="Ingresa tu correo electrónico">
        </div>

        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="password" class="m-2">Contraseña</label>
            <input name="pass" type="password" class="form-control w-50 shadow" id="password" placeholder="Ingresa tu contraseña">
        </div>

        <div class="d-flex justify-content-center m-2">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
        <div class="text-center mt-3">
            <p>¿No tienes una cuenta? <a href="registro">Regístrate aquí</a></p>
        </div>

    </form>
</section>