<?php

class Carrito

    {

        public function add_item(int $id_producto, int $cantidad){
            $itemData = (new Producto())->catalogo_x_id($id_producto);
            if($itemData){
                $_SESSION["carrito"][$id_producto] = [
                    "producto" => $itemData->getTitulo(),
                    "imagen" => $itemData->getImagen(),
                    "precio" => $itemData->getPrecio(),
                    "cantidad" => $cantidad
                ];
            }
        }

        public function getCarrito(){
            if( !empty($_SESSION["carrito"]) ){
                return $_SESSION["carrito"];
            }
            return [];
        }

        public function getTotal(){
            $total = 0;
            if( !empty($_SESSION["carrito"]) ){
                foreach( $_SESSION["carrito"] as $item ){
                    $total += $item["precio"] * $item["cantidad"];
                }
            }
            return $total;
        }

        public function vaciarCarrito(){
            $_SESSION["carrito"] = [];
        }


        public function actualizarCantidades(array $cantidades){
            if( !empty($cantidades) ){
                foreach( $cantidades as $id => $cantidad ){
                    if( isset( $_SESSION["carrito"][$id] ) ){
                        $_SESSION["carrito"][$id]["cantidad"] = $cantidad; 
                    }
                }
            }
        }

        public function removeItem(int $id){
            if( isset( $_SESSION["carrito"][$id] ) ){
                unset($_SESSION["carrito"][$id]);
                (new Alerta())->add_alerta("Producto eliminado", "success");
            }else{
                (new Alerta())->add_alerta("No se ha eliminado el producto", "danger");
            }
        }

        public function finalizarCompra() {
            if (isset($_SESSION["carrito"]) && isset($_SESSION["login"])) {
                $total = $this->getTotal();
                $id_usuario = $_SESSION["login"]["id"];
                
                // Вставка заказа
                try {
                    $conexion = Conexion::getConexion();
                    $query = "INSERT INTO `ordenes` (`id_usuario`, `total`) VALUES (:id_usuario, :total)";
                    $PDOStatement = $conexion->prepare($query);
                    $PDOStatement->execute([
                        "id_usuario" => htmlspecialchars($id_usuario),
                        "total" => htmlspecialchars($total),
                    ]);
                    
                    $id_orden = $conexion->lastInsertId(); // Получаем ID последнего вставленного заказа
                    
                    // Вставка деталей заказа
                    foreach ($_SESSION["carrito"] as $id_producto => $producto) {
                        $query = "INSERT INTO `detalle_orden` (`id_orden`, `id_producto`, `cantidad`, `precio`) VALUES (:id_orden, :id_producto, :cantidad, :precio)";
                        $PDOStatement = $conexion->prepare($query);
                        $PDOStatement->execute([
                            "id_orden" => htmlspecialchars($id_orden),
                            "id_producto" => htmlspecialchars($id_producto),
                            "cantidad" => htmlspecialchars($producto["cantidad"]),
                            "precio" => htmlspecialchars($producto["precio"]),
                        ]);
                    }
                    
                    // Очистка корзины
                    $this->vaciarCarrito();
                    (new Alerta())->add_alerta("Compra realizada con éxito", "success");
                    
                } catch (Exception $e) {
                    echo $e->getMessage();
                    (new Alerta())->add_alerta("Error al finalizar la compra", "danger");
                }
            } else {
                (new Alerta())->add_alerta("No hay productos en el carrito o usuario no está autenticado", "danger");
            }
        }
        

        public function insert(int $id_producto, int $id_usuario, int $cantidad){
            try {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO `carrito` (`id`, `id_producto`, `id_usuario`, `cantidad`) VALUES (NULL, :id_producto, :id_usuario, :cantidad)";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "id_producto" => htmlspecialchars($id_producto),
                    "id_usuario" => htmlspecialchars($id_usuario),
                    "cantidad" => htmlspecialchars($cantidad),
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function borrarCarritosAnteriores(){
            try {
                $conexion = Conexion::getConexion();
                $query = "DELETE FROM `carrito` WHERE id_usuario = :id_usuario";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "id_usuario" => htmlspecialchars($_SESSION["login"]["id"])
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }