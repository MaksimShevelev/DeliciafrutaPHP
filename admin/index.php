<?php  
    require_once '../functions/autoload.php';

$secciones_validas = [
    'dashboard' => [
        'titulo' => 'Panel de control',
    ],
    'admin_categorias' => [
        'titulo' => 'Administración de categorias',
    ],
    'add_categoria' => [
        'titulo' => 'Administración de categorias',
    ],
    'delete_categoria' => [
        'titulo' => 'Eliminar categoria',
    ],
    'edit_categoria' => [
        'titulo' => 'Editar categoria',
    ],
    'admin_subcategorias' => [
        'titulo' => 'Administracion de subcategorias',
    ],
    'add_subcategoria' => [
        'titulo' => 'Agregar subcategoria',
    ],
    'delete_subcategoria' => [
        'titulo' => 'Eliminar subcategoria',
    ],
    'edit_subcategoria' => [
        'titulo' => 'editar subcategoria',
    ],
    'admin_idoniedad' => [
        'titulo' => 'Administracion de idoniedad',
    ],
    'add_idoniedad' => [
        'titulo' => 'Agregar idoniedad',
    ],
    'delete_idoniedad' => [
        'titulo' => 'Eliminar idoniedad',
    ],
    'edit_idoniedad' => [
        'titulo' => 'editar idoniedad',
    ],
    'admin_tipos' => [
        'titulo' => 'Administracion de tipos',
    ],
    'add_tipo' => [
        'titulo' => 'Agregar tipo',
    ],
    'delete_tipo' => [
        'titulo' => 'Eliminar tipo',
    ],
    'edit_tipo' => [
        'titulo' => 'editar tipo',
    ],
    'admin_productos' => [
        'titulo' => 'Administracion de productos',
    ],
    'add_producto' => [
        'titulo' => 'Agregar producto',
    ],
    'edit_producto' => [
        'titulo' => 'Editar producto',
    ],
    'delete_producto' => [
        'titulo' => 'Eliminar producto',
    ],
    "profile" => [ 
        "titulo" => "Profile"
    ],
    "lista_usuarios" => [ 
        "titulo" => "Lista de usuarios"
    ],
    "detalles_orden" => [ 
        "titulo" => "Detalles del orden"
    ],
    "autor" => [ 
        "titulo" => "Datos del autor"
    ],
];

$seccion = $_GET['sec'] ?? 'dashboard';
(new Autenticacion())->verify();

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = '404';
    $titulo = '404 - Página no encontrada';
} else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliciafruta :: <?= $titulo ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="../css/estilos.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-lg fixed-top rounded-bottom">
        <div class="container-fluid">
            <p>
                <a class="navbar-brand bg-white" href="#">Deliciafruta</a>
            </p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <?php if( isset($_SESSION["login"]) ) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=lista_usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_categorias">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_subcategorias">Subcategorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_idoniedad">Fecha de caducidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_tipos">Tipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_productos">Productos</a>
                    </li>
                    <?php (isset($_SESSION["login"])) ?>       
                        <li class="nav-item bg-white">
                            <a class="nav-link bg-white" href="index.php?sec=profile"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/auth_logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg></a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?sec=login"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
    <?= (new Alerta())->get_alertas() ?>
        <?php require file_exists("views/$vista.php") ? "views/$vista.php" : '../views/404.php'; ?>

    </main>
    <?php include_once "../admin/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
