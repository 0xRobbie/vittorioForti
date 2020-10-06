<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Solicitudes</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=solicitudes&action=formularioSolicitudes">
                    <span class="material-icons">playlist_add</span>
                </a>
            </div>
        </div>
    </div>

    <br>

    <h4 class="text-left">Solicitudes sin productos</h4>
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Usuario</th>
                <th>Último Movimiento</th>
                <th>Productos</th>
                <th>Cancelar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($Solicitudes as $solicitud) { ?>
                <tr>
                    <td> <?php echo $solicitud->getIdSolicitudes() ?> </td>
                    <td> <?php echo $solicitud->getIdUsuarios() ?> </td>
                    <td> <?php echo $solicitud->getUltimoMovimiento() ?> </td>

                    <td> 
                        <a class="btn btn-success btn-block" href='?controller=solicitudes&action=solicitudPapeleria&idSolicitudes=<?php echo $solicitud->getIdSolicitudes() ?>&idUsuario=<?php echo $_SESSION["user_id"]?>&tipoPapeleria=<?php echo $solicitud->getIdTipoPapeleria()?>'> 
                            Solicitar
                        </a> 
                    </td>
                    <td> 
                        <a class="btn btn-danger btn-block" onclick="return confirm('¿Seguro que quiere eliminar el registro?')" href='?controller=solicitudes&action=cancelarSolicitudes&idCancelar=<?php echo $solicitud->getIdSolicitudes() ?>&idSolicitudes=<?php echo $_SESSION["user_id"]?>'> 
                            <span class="material-icons"> close </span>
                        </a> 
                    </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>

    <br><br>

    <h4 class="text-left">En tramite</h4>
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
            <?php foreach($EnTramite as $solicitud) { ?>
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

    <br><br>

    <h4 class="text-left">Enviado</h4>
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
            <?php foreach($Enviadas as $solicitud) { ?>
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