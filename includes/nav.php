<?php 
    $categorias_id = ( new Producto() )->categorias_validos();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-lg fixed-top rounded-bottom">
    <div class="container-fluid bg-white">
        <p>
            <a class="navbar-brand bg-white" href="#">Deliciafruta</a>
        </p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto bg-white">
                <li class="nav-item bg-white">
                    <form class="nav-item bg-white mt-2 " method="GET" action="buscador.php" >
                        <input class="btn-primary2" type="text" name="search" placeholder="Buscar por nombre...">
                        <button type="submit" class="btn-primary2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg></button>
                    </form>
                </li>
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="index.php?sec=home">Inicio</a>
                </li>
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="index.php?sec=nosotros">Nosotros</a>
                </li>
                <li class="nav-item dropdown bg-white">
                    <a class="nav-link dropdown-toggle bg-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="index.php?sec=todosLosProductos">Catalogo completo</a>
                        </li>
                        <?php
                        $id_to_text = [
                            1 => "Caramelos",
                            2 => "Gomitas",
                            3 => "Chocolate",
                        ];

                        foreach ($categorias_id as $categoria) {
                            $id = $categoria["categoria_principal_id"];
                            $text = isset($id_to_text[$id]) ? $id_to_text[$id] : "Unknown";
                        ?>
                        
                            <li>
                                <a class="dropdown-item" href="index.php?sec=productos&tipo=<?= htmlspecialchars($id) ?>"><?= htmlspecialchars($text) ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="index.php?sec=contacto">Contacto</a>
                </li>
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="index.php?sec=carrito"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg></a>
                </li>
                <?php if (isset($_SESSION["login"])): ?>       
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="index.php?sec=profile"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg></a>
                </li>
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="admin/actions/auth_logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                        </svg>
                    </a>
                </li>    
                <?php else: ?>
                <li class="nav-item bg-white">
                    <a class="nav-link bg-white" href="index.php?sec=login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                        </svg>
                    </a>
                </li>
 
                <?php endif; ?>                              
            </ul>
        </div>
    </div>
</nav>


<style>
    .nav-link:hover svg {
        fill:  rgb(94, 176, 48);
    }

    .btn-primary2 {
        border: 2px solid rgb(124, 75, 151);
        Border-radius: 5px;
        color: rgb(94, 176, 48);
        background-color: white;
    }

    .btn-primary2:hover {
        background-color: white;
    }

    .nav-link {
        font-size: 2.8vh;
        font-weight: bold;
    }

    .dropdown-item {
        color: rgb(124, 75, 151);
    }

    .navbar-nav .nav-link.active, .navbar-nav .nav-link.show {
        color: rgb(124, 75, 151);
    }

    .dropdown-menu {
    --bs-dropdown-link-active-bg: white;
    }

    .btn-primary2::placeholder {
            font-size: 13px;
            color: rgb(94, 176, 48);
    }
    
</style>