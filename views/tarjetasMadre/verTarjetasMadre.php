<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idTarjetasMadre</th> 
                <th>tarjeta</th> 
                <th>procesador</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($tarjetasmadre as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idTarjetasMadre'] ?> </td> 
                    <td> <?php echo $ver['tarjeta'] ?> </td> 
                    <td> <?php echo $ver['procesador'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
