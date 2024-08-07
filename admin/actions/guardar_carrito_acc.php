<?php
    require_once "../../functions/autoload.php";

    $auth = new Autenticacion();

    if (!$auth->verify()) {
        header('Location: ../../index.php?sec=login');
        exit();
    }

    $carrito = new Carrito();
    $carrito->borrarCarritosAnteriores();
    $carrito->finalizarCompra();
    $carrito->vaciarCarrito();
    header("Location: ../../index.php");
    exit();
