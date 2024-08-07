<?php
    require_once "../../functions/autoload.php";

    $id = $_GET["id"] ?? false;
    $subcategoria = (new Subcategoria())->get_x_id($id);
    try {
        $subcategoria->delete();
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No se pudo eliminar");
    }


    header("Location: ../index.php?sec=admin_subcategorias");

