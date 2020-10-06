<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Total de solicitudes</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=solicitudes&action=resumenSolicitudes">
                    Resumen solicitudes
                </a>
            </div>
        </div>
    </div>

    <br>
    
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Usuario</th>
                <th>Tipo Papeleria</th>
                <th>Observaciones</th>
                <th>Estatus</th>
                <th>Atender</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($solicitudes as $solicitud) { ?>
                <tr>
                    <td> <?php echo $solicitud['idSolicitudes'] ?> </td>
                    <td> <?php echo $solicitud['usuarios'] ?> </td>
                    <td> <?php echo $solicitud['tipoPapeleria'] ?> </td>
                    <td> <?php echo $solicitud['observaciones'] ?> </td>
                    <td> <?php echo $solicitud['rastreo'] ?> </td>

                    
                    <?php if ($solicitud['rastreo'] == 'revisando') { ?>
                        <td> 
                            <a class="btn btn-success btn-block" href='?controller=movimientoConsumibles&action=atenderSolicitudes&idSolicitud=<?php echo $solicitud['idSolicitudes'] ?>&idLugarTrabajo=<?php echo $solicitud['idLugarTrabajo'] ?>'> 
                                Atender
                            </a> 
                        </td>
                    <?php } else if ($solicitud['rastreo'] == 'enviado' || $solicitud['rastreo'] == 'resuelto') { ?>
                            <td> 
                                <a class="btn btn-primary btn-block" href='?controller=solicitudes&action=verSolicitudProductos&idSolicitudes=<?php echo $solicitud['idSolicitudes'] ?>&idUsuario=<?php echo $solicitud["idLugarTrabajo"]?>&rastreo=<?php echo $solicitud['idRastreo'] ?>'> 
                                    Ver
                                </a> 
                            </td>
                    <?php } ?>
            <?php } ?>
                </tr>
        </tbody>
    </table>

    <br><br>

    <h4 class="text-left">Solicitudes resueltas</h4>
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Usuario</th>
                <th>Último Movimiento</th>
                <th>Productos</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($Resueltas as $solicitud) { ?>
                <tr>
                    <td> <?php echo $solicitud->getIdSolicitudes() ?> </td>
                    <td> <?php echo $solicitud->getIdUsuarios() ?> </td>
                    <td> <?php echo $solicitud->getUltimoMovimiento() ?> </td>

                    <td> 
                        <a class="btn btn-primary btn-block" href='?controller=solicitudes&action=verSolicitudProductos&idSolicitudes=<?php echo $solicitud->getIdSolicitudes() ?>&idUsuario=<?php echo $_SESSION["user_id"]?>&rastreo=<?php echo $solicitud->getIdRastreo() ?>'> 
                            Ver
                        </a> 
                    </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>

</div>