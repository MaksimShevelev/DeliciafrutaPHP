<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    require_once "../../functions/autoload.php";

    $categorias_secundarios = $_POST["categorias_secundarios"];
    try {
        $foto_producto = ( new Imagen() )->subirImagen("../../img/covers", $_FILES["imagen"]);
        $id_producto = (new Producto())->insert(
            $_POST["categoria_principal_id"],  
            $_POST["tipo_id"], 
            $_POST["valor_energetico"], 
            $_POST["peso"],
            $_POST["titulo"],
            $_POST["idoniedad_id"],
            $_POST["subcategoria_id"],
            $_POST["descripcion"],
            $_POST["origen"],
            $_POST["ingridientes"],
            $foto_producto,
            $_POST["precio"]
        );

        foreach ($categorias_secundarios as $id_categoria_secundario) {
            (new Producto())->add_categoria_secundario($id_producto, $id_categoria_secundario);
        }

        header("Location: ../index.php?sec=admin_productos");
    } catch (\Exception $e) {
        echo $e->getMessage();
        die("No pude cargar el categoria");
    }