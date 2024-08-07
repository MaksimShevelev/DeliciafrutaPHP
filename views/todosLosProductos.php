<?php
    $productos = ( new Producto() )->catalogo_completo();
?>


<h1 class="text-center my-5">Catalogo de productos</h1>
    <div class="row">
<?php foreach ($productos as $producto) { ?>


<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card mb-3">
        <img class="card-img-top" src="img/covers/<?= $producto->getImagen() ?>">
        <div class="card-body">
            <h5 class="card-title text-center"><?= $producto->getTitulo() ?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <p class="card-text"><?= $producto->getSubcategoria() ?></p>
            <li class="list-group-item"><span>Fecha de caducidad: </span><?= $producto->getIdoniedad() ?></li>
            <li class="list-group-item"><span>Peso: </span><?= $producto->getPeso() ?> gr.</li>
            <li class="list-group-item"><span>Pais de origen: </span><?= $producto->getOrigen() ?></li>
        </ul>
        <div class="card-body">
            <div class="fs-3 mb-3 fw-bold text-center"><span>ARS $</span><?= $producto->getPrecio() ?></div>
            <a href="index.php?sec=producto&id=<?=$producto->getId()?>" class="btn btn-primary w-100 fw-bold">Ver más</a>
        </div>
    </div>
</div>


<?php } ?>
</div>

<style>
    .list-group-item span {
        color: rgb(94, 176, 48);
    }
</style>