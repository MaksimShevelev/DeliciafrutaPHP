<?php
    include_once '../class/Conexion.php';
    include_once '../class/Usuario.php';
    include_once '../class/Alerta.php';

    $usuario = new Usuario();
    $usuarios_con_ordenes = $usuario->obtenerTodosLosUsuariosConOrdenes();
?>

<div class="container">
    <h1 class="text-center mb-5 fw-bold">Lista de usuarios</h1>
    <?= (new Alerta())->get_alertas() ?>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th><strong>Email</strong></th>
                <th><strong>Alias</strong></th>
                <th><strong>Nombre completo</strong></th>
                <th><strong>Total</strong></th>
                <th><strong>Fecha</strong></th>
                <th class="text-center"><strong>Ordenes</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios_con_ordenes)): ?>
                <?php foreach ($usuarios_con_ordenes as $registro): ?>
                    <tr>
                        <td><strong class="strong"><?php echo htmlspecialchars($registro['email']); ?></strong></td>
                        <td><strong class="strong"><?php echo htmlspecialchars($registro['nombre_usuario']); ?></strong></td>
                        <td><strong class="strong"><?php echo htmlspecialchars($registro['nombre_completo']); ?></strong></td>
                        <td><strong class="strong">ARS $ <?php echo htmlspecialchars($registro['total']); ?></strong></td>
                        <td><strong class="strong"><?php echo htmlspecialchars($registro['fecha']); ?></strong></td>
                        <td><strong class="strong">
                            <?php if (!empty($registro['orden_id'])): ?>
                                <a href="index.php?sec=detalles_orden&id=<?php echo htmlspecialchars($registro['orden_id']); ?>" class="btn btn-primary">Ver orden</a>
                            <?php else: ?>
                                <span>No tiene ordenes</span>
                            <?php endif; ?></strong>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">No hay usuarios registrados o no hay órdenes</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    .container {
        margin-top: 25px;
        margin-bottom: 15px;
    }

    strong {
        color: rgb(94, 176, 48);
    }

    .strong {
        color: rgb(124, 75, 151);
    }
</style>
