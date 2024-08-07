<?php
    $tipos = (new Tipo())->catalogo_completo();
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-5 fw-bold">Administracion de tipos</h1>
            <div class="row mb-5 d-flex align-items-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><strong>Nombre</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tipos as $tipo) { ?>
                        <tr>
                            <td><strong class="strong"><?= $tipo->getNombre() ?> </strong></td>
                            <td>
                                <a href="index.php?sec=edit_tipo&id=<?= $tipo->getId() ?>" class="d-block btn btn-sm btn-primary mb-1">Editar</a>
                                <a href="index.php?sec=delete_tipo&id=<?= $tipo->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <a href="index.php?sec=add_tipo" class="btn btn-primary mt-5 w-50">Agregar tipo</a>

            </div>
        </div>
    </div>
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