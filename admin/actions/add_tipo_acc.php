<?php
    require_once "../../functions/autoload.php";
    try {
        $nombre = ( new Tipo() )->insert(
            $_POST["nombre"],

        );
        (new Alerta())->add_alerta("Se pudo agregar tipo", "success");
        header("Location: ../index.php?sec=admin_tipos");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar tipo", "danger");
        die("No pude cargar el tipo");
    }

