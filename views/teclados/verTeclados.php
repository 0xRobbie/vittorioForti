<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idTeclados</th> 
                <th>teclado</th> 
                <th>inalambrico</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($teclados as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idTeclados'] ?> </td> 
                    <td> <?php echo $ver['teclado'] ?> </td> 
                    <td> <?php echo $ver['inalambrico'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
