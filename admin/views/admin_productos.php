<?php
    $productos = (new Producto())->catalogo_completo();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de productos</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th class="show-on-desktop" scope="col"><strong>Imagen</strong></th>
                        <th scope="col"><strong>Titulo</strong></th>
                        <th class="show-on-desktop" scope="col"><strong>Descripción</strong></th>
                        <th class="show-on-desktop"scope="col" ><strong>Producto</strong></th>
                        <th class="show-on-desktop" scope="col"><strong>Idoniedad</strong></th>
                        <th scope="col"><strong>Subcategoría</strong></th>
                        <th scope="col"><strong>Precio</strong></th>
                        <th scope="col"><strong>Acciones</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td class="show-on-desktop"> <img src="../img/covers/<?= $producto->getImagen() ?>" alt="Imagen del producto" class="img-fluid rounded shadow-sm"> </td>
                        <td><strong class="strong"><?= $producto->getTitulo() ?> </strong></td>
                        <td class="show-on-desktop"><strong class="strong"><?= $producto->getDescripcion() ?></strong></td>
                        <td class="show-on-desktop"><strong class="strong"> <?= $producto->getCategoria() ?> </strong></td>
                        <td class="show-on-desktop"><strong class="strong"><?= $producto->getIdoniedad() ?></strong></td>
                        <td><strong class="strong"><?= $producto->getSubcategoria() ?></strong></td>
                        <td><strong class="strong"><?= $producto->getPrecio() ?></strong></td>
                        <td>
                            <a href="index.php?sec=edit_producto&id=<?= $producto->getId() ?>" class="d-block btn btn-sm btn-primary mb-1">Editar</a>
                            <a href="index.php?sec=delete_producto&id=<?= $producto->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_producto" class="btn btn-primary mt-5 w-50">Agregar nuevo producto</a>

        </div>
    </div>
</div>


<style>
    @media (max-width: 576px) {
        .show-on-desktop {
            display: none !important;
        }
    }

    @media (min-width: 577px) and (max-width: 992px) {
        .show-on-desktop {
            display: none !important;
        }
    }

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