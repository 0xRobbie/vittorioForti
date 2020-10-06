<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idDispositivoMovil</th> 
                <th>idDispositivo</th> 
                <th>idSO</th> 
                <th>memoria</th> 
                <th>almacenamiento</th> 
                <th>identificador</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($dispositivomovil as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idDispositivoMovil'] ?> </td> 
                    <td> <?php echo $ver['idDispositivo'] ?> </td> 
                    <td> <?php echo $ver['idSO'] ?> </td> 
                    <td> <?php echo $ver['memoria'] ?> </td> 
                    <td> <?php echo $ver['almacenamiento'] ?> </td> 
                    <td> <?php echo $ver['identificador'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
