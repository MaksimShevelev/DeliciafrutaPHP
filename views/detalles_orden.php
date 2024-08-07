<?php
    include_once './class/Conexion.php';
    include_once './class/Usuario.php';
    include_once './class/Alerta.php';

    if (!isset($_SESSION['login'])) {
        header('Location: index.php?sec=login');
        exit();
    }

    $id_orden = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $usuario = new Usuario();
    $orden = $usuario->obtenerOrdenPorId($id_orden);

    if (!$orden) {
        header('Location: index.php?sec=profile');
        exit();
    }

    $detalle_orden = $usuario->obtenerDetalleOrden($id_orden);
?>

<div class="container">
    <h1 class="text-center mb-5 fw-bold">Detalles de la orden</h1>
    <?= (new Alerta())->get_alertas() ?>
    <div class="row my-5 justify-content-center">
        <div class="col col-md-8">
            <p><strong>Orden:</strong> <?php echo htmlspecialchars($orden['id']); ?></p>
            <p><strong>Total:</strong> ARS $ <?php echo htmlspecialchars($orden['total']); ?></p>
            <p><strong>Fecha:</strong> <?php echo htmlspecialchars($orden['fecha']); ?></p>

            <h2 class="mt-5">Detalles de los productos</h2>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th><strong>Producto</strong></th>
                        <th><strong>Cantidad</strong></th>
                        <th><strong>Precio</strong></th>
                        <th><strong>Subtotal</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalle_orden as $detalle): ?>
                        <tr>
                            <td><strong class="strong"><?php echo htmlspecialchars($detalle['producto']); ?></strong></td>
                            <td><strong class="strong"><?php echo htmlspecialchars($detalle['cantidad']); ?></strong></td>
                            <td><strong class="strong">ARS $ <?php echo htmlspecialchars($detalle['precio']); ?></strong></td>
                            <td><strong class="strong">ARS $ <?php echo htmlspecialchars($detalle['cantidad'] * $detalle['precio']); ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-primary w-50" href="index.php?sec=profile">Volver al perfil</a>
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
