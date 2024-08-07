<?php
    include_once '../class/Conexion.php';
    include_once '../class/Usuario.php';
    include_once '../class/Alerta.php';

    if (!isset($_SESSION['login'])) {
        header('Location: index.php?sec=login');
        exit();
    }

    $usuario = new Usuario();
    $user = $usuario->usuario_x_id($_SESSION['login']['id']);
?>

    <div class="container">
        <h1 class="text-center mb-5 fw-bold">Perfil del admin</h1>
        <?= (new Alerta())->get_alertas() ?>
        <?php if ($user): ?>
            <div class="row my-5 justify-content-center">
                <div class="col col-md-5">
                    <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($user->getEmail()); ?></p>
                    <p><strong>Alias:</strong> <?php echo htmlspecialchars($user->getNombreUsuario()); ?></p>
                    <p><strong>Nombre completo:</strong> <?php echo htmlspecialchars($user->getNombreCompleto()); ?></p>
                    <p><strong>Role:</strong> <?php echo htmlspecialchars($user->getRoles()); ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>Usuario no encontrado.</p>
        <?php endif; ?>
        <a class="btn btn-primary w-50" href="index.php?sec=dashboard">Volver</a>
    </div>

<style>
    .container {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    strong {
        color: rgb(94, 176, 48);
    }
</style>
