<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Solicitud de papeleria</h2>
                <h3>Folio: <?php echo $idSolicitud ?> </h3>
            </div>
            <?php if ($rastreo == 3) { ?>
                <div class="col-4">
                    <a class="btn btn-primary btn-block" onclick="return confirm('¿Seguro que quiere confirmar la entrega?')" href="?controller=solicitudes&action=confirmarEntrega&idSolicitudes=<?php echo $idSolicitud ?>">
                        Confirmar entrega
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <br>

    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Movimiento</th>
                <th>Usuario</th>
                <th>Producto</th>
                <th>Piezas Enviadas</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($productos as $prod) { ?>
                <tr>
                    <td> <?php echo $prod['idMovimientoConsumibles']; ?> </td>
                    <td> <?php echo $prod['usuarios']; ?> </td>
                    <td> <?php echo $prod['producto']; ?> </td>
                    <td> <?php echo $prod['piezas']; ?> </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>
    
</div>