<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    require_once "../../functions/autoload.php";
    $fileData = $_FILES["imagen"] ?? FALSE;
    $categorias_secundarios = $_POST["categorias_secundarios"];
    try {
        $producto = new Producto();

        if( !empty($fileData["tmp_name"]) ){
            if( !empty($_POST["imagen_original"]) ){
                (new Imagen())->borrarImagen("../../img/covers/".$_POST["imagen_original"]);
            }
            $foto_producto_nuevo = (new Imagen())->subirImagen("../../img/covers", $fileData);
            $producto->reemplazarImagen($foto_producto_nuevo, $_POST["id"]);
        }
        (new Producto())->edit(
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
            $_POST["precio"],
            $_POST["id"]
        );
        (new Producto())->clear_categorias_secundarios($_POST["id"]);
        foreach ($categorias_secundarios as $id_categoria_secundario) {
            (new Producto())->add_categoria_secundario($_POST["id"], $id_categoria_secundario);
        }
        (new Alerta())->add_alerta("Se pudo editar", "success");
        header("Location: ../index.php?sec=admin_productos");
    } catch (Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("Se no pudo editar", "danger");
        die("No pude editar el producto");
    }

