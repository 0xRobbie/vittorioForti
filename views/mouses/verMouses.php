<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idMouses</th> 
                <th>mouse</th> 
                <th>inalambrico</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($mouses as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idMouses'] ?> </td> 
                    <td> <?php echo $ver['mouse'] ?> </td> 
                    <td> <?php echo $ver['inalambrico'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
