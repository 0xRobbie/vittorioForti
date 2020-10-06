<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Movimientos</h2>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=movimientoConsumibles&action=asignacionMasivaTiendas">
                    <span class="material-icons md-36"> shopping_bag </span> <br>
                    Producto a Tiendas
                </a>
            </div>
            <div class="col-4">
                <a class="btn btn-dark btn-block" href="?controller=movimientoConsumibles&action=asignacionMasivaProductos">
                    <span class="material-icons md-36"> shop_two </span> <br>
                    Productos a Tienda
                </a>
            </div>
            <div class="col-4">
                <a class="btn btn-success btn-block" href="?controller=movimientoConsumibles&action=formularioMovimientoConsumibles">
                    <span class="material-icons md-36"> store </span> <br>
                    Asignación Individual
                </a>
            </div>
        </div>
        <br><br>
    </div>

<?php 
    if ($movimientoConsumibles == '0') {
        echo '<br><br><br>';
        echo '<h3>no hay datos para mostrar</h3>';
    } else {
?>

    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Producto</th>
                <th>Piezas</th>
                <th>Ultimo Movimiento</th>
                <th>Solicitud</th>
                <th>Lugar de Trabajo</th>
                <th>Preasignado</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($movimientoConsumibles as $movimiento) { ?>
                <tr>
                    <td> <?php echo $movimiento['idMovimientoConsumibles'] ?> </td>
                    <td> <?php echo $movimiento['usuarios'] ?> </td>
                    <td> <?php echo $movimiento['producto'] ?> </td>
                    <td> <?php echo $movimiento['piezas'] ?> </td>
                    <td> <?php echo $movimiento['ultimoMovimiento'] ?> </td>
                    <td> <?php echo $movimiento['idSolicitudes'] ?> </td>
                    <td> <?php echo $movimiento['idLugarTrabajo'] ?> </td>
                    <td> <?php echo $movimiento['preasignado'] ?> </td>
            <?php } ?>
            </tr>
        </tbody>
    </table>
<?php } ?>

</div>