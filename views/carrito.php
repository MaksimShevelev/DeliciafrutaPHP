<?php
    $miCarrito = new Carrito();
    $items = ($miCarrito)->getCarrito();
?>

<div class="d-flex flex-column align-items-center mt-5 mb-5">
    <h1>Carrito</h1>
    <?= (new Alerta())->get_alertas() ?>
    <?php if( count($items) ){ ?>
    <form action="admin/actions/update_carrito_acc.php" method="get">
        <table>
            <thead>
                <tr>
                    <th class="show-on-desktop text-center" scope="col" width="15%">Imagen</th>
                    <th scope="col" class="text-center">Producto</th>
                    <th scope="col" width="15%" class="text-center">Cantidad</th>
                    <th class="show-on-desktop text-center" scope="col" width="15%">Precio x1</th>
                    <th class="show-on-desktop text-center" scope="col" width="15%">Subtotal</th>
                    <th scope="col" width="10%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $items as $key => $item ) {?>
                    <tr>
                        <td class="show-on-desktop" ><img class="img-fluid rounded shadow-sm" src="img/covers/<?php echo $item["imagen"]; ?>" alt="<?php echo $item["producto"]; ?>" width="70"></td>
                        <td class="align-middle">
                            <p class="h6"><?php echo $item["producto"]; ?></p>
                        </td>
                        <td>
                            <input type="number" value="<?php echo $item["cantidad"]; ?>" name="c[<?= $key ?>]" class="form-control">
                        </td>
                        <td class="show-on-desktop align-middle"> <p class="h5 py-3"><?php echo $item["precio"]; ?></p></td>
                        <td class="show-on-desktop align-middle"> <p class="h5 py-3"> <?php echo $item["precio"] * $item["cantidad"]; ?> </p> </td>
                        <td class="text-end align-middle">
                            <a class="btn btn-danger" href="admin/actions/remove_item_acc.php?id=<?= $key ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?> 
                <tr class="total-row">
                    <td class="text-end">
                        <h2 class="h5 py-3"><span>Total: </span></h2>
                    </td>
                    <td>   
                        <p class="h5 py-3"><span>ARS $</span> <?= $miCarrito->getTotal() ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="index.php?sec=todosLosProductos">Volver a la tienda</a>
            <a class="btn btn-primary"  href="admin/actions/vaciar_carrito_acc.php">Vaciar carrito</a>
            <input type="submit" value="Actualizar cantidades" class="btn btn-primary">
            <a class="btn btn-primary"  href="admin/actions/guardar_carrito_acc.php">Finalizar compra</a>
        </div>
    </form>
    <?php }else{ ?>
        <div class="d-flex flex-column align-items-center">
            <img src="img/cart_empt-2.png" class="img-fluid w-20" alt="Carrito vacío">
            <p>Ahora su carrito está vacío</p>
            <a class="btn btn-primary" href="index.php?sec=todosLosProductos">Volver a la tienda</a>
        </div>
    <?php } ?>
</div>

<style>
    @media (max-width: 576px) {
        .show-on-desktop {
            display: none !important;
        }
    }

    @media (min-width: 577px) {
        .show-on-desktop {
            display: table-cell !important;
        }
    }

    span {
        color: rgb(94, 176, 48);
    }

    .total-row {
        border: 1px solid rgb(94, 176, 48);
        border-radius: 10px;
    }

</style>