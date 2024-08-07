<?php
    require_once "../../functions/autoload.php";

    $id = $_GET["id"] ?? false;
    $tipo = (new Tipo())->get_x_id($id);
    try {
        $tipo->delete();
    } catch (Exception $e) {
        echo $e->getMessage();
        die("No se pudo eliminar");
    }


    header("Location: ../index.php?sec=admin_tipos");

