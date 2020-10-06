<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idEquipos</th> 
                <th>idImpresoras</th> 
                <th>idEquipoArmado</th> 
                <th>idDispositivoMovil</th> 
                <th>idInsumos</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($equipos as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idEquipos'] ?> </td> 
                    <td> <?php echo $ver['idImpresoras'] ?> </td> 
                    <td> <?php echo $ver['idEquipoArmado'] ?> </td> 
                    <td> <?php echo $ver['idDispositivoMovil'] ?> </td> 
                    <td> <?php echo $ver['idInsumos'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
