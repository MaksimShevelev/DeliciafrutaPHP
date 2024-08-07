<?php
    require_once "../../functions/autoload.php";

    try {
        $categoria = new Categoria();

        if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"])) {
            $categoria->edit($_POST["nombre"], $_POST["id"]);
        } else {
            throw new Exception("Nombre del categoria no proporcionado o vacío, o id no proporcionado");
        }

        header("Location: ../index.php?sec=admin_categorias");
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No pude editar la categoria");
    }
?>
