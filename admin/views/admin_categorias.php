<?php
    $categorias = (new Categoria())->catalogo_completo();
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-5 fw-bold">Administracion de categorías</h1>
            <div class="row mb-5 d-flex align-items-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><strong>Nombre</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $categoria) { ?>
                        <tr>
                            <td><strong class="strong"><?= $categoria->getNombre() ?> </strong></td>
                            <td>
                                <a href="index.php?sec=edit_categoria&id=<?= $categoria->getId() ?>" class="d-block btn btn-sm btn-primary mb-1">Editar</a>
                                <a href="index.php?sec=delete_categoria&id=<?= $categoria->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <a href="index.php?sec=add_categoria" class="btn btn-primary mt-5 w-50">Agregar nueva categoría</a>

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