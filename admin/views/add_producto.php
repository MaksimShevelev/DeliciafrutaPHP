<?php
    $tipos = (new Tipo())->catalogo_completo();
    $categorias = (new Categoria())->catalogo_completo();
    $subcategorias = (new Subcategoria())->catalogo_completo();
    $idoniedades = (new Idoniedad())->catalogo_completo();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de productos</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_producto_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="titulo">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" name="tipo_id" id="tipo_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($tipos as $tipo) { ?>
                        <option value="<?= $tipo->getId() ?>"><?= $tipo->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_principal_id" id="categoria_principal_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Valor energético</label>
                    <input class="form-control" type="text" name="valor_energetico">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Peso</label>
                    <input class="form-control" type="text" name="peso">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha de caducidad</label>
                    <select class="form-select" name="idoniedad_id" id="idoniedad_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($idoniedades as $idoniedad) { ?>
                        <option value="<?= $idoniedad->getId() ?>"><?= $idoniedad->getNombreCompleto() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Subcategoría</label>
                    <select class="form-select" name="subcategoria_id" id="subcategoria_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($subcategorias as $subcategoria) { ?>
                        <option value="<?= $subcategoria->getId() ?>"><?= $subcategoria->getNombreCompleto() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Origen</label>
                    <select class="form-select" name="origen" id="origen">
                        <option selected disabled>Elija una opcion</option>
                        <option>Brasil</option>
                        <option>Argentina</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Ingridientes</label>
                    <input class="form-control" type="text" name="ingridientes">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Productos secundarios</label>
                    <?php foreach ($categorias as $categoria) { ?>
                    <div>
                        <input type="checkbox" name="categorias_secundarios[]"
                            id="categoria_secundario<?= $categoria->getId() ?>"
                            value="<?= $categoria->getId() ?>"
                            >
                        <label for="categoria_secundario<?= $categoria->getId() ?>">
                            <?= $categoria->getNombre() ?>
                        </label>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="7"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>
