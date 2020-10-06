<?php require_once './views/error.php'; comprobarAcceso(); ?> 
 
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Claves</h2>
        </div>
        <div class="col-4">
            <a class="btn btn-primary btn-block" href="?controller=claves&&action=formularioClaves">
                Agregar clave a usuario
            </a>
        </div>
    </div>
    <br>

    <div class="row" style="background-color: #F2F2F2">
        <div class="col-1">
            <h6>Servicios: </h6>
        </div>

        <div class="col-11">
            <?php
                $servicioAnterior = '';

                if ($claves == '0') {
                    echo '<h6>no hay datos para mostrar</h6>';
                } else {
                    foreach ($claves as $ver) {
                        if ( $servicioAnterior != $ver->getidServicio() ) {
                            echo '<a href="#'. $ver->getidServicio() .'">' . $ver->getidServicio() . '</a>' . '  / ';
                            $servicioAnterior = $ver->getidServicio();
                        }
                    }
                }
            ?>
        </div>
    </div>
    <br>
    
    <div class="row">
        <div class="col-12">
            <br><br>
            <?php 
                if ($claves == '0') {
                    echo '<br><br><br>';
                    echo '<h3>no hay datos para mostrar</h3>';
                } else {
                    
                    $servicioAnterior = '';
                    
                    foreach ($claves as $ver) {
                        if ($servicioAnterior != $ver->getidServicio() ) {
                            echo '<h4 id="'. $ver->getidServicio() .'">' . $ver->getidServicio() . '</h4>';
                            echo '<br>';
                            $servicioAnterior = $ver->getidServicio();
                            crearTabla($claves, $servicioAnterior);
                        }
                    } 
                } 
            ?>
        </div>       
    </div>
</div>


<?php
    function crearTabla($claves, $servicioAnterior)
    {
        echo "    <div class=\"row\">";
        echo "        <div class=\"table text-center\"> ";
        echo "            <table class=\"table table-striped table-light\"> ";
        echo "                <thead class=\"thead-dark\"> ";
        echo "                    <tr> ";
        echo "                        <th>idClaves</th> ";
        echo "                        <th>usuario serv.</th> ";
        echo "                        <th>password serv.</th> ";
        echo "                        <th>servicio</th> ";
        echo "                        <th>usuario</th> ";
        echo "                        <th>Borrar</th> ";
        echo "                    </tr> ";
        echo "                </thead> ";
        echo "        ";
        echo "                <tbody> ";
        foreach( $claves as $ver ) {
            if ( $servicioAnterior == $ver->getidServicio() ) {
                echo "                        <tr> ";
                echo "                            <td>" . $ver->getidClaves() . "</td> ";
                echo "                            <td>" . $ver->getusuario() . "</td> ";
                echo "                            <td>" . $ver->getpassword() . "</td> ";
                echo "                            <td>" . $ver->getidServicio() . "</td> ";
                echo "                            <td>" . $ver->getidUsuarios() . "</td> ";
                echo "                            <td> ";
                echo "                                <a class=\"btn btn-danger btn-block\" onclick=\"return confirm('¿Seguro que quiere eliminar el registro?')\" href='?controller=claves&action=borrarClaves&idClaves=" . $ver->getidClaves() . "'> ";
                echo "                                    <span class=\"material-icons\"> close </span>";
                echo "                                </a> ";
                echo "                            </td>";
            }
        }
        echo "                        </tr> ";
        echo "                </tbody> ";
        echo "            </table> ";
        echo "        </div> ";
        echo "    </div>";
    }
?>
