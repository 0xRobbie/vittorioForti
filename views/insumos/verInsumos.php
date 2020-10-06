<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idInsumos</th> 
                <th>insumo</th> 
                <th>modelo</th> 
                <th>piezas</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($insumos as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idInsumos'] ?> </td> 
                    <td> <?php echo $ver['insumo'] ?> </td> 
                    <td> <?php echo $ver['modelo'] ?> </td> 
                    <td> <?php echo $ver['piezas'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
