<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Inventario Sucursal</h2>
            <br>
        </div>

            <div class="table text-center">

        <?php 
            if ($inventario == '0') {
                echo '<br><br><br>';
                echo '<h3>no hay datos para mostrar</h3>';
            } else {
        ?>

                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Clave Producto</th>
                            <th>Productos</th>
                            <th>Total de piezas</th>
                            <th>Rastreo</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($inventario as $piezas) { ?>
                            <tr>
                                <td> <?php echo $piezas['idPapeleria'] ?> </td>
                                <td> <?php echo $piezas['producto'] ?> </td>
                                <td> <?php echo $piezas['piezas'] ?> </td>
                                <td> <?php echo $piezas['rastreo'] ?> </td>
                        <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>

        <?php } ?>
    </div>
</div>

