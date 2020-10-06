<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idSO</th> 
                <th>sistema</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($so as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idSO'] ?> </td> 
                    <td> <?php echo $ver['sistema'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
