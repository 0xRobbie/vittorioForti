<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idDispositivo</th> 
                <th>dispositivo</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($dispositivo as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idDispositivo'] ?> </td> 
                    <td> <?php echo $ver['dispositivo'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
