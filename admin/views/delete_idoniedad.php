<?php
    require_once "../functions/autoload.php";

    $id = $_GET['id'] ?? false;

    if (!$id) {
        die("Id de la idoniedad no proporcionado");
    }

    $idoniedad = (new Idoniedad())->get_x_id($id);

    if (!$idoniedad) {
        die("Idoniedad no encontrada");
    }
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="row my-5 g-3">
                <h1 class="text-center mb-5 fw-bold">¿Eliminar fecha de caducidad?</h1>
                <div class="col-12">
                    <h2 class="fs-6">Nombre <?= $idoniedad->getNombreCompleto() ?></h2>
                    <a class="d-block btn btn-sm btn-danger mt-4" href="actions/delete_idoniedad_acc.php?id=<?= $idoniedad->getId() ?>">Eliminar</a>
                    <a class="d-block btn btn-sm btn-primary mt-4" href="index.php?sec=admin_idoniedad">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
