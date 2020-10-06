<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Sucursales</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=sucursales&action=formularioSucursales">
                    <span class="material-icons">playlist_add</span>
                </a>
            </div>
        </div>
    </div>

    <br>
    
    <table class="table table-responsive-sm table-striped table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Sucursal</th>
                <th>Region</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Borrar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($sucursales as $sucursal) { ?>
                <tr>
                    <td>  
                        <a href='?controller=sucursales&action=actualizarSucursales&idSucursales=<?php echo $sucursal[0] ?>'> 
                            <?php echo $sucursal[0] ?> 
                        </a> 
                    </td> <!-- idsucursal -->
                    
                    <td> <?php echo $sucursal[1] ?> </td> <!-- sucursal -->
                    <td> <?php echo $sucursal[2] ?> </td> <!-- ubicación -->
                    <td> <?php echo $sucursal[3] ?> </td> <!-- region -->
                    <td> <?php echo $sucursal[4] ?> </td> <!-- telefono -->
                    <td> 
                        <a class="btn btn-danger btn-block" onclick="return confirm('¿Seguro que quiere eliminar el registro?')" href='?controller=sucursales&action=borrarSucursales&idSucursales=<?php echo $sucursal['idSucursales'] ?>'> 
                            <span class="material-icons"> close </span>
                        </a> 
                    </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

