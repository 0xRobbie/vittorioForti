<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="table text-center"> 
     
    <table class="table table-striped table-light"> 
        <thead> 
            <tr> 
                <th>idEquipoArmado</th> 
                <th>idFuentePoder</th> 
                <th>idRam</th> 
                <th>idDiscosDuros</th> 
                <th>idTeclados</th> 
                <th>idMouses</th> 
                <th>idMonitores</th> 
                <th>idTarjetasMadre</th> 
                <th>idSO</th> 
            </tr> 
        </thead> 
 
        <tbody> 
            <?php foreach($equipoarmado as $ver) { ?> 
                <tr> 
                    <td> <?php echo $ver['idEquipoArmado'] ?> </td> 
                    <td> <?php echo $ver['idFuentePoder'] ?> </td> 
                    <td> <?php echo $ver['idRam'] ?> </td> 
                    <td> <?php echo $ver['idDiscosDuros'] ?> </td> 
                    <td> <?php echo $ver['idTeclados'] ?> </td> 
                    <td> <?php echo $ver['idMouses'] ?> </td> 
                    <td> <?php echo $ver['idMonitores'] ?> </td> 
                    <td> <?php echo $ver['idTarjetasMadre'] ?> </td> 
                    <td> <?php echo $ver['idSO'] ?> </td> 
            <?php } ?> 
                </tr> 
        </tbody> 
    </table> 
</div> 
