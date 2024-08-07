<?php
    require_once "../../functions/autoload.php";

    $id = $_GET['id'] ?? FALSE;
    $c = $_GET['c'] ?? 1;

    if($id){
        (new Carrito())->add_item($id, $c);
        header("Location: ../../index.php?sec=carrito");
    }
