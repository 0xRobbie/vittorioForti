<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <h1>Productos Solicitados</h1>
    </div>

    <br><br>
    
    <div class="row">
        <div class="col-6">
            <h3>La solicitud a sido enviada con exito</h3>
            <h3>Folio: <?php echo $_POST['idSolicitudes']; ?></h3>
            <!-- <a class="btn btn-primary btn-block" href='?controller=solicitudes&action=verSolicitudProductos&idSolicitudes=<?php echo $_POST['idSolicitudes'] ?>&idUsuario=<?php echo $_SESSION["user_id"]?>'> 
                Ver Solicitud
            </a>  -->
            
        </div>
    </div>
</div>