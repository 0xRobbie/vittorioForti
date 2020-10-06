<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Inventario sucursales y departamentos</h2>
            <br>
        </div>
    </div>

    <div class="row" style="background-color: #F2F2F2">
        <div class="col-1">
            <h6>Lugares: </h6>
        </div>

        <div class="col-11">
            <?php
                $lugarAnterior = '';

                if ($inventario == '0') {
                    echo '<h6>no hay datos para mostrar</h6>';
                } else {
                    foreach ($inventario as $value) {
                        if ($lugarAnterior != $value['sucursal'] && $value['sucursal'] != '') {
                            echo '<a href="#'. $value['sucursal'] .'">' . $value['sucursal'] . '</a>' . '  / ';
                            // echo '<br>';
                            $lugarAnterior = $value['sucursal'];
                        }
                        
                        if ($lugarAnterior != $value['departamento'] && $value['departamento'] != '') {
                            echo '<a href="#'. $value['departamento'] .'">' . $value['departamento'] . '</a>' . '  / ';
                            // echo '<br>';
                            $lugarAnterior = $value['departamento'];
                        }
                    }
                }
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <br><br>
            <?php 
                if ($inventario == '0') {
                    echo '<br><br><br>';
                    echo '<h3>no hay datos para mostrar</h3>';
                } else {
                    
                    $lugarAnterior = '';
                    
                    foreach ($inventario as $value) {
                        if ($lugarAnterior != $value['sucursal'] && $value['sucursal'] != '') {
                            echo '<h4 id="'. $value['sucursal'] .'">' . $value['sucursal'] . '</h4>';
                            echo '<br>';
                            $lugarAnterior = $value['sucursal'];
                            crearTabla($inventario, $lugarAnterior);
                        }
                        
                        if ($lugarAnterior != $value['departamento'] && $value['departamento'] != '') {
                            echo '<h4 id="'. $value['departamento'] .'">' . $value['departamento'] . '</h4>';
                            echo '<br>';
                            $lugarAnterior = $value['departamento'];
                            crearTabla($inventario, $lugarAnterior);
                        }
                    }

                } 
            ?>
        </div>       
    </div>
</div>


<?php
    function crearTabla($inventario, $lugarAnterior)
    {
        echo "<div class=\"table text-center\">";
        echo "    <table class=\"table table-striped table-light\">";
        echo "        <thead class=\"thead-dark\">";
        echo "            <tr>";
        // echo "                <th>Lugar de Trabajo</th>";
        echo "                <th>Productos</th>";
        echo "                <th>Total de piezas</th>";
        echo "                <th>Rastreo</th>";
        echo "            </tr>";
        echo "        </thead>";
        echo "        ";
        echo "        <tbody>";
        foreach($inventario as $piezas) {
            if ($lugarAnterior == $piezas['sucursal'] || $lugarAnterior == $piezas['departamento'] ) {
                echo "                <tr>";
                // echo "                    <td>" . $piezas['sucursal'] . $piezas['departamento'] . "</td>";
                echo "                    <td>" . $piezas['producto'] . "</td>";
                echo "                    <td>" . $piezas['piezas'] . "</td>";
                echo "                    <td>" . $piezas['rastreo'] . "</td>";
            }
        }
        echo "                </tr>";
        echo "        </tbody>";
        echo "    </table>";
        echo "</div>";
        echo "<br>";
        echo "<br>";
    }
?>