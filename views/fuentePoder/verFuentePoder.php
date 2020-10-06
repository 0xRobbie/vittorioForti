<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idFuentePoder</th> 
                <th>fuentePoder</th> 
                <th>watts</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($fuentepoder as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idFuentePoder'] ?> </td> 
                    <td> <?php echo $ver['fuentePoder'] ?> </td> 
                    <td> <?php echo $ver['watts'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
