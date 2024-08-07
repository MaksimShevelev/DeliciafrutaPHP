<?php
    require_once "../../functions/autoload.php";
    try {
        $nombre = ( new Categoria() )->insert(
            $_POST["nombre"],

        );
        (new Alerta())->add_alerta("Se pudo agregar subcategoria", "success");
        header("Location: ../index.php?sec=admin_categorias");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar subcategoria", "danger");
        die("No pude cargar la subcategoria");
    }

