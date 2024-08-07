<?php
    require_once "../../functions/autoload.php";

    $id = $_GET["id"] ?? false;
    $categoria = (new Categoria())->catalogo_x_id($id);
    try {
        $categoria->delete();
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No se pudo eliminar la categoria");
    }


    header("Location: ../index.php?sec=admin_categorias");

