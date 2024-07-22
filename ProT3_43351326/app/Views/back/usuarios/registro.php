<section class="form-section">

    <?php $validation = \Config\Services::validation(); ?>

    <form method="post" action="<?php echo base_url('/enviar_registro') ?>">

        <?= csrf_field(); ?>

        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>

        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="firstName" class="m-2 font-weight-bold">Nombre</label>
            <input name="nombre" type="text" class="form-control w-50 shadow" id="firstName" placeholder="Ingresa tu nombre">

            <!-- error -->
            <?php if ($validation->getError('nombre')) { ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('nombre'); ?>
                </div>
            <?php } ?>

        </div>
        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="lastName" class="m-2 font-weight-bold">Apellido</label>
            <input name="apellido" type="text" class="form-control w-50 shadow" id="lastName" placeholder="Ingresa tu apellido">

            <!-- error -->
            <?php if ($validation->getError('apellido')) { ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('apellido'); ?>
                </div>
            <?php } ?>

        </div>
        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="email" class="m-2 font-weight-bold">Correo electrónico</label>
            <input name="email" type="email" class="form-control w-50 shadow" id="email" placeholder="Ingresa tu correo electrónico">

            <!-- error -->
            <?php if ($validation->getError('email')) { ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('email'); ?>
                </div>
            <?php } ?>

        </div>
        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="username" class="m-2 font-weight-bold">Usuario</label>
            <input name="usuario" type="text" class="form-control w-50 shadow" id="username" placeholder="Ingresa tu nombre de usuario">

            <!-- error -->
            <?php if ($validation->getError('usuario')) { ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('usuario'); ?>
                </div>
            <?php } ?>

        </div>
        <div class="form-group m-3 d-flex flex-column align-items-center">
            <label for="password" class="m-2 font-weight-bold">Contraseña</label>
            <input name="pass" type="password" class="form-control w-50 shadow" id="password" placeholder="Ingresa tu contraseña">

            <!-- error -->
            <?php if ($validation->getError('pass')) { ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('pass'); ?>
                </div>
            <?php } ?>

        </div>
        <div class="d-flex justify-content-center m-2">
            <button type="submit" class="btn btn-success">Registrarse</button>
        </div>
        <div class="text-center mt-3">
            <p>¿Ya tienes una cuenta? <a href="login">Inicia sesión aquí</a></p>
        </div>
    </form>
</section>