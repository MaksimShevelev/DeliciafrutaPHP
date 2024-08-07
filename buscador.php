<?php
require 'class/Producto.php';
require_once "functions/autoload.php";
include_once 'class/Conexion.php';
include_once 'class/Alerta.php';

$buscar = isset($_GET['search']) ? trim($_GET['search']) : '';

$productos = [];
if (!empty($buscar)) {
    $productos = (new Producto())->buscarProductosPorNombre($buscar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
    <?php include_once "includes/nav.php" ?>
    <h1 class="text-center my-5">Resultados de la búsqueda: <?= htmlspecialchars($buscar) ?></h1>
    <div class="row">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card mb-3">
                        <img class="card-img-top rounded-0" src="img/covers/<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= htmlspecialchars($producto['titulo']) ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span>Descripcion: </span><?= htmlspecialchars($producto['descripcion']) ?></li>
                            <li class="list-group-item"><span>País de origen: </span><?= htmlspecialchars($producto['origen']) ?></li>
                            <li class="list-group-item"><span>Valor energetico: </span><?= htmlspecialchars($producto['valor_energetico']) ?></li>
                            <li class="list-group-item"><span>Ingridientes: </span><?= htmlspecialchars($producto['ingridientes']) ?></li>
                            <li class="list-group-item"><span>Peso: </span><?= htmlspecialchars($producto['peso']) ?> gr.</li>
                        </ul>
                        <div class="card-body">
                            <div class="fs-3 mb-3 fw-bold text-center"><span>ARS $</span><?= htmlspecialchars($producto['precio']) ?></div>
                            <a href="index.php?sec=producto&id=<?= htmlspecialchars($producto['id']) ?>" class="btn btn-primary w-100 fw-bold">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No se encontraron productos.</p>
        <?php endif; ?>
    </div>
    <?php include_once "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>

<style>
    .list-group-item span {
        color: rgb(94, 176, 48);
    }
</style>
