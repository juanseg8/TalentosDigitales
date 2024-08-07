<section class="h-max">
    <div class="container mt-5">
        <h2 class="text-center m-4">Lista de Usuarios</h2>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Tipo de perfil</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios) && is_array($usuarios)) : ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?= esc($usuario['id_usuario']) ?></td>
                            <td><?= esc($usuario['nombre']) ?></td>
                            <td><?= esc($usuario['apellido']) ?></td>
                            <td><?= esc($usuario['usuario']) ?></td>
                            <td><?= esc($usuario['email']) ?></td>
                            <td><?= esc($usuario['perfil_id']) ?></td>
                            <td class="d-flex justify-content-around">
                                <a href="<?= base_url('usuarios/delete/' . esc($usuario['id_usuario'])) ?>" class="btn btn-danger btn-sm " onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</a>
                                <a href="<?= base_url('usuarios/edit/' . esc($usuario['id_usuario'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No se encontraron usuarios</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>