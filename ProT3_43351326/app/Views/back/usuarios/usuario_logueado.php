<div class="container mt-5 mb-5">
    <div class="row justify-content-md-center">
        <div class="col-12 text-center">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning mb-3">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->perfil_id == 1) : ?>
                <img src="<?php echo base_url('assets/img/admin.png'); ?>" alt="Imagen de Administrador" class="img-fluid mb-5 mt-5" style="height: 100px; width: 100px;">
            <?php elseif (session()->perfil_id == 2) : ?>
                <img src="<?php echo base_url('assets/img/cliente.png'); ?>" alt="Imagen de Cliente" class="img-fluid mb-5 mt-5" style="height: 100px; width: 100px;">
            <?php endif; ?>

            <h4>Bienvenido/a, <?= session()->get('nombre') ?></h4>
        </div>
    </div>
</div>