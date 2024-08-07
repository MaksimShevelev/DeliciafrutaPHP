<?php
    require_once "../../functions/autoload.php";

    try {
        $tipo = new Tipo();

        if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"])) {
            $tipo->edit($_POST["nombre"], $_POST["id"]);
        } else {
            throw new Exception("Nombre del tipo no proporcionado o vacío, o id no proporcionado");
        }

        header("Location: ../index.php?sec=admin_tipos");
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No pude editar el tipo");
    }
?>
