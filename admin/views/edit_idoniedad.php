<?php
    require_once "../functions/autoload.php";

    $id = $_GET['id'] ?? false;
    $idoniedad = (new Idoniedad())->get_x_id($id);
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-5 fw-bold">Editar fecha de caducidad</h1>
            <div class="row mb-5 d-flex align-items-center">
                <form class="row g-3" action="actions/edit_idoniedad_acc.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $idoniedad->getId() ?>">
                    <div class="col-12 mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="<?= $idoniedad->getNombreCompleto() ?>">
                        <label class="form-label">Cantidad</label>
                        <input class="form-control" type="text" name="cantidad" value="<?= $idoniedad->getCantidad() ?>">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

