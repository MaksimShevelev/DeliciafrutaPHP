<?php
    $tipos = (new Tipo())->catalogo_completo();
    $categorias = (new Categoria())->catalogo_completo();
    $subcategorias = (new Subcategoria())->catalogo_completo();
    $idoniedades = (new Idoniedad())->catalogo_completo();
    $producto = (new Producto())->catalogo_x_id($_GET["id"]);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de producto</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_producto_acc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="titulo" value="<?= $producto->getTitulo() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" name="tipo_id" id="tipo_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($tipos as $tipo) { ?>
                        <option <?=$tipo->getId()== $producto->getTipo_id() ? "selected" : "" ?> value="<?= $tipo->getId() ?>"><?= $tipo->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_principal_id" id="categoria_principal_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($categorias as $categoria) { ?>
                        <option <?=$categoria->getId()== $producto->getCategoria_id() ? "selected" : "" ?> value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Valor energético</label>
                    <input class="form-control" type="text" name="valor_energetico" value="<?= $producto->getValor_energetico() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Peso</label>
                    <input class="form-control" type="text" name="peso" value="<?= $producto->getPeso() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen actual</label>
                    <img class="img-fluid rounded shadow-sm d-block" src="../img/covers/<?= $producto->getImagen() ?>" alt="">
                    <input class="form-control" type="hidden" name="imagen_original" value="<?= $producto->getImagen() ?>">
                </div>     

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Reemplazar imagen</label>
                    <input class="form-control" type="file" name="imagen" >
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Idoniedad</label>
                    <select class="form-select" name="idoniedad_id" id="idoniedad_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($idoniedades as $idoniedad) { ?>
                        <option <?=$idoniedad->getId()== $producto->getIdoniedad_id() ? "selected" : "" ?> value="<?= $idoniedad->getId() ?>"><?= $idoniedad->getNombreCompleto() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Subcategoría</label>
                    <select class="form-select" name="subcategoria_id" id="subcategoria_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($subcategorias as $subcategoria) { ?>
                        <option <?=$subcategoria->getId()== $producto->getSubcategoria_id() ? "selected" : "" ?> value="<?= $subcategoria->getId() ?>"><?= $subcategoria->getNombreCompleto() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Origen</label>
                    <select class="form-select" name="origen" id="origen">
                        <option selected disabled>Elija una opcion</option>
                        <option <?= $producto->getOrigen() == "Brasil" ? "selected" : ""?>>Brasil</option>
                        <option <?= $producto->getOrigen() == "Argentina" ? "selected" : ""?>>Argentina</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Ingridientes</label>
                    <input class="form-control" type="text" name="ingridientes" value="<?= $producto->getIngridientes() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio" value="<?= $producto->getPrecio() ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Productos secundarios</label>
                    <?php foreach ($categorias as $categoria) { 
                        $ps_seleccionado = explode(",",$producto->getCategoriasSecundarios());    
                    ?>
                    <div>
                        <input type="checkbox" name="categorias_secundarios[]"
                            id="categoria_secundario<?= $categoria->getId() ?>"
                            <?= in_array( $categoria->getId(), $ps_seleccionado) ? "checked" : ""  ?>
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
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="7"><?=$producto->getDescripcion()?></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>
