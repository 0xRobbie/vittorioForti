<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Papeleria</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=papeleria&action=formularioPapeleria">
                    <span class="material-icons">playlist_add</span>
                </a>
            </div>
        </div>
    </div>

    <br>

    <?php 
        if ($papeleria == '0') {
            echo '<br><br><br>';
            echo '<h3>no hay datos para mostrar</h3>';
        } else {
    ?>
    
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Stock Mínimo</th>
                <th>Min Sucursal</th>
                <th>Max Sucursal</th>
                <th>Folio</th>
                <th>Formato</th>
                <th>Tipo producto</th>
                <th>Borrar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($papeleria as $producto) { ?>
                <tr>
                    <td>  
                        <a href='?controller=papeleria&action=actualizarPapeleria&idPapeleria=<?php echo $producto['idPapeleria'] ?>'> 
                            <?php echo $producto['idPapeleria'] ?> 
                        </a> 
                    </td>
                    <td> <?php echo $producto['producto'] ?> </td>
                    <td> <?php echo $producto['stockMinimo'] ?> </td>
                    <td> <?php echo $producto['minimoSucursal'] ?> </td>
                    <td> <?php echo $producto['maximoSucursal'] ?> </td>
                    <td> <?php echo $producto['folio'] ?> </td>
                    <td> <?php echo $producto['formato'] ?> </td>
                    <td> <?php echo $producto['tipoPapeleria'] ?> </td>
                    <td> 
                        <a class="btn btn-danger btn-block" onclick="return confirm('¿Seguro que quiere eliminar el registro?')" href='?controller=papeleria&action=borrarPapeleria&idPapeleria=<?php echo $producto['idPapeleria'] ?>'> 
                            <span class="material-icons"> close </span>
                        </a> 
                    </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>

    <?php } ?>
</div>

