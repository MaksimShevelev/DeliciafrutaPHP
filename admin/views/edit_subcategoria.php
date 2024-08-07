<?php
    $id = $_GET['id'] ?? false;
    $subcategoria = (new Subcategoria())->get_x_id($id);
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-5 fw-bold">Editar subcategoría</h1>
            <div class="row mb-5 d-flex align-items-center">
                <form class="row g-3" action="actions/edit_subcategoria_acc.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $subcategoria->getId() ?>">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="<?= $subcategoria->getNombreCompleto() ?>">
                    </div>
                
                    <button class="btn btn-primary" type="submit">Editar</button>
                </form>
        </div>
    </div>
</div>
