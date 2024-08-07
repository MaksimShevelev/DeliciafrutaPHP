<?php
    require_once "../../functions/autoload.php";

    try {
        $subcategoria = new Subcategoria();
        $subcategoria->edit($_POST["nombre"], $_POST["id"]);

        header("Location: ../index.php?sec=admin_subcategorias");
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No pude editar la subcategoria");
    }
?>
