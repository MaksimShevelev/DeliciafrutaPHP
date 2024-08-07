<?php
    $id = $_GET['id'];
    $producto = (new Producto())->catalogo_x_id($id);
?>

<div class="row" >
    <?php if(isset( $producto )){ ?>
        <h1 class="text-center my-5"> <?= $producto->getTitulo() ?> </h1>
        <div class="col">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="img/covers/<?= $producto->getImagen() ?>" class="img-fluid rounded-start border-end" alt="Imagen de  <?= $producto->getTitulo() ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <h2 class="card-title fs-2 mb-4"><?= $producto->getTitulo(); ?></h2>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p class="card-text"><?= $producto->getSubcategoria() ?></p>
                            <li class="list-group-item text-center"><?= $producto->getDescripcion() ?></li>
                            <li class="list-group-item"><span>Valor energético: </span><?= $producto->getValor_energetico() ?> kcal /100 gr</li>
                            <li class="list-group-item"><span>Ingridientes: </span><?= $producto->getIngridientes() ?></li>
                            <li class="list-group-item"><span>Peso: </span><?= $producto->getPeso() ?> gr.</li>
                            <li class="list-group-item"><span>Pais de origen: </span><?= $producto->getOrigen() ?></li>
                        </ul>
                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center"><span>ARS $ </span><?= $producto->getPrecio() ?></div>
                            <form action="admin/actions/add_item_acc.php" method="get">
                                <label for="">Cantidad:</label>
                                <input type="number" name="c" id="c" value="1">
                                <input class="btn btn-primary" type="submit" value="Agregar en carrito">
                                <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


         </div>
    <?php }else{ ?>

    <?php } ?>
</div>

<style>
    .list-group-item span {
        color: rgb(94, 176, 48);
    }
</style>