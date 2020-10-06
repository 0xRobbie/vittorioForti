<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idMonitores</th> 
                <th>monitor</th> 
                <th>resolucion</th> 
                <th>puertos</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($monitores as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idMonitores'] ?> </td> 
                    <td> <?php echo $ver['monitor'] ?> </td> 
                    <td> <?php echo $ver['resolucion'] ?> </td> 
                    <td> <?php echo $ver['puertos'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
