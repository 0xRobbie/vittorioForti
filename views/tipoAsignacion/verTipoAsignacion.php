<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idTipoAsignacion</th> 
                <th>asignacion</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($tipoasignacion as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idTipoAsignacion'] ?> </td> 
                    <td> <?php echo $ver['asignacion'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
