<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2>Dashboard Sistemas</h2>
            <br>
        </div>
        <div class="col-4">
            <p style="font-weight: bold"> <?php echo " Usuario: " . $usuario[0][0]; ?> </p>
            <p style="font-weight: bold"> <?php echo " Lugar de trabajo: " . $usuario[0][2] . $usuario[0][3]; ?> </p>
        </div>
    </div>
    <br>

    <!-- Mostrar departamentos y sucursales que ya hicieron un pedido -->
    <!-- <div class="row">
        <div class="col-12">
            <h4>Solicitudes de papeleria</h4>
            <br>
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 50%"> <?php echo $datos[0][0] . " <br> " . $datos[0][1] . " de " . $datos[1][1]; ?> </th>
                        <th style="width: 50%"> <?php echo $datos[2][0] . " <br> " . $datos[2][1] . " de " . $datos[3][1]; ?> </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div> -->
    <br><br>

    <div class="row">
        <div class="col-12">
            <h4>Máximos y mínimos de papeleria</h4>
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
    <br><br>

    <div class="row">
        <div class="col-12">
            <h4>Stock minimo (sistemas)</h4>
            <br>
            <?php
                if ($stock == '0') {
                    echo "<h6>no hay datos para mostrar</h6>";
                } else {
            ?>
            <table class="table table-bordered table-sm text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Piezas</th>
                        <th>Lugar</th>
                    </tr>
                </thead>

    
                <tbody>
                    <?php foreach($stock as $mm) { ?>
                        <tr>
                            <td> <?php echo $mm['producto'] ?> </td>
                            <td> <?php echo $mm['stockMinimo'] ?> </td>
                            <td> <?php echo $mm['piezaSum'] ?> </td>
                            <td> <?php echo $mm['sucursal'] . $mm['departamento'] ?> </td>
                    <?php } ?>
                    </tr>
                </tbody>
            <?php } ?>
            </table>
            <br><br>
        </div>

    </div>

    <div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Inventario Papeleria (sistemas)</h2>
            <br>
        </div>

            <div class="table">

        <?php 
            if ($inventario == '0') {
                echo '<br><br><br>';
                echo '<h3>no hay datos para mostrar</h3>';
            } else {
        ?>

                <table class="table table-sm table-striped table-light">
                    <thead>
                        <tr>
                            <th>Total de piezas</th>
                            <th>Productos</th>
                            <th>Tipo de Papeleria</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($inventario as $piezas) { ?>
                            <tr>
                                <td> <?php echo $piezas['piezas'] . " " . $piezas['formato']?> </td>
                                <td> <?php echo $piezas['producto'] ?> </td>
                                <?php if ($piezas['idTipoPapeleria'] == 1) { ?>
                                    <td> papeleria </td>
                                <?php } ?>
                                <?php if ($piezas['idTipoPapeleria'] == 2) { ?>
                                    <td> papeleria impresa </td>
                                <?php } ?>
                        <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>

        <?php } ?>
    </div>

</div>