<?php require_once './views/error.php'; comprobarAcceso(); ?>
    
<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Ver Estatus</h2>
            </div>
        </div>
    </div>

    <br>

    <?php 
        if ($estatus == '0') {
            echo '<br><br><br>';
            echo '<h3>no hay datos para mostrar</h3>';
        } else {
    ?>
    
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Requerimiento</th>
                <th>Producto</th>
                <th>Piezas</th>
                <th>Rastreo</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($estatus as $status) { ?>
                <tr>
                    <td> <?php echo $status['idRequerimientos'] ?> </td>
                    <td> <?php echo $status['producto'] ?> </td>
                    <td> <?php echo $status['piezas'] ?> </td>
                    <td> <?php echo $status['rastreo'] ?> </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>


    <?php } ?>
</div>
