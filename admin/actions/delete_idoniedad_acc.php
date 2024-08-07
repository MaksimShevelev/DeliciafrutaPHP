<?php
    require_once "../../functions/autoload.php";

    try {
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $idoniedad = new Idoniedad();
            $idoniedad->setId($_GET["id"]);
            $idoniedad->delete();
        } else {
            throw new Exception("Id de la idoniedad no proporcionado o vacío");
        }

        header("Location: ../index.php?sec=admin_idoniedad");
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No pude eliminar la idoniedad");
    }
?>
