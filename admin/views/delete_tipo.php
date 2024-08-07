<?php
    $id = $_GET['id'] ?? false;
    $tipo = (new Tipo())->get_x_id($id);
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="row my-5 g-3">
                <h1 class="text-center mb-5 fw-bold">¿Eliminar tipo?</h1>
                <div class="col-12">
                    <h2 class="fs-6">Nombre</h2>
                    <p><?= $tipo->getNombre() ?></p>
                    <a class="d-block btn btn-sm btn-danger mt-4" href="actions/delete_tipo_acc.php?id=<?= $tipo->getId() ?>">Eliminar</a>
                    <a class="d-block btn btn-sm btn-primary mt-4" href="index.php?sec=dashboard">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>

