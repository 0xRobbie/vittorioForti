<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idDiscosDuros</th> 
                <th>disco</th> 
                <th>capacidad</th> 
                <th>tipoConexion</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($discosduros as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idDiscosDuros'] ?> </td> 
                    <td> <?php echo $ver['disco'] ?> </td> 
                    <td> <?php echo $ver['capacidad'] ?> </td> 
                    <td> <?php echo $ver['tipoConexion'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
