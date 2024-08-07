<?php
    require_once "../../functions/autoload.php";

    try {
        $idoniedad = new Idoniedad();

        if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"])) {
            $idoniedad->edit($_POST["nombre"], $_POST["cantidad"], $_POST["id"]);
        } else {
            throw new Exception("Nombre de la idoniedad no proporcionado o vacío, o id no proporcionado");
        }

        header("Location: ../index.php?sec=admin_idoniedad");
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No pude editar la idoniedad");
    }
?>
