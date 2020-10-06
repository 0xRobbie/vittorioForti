<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idRam</th> 
                <th>ram</th> 
                <th>capacidad</th> 
                <th>tipo</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($ram as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idRam'] ?> </td> 
                    <td> <?php echo $ver['ram'] ?> </td> 
                    <td> <?php echo $ver['capacidad'] ?> </td> 
                    <td> <?php echo $ver['tipo'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
