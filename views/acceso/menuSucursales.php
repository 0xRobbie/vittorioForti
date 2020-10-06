<?php require_once './views/error.php'; comprobarAcceso(); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Dashboard</h2>
            <br>
        </div>
        <div class="col-4">
            <p style="font-weight: bold"> <?php echo " Usuario: " . $usuario[0][0]; ?> </p>
            <p style="font-weight: bold"> <?php echo " Lugar de trabajo: " . $usuario[0][2] . $usuario[0][3]; ?> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>Máximos y mínimos de productos de papeleria</h4>
            <br>
            <?php
                if ($minmax == '0') {
                    echo "<h6>no hay datos para mostrar</h6>";
                } else {
            ?>
            <table class="table table-bordered table-sm text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Min</th>
                        <th>Max</th>
                        <th>Piezas</th>
                        <th>Lugar</th>
                    </tr>
                </thead>

    
                <tbody>
                    <?php foreach($minmax as $mm) { ?>
                        <tr>
                            <td> <?php echo $mm['producto'] ?> </td>
                            <td> <?php echo $mm['mini'] ?> </td>
                            <td> <?php echo $mm['maxi'] ?> </td>
                            <td> <?php echo $mm['piezaSum'] ?> </td>
                            <td> <?php echo $mm['sucursal'] . $mm['departamento'] ?> </td>
                    <?php } ?>
                    </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>

</div>