<?php
    include_once './class/Conexion.php';
    include_once './class/Usuario.php';
    include_once './class/Alerta.php';

    if (!isset($_SESSION['login'])) {
        header('Location: index.php?sec=login');
        exit();
    }

    $usuario = new Usuario();
    $user = $usuario->usuario_x_id($_SESSION['login']['id']);
    $ordenes = $usuario->obtenerOrdenes($_SESSION['login']['id']);
    ?>

<div class="container">
    <h1 class="text-center mb-5 fw-bold">Perfil del usuario</h1>
    <?= (new Alerta())->get_alertas() ?>
    <?php if ($user): ?>
        <div class="row my-5 justify-content-center">
            <div class="col col-md-5">
                <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($user->getEmail()); ?></p>
                <p><strong>Alias:</strong> <?php echo htmlspecialchars($user->getNombreUsuario()); ?></p>
                <p><strong>Nombre completo:</strong> <?php echo htmlspecialchars($user->getNombreCompleto()); ?></p>
            </div>
        </div>
        <h2 class="text-center mt-5">Historial de compras</h2>
        <?php if (!empty($ordenes)): ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th><strong>Total</strong></th>
                        <th><strong>Fecha</strong></th>
                        <th class="text-center"><strong>Detalles</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordenes as $orden): ?>
                        <tr>
                            <td><strong class="strong">ARS $ <?php echo htmlspecialchars($orden['total']); ?></strong></td>
                            <td><strong class="strong"><?php echo htmlspecialchars($orden['fecha']); ?></strong></td>
                            <td><a href="index.php?sec=detalles_orden&id=<?php echo htmlspecialchars($orden['id']); ?>" class="btn btn-primary">Ver detalles</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No tienes compras registradas.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
    <a class="btn btn-primary w-50" href="index.php?sec=home">Volver</a>
</div>

<style>
    .container {
        margin-top: 25px;
        margin-bottom: 15px;
    }

    strong {
        color: rgb(94, 176, 48);
    }

    .btn-info {
        background-color: rgb(94, 176, 48);
        border-color: rgb(94, 176, 48);
    }

    .strong {
        color: rgb(124, 75, 151);
    }
</style>
