<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idAsignacionEquipo</th> 
                <th>idUsuarios</th> 
                <th>idTipoAsignacion</th> 
                <th>ultimoMovimiento</th> 
                <th>idEquipos</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($asignacionequipo as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idAsignacionEquipo'] ?> </td> 
                    <td> <?php echo $ver['idUsuarios'] ?> </td> 
                    <td> <?php echo $ver['idTipoAsignacion'] ?> </td> 
                    <td> <?php echo $ver['ultimoMovimiento'] ?> </td> 
                    <td> <?php echo $ver['idEquipos'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
