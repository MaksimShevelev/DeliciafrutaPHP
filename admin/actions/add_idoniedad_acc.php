<?php
    require_once "../../functions/autoload.php";
    try {
        $nombre = ( new Idoniedad() )->insert(
            $_POST["nombre"],
            $_POST["cantidad"],

        );
        (new Alerta())->add_alerta("Se pudo agregar idoniedad", "success");
        header("Location: ../index.php?sec=admin_idoniedad");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar idoniedad", "danger");
        die("No pude cargar la idoniedad");
    }

