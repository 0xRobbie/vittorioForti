<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idMarca</th> 
                <th>marca</th> 
                <th>idEquipos</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($marca as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idMarca'] ?> </td> 
                    <td> <?php echo $ver['marca'] ?> </td> 
                    <td> <?php echo $ver['idEquipos'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
