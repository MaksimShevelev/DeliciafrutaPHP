<?php 
    require_once "functions/autoload.php";

    $view = isset($_GET["sec"]) ? $_GET["sec"] : "home"; 
    $vista = "404";
    $seccionesValidas = [
        "home" => [
            "titulo" => "Deliciafruta"
        ],
        "404" => [
            "titulo" => "La pagina no fue encontrada"
        ],
        "producto" => [
            "titulo" => "Detalle de producto"
        ],
        "productos" => [
            "titulo" => "productos"
        ],
        "todosLosProductos" => [
            "titulo" => "Todos los productos"
        ],
        "login" => [
            "titulo" => "¡Te damos una bienvenida!"
        ],
        "contacto" => [
            "titulo" => "Contacto"
        ],
        "nosotros"  => [
            "titulo" => "Nosotros"
        ],
        "registro" => [
            "titulo" => "Registro"
        ],
        "carrito" => [
            "titulo" => "Carrito"
        ],
        "autor" => [ 
            "titulo" => "Datos del autor"
        ],
        "respuesta" => [ 
            "titulo" => "Respuesta"
        ],
        "profile" => [ 
            "titulo" => "Profile"
        ],
        "detalles_orden" => [ 
            "titulo" => "Detalles del orden"
        ],
        "buscador" => [ 
            "titulo" => "Resultado de búsqueda"
        ],
    ];

    if( array_key_exists($view, $seccionesValidas) ){
        $vista = $view;
        $titulo = $seccionesValidas[$view]["titulo"];
    }else{
        $vista = "404";
        $titulo = $seccionesValidas["404"]["titulo"];
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliciafruta: <?= $titulo ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
    <?php include_once "includes/nav.php" ?>
    <main class="main">
        <?php file_exists("views/$vista.php") 
                ? include "views/$vista.php" 
                : include "views/404.php" ?>
    </main>

    <?php include_once "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>
