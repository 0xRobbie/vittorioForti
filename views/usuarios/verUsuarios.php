<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Usuarios</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=usuarios&action=formularioUsuarios">
                    <span class="material-icons">playlist_add</span>
                </a>
            </div>
        </div>
    </div>

    <br>
    
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Tipo Usuario</th>
                <th>Lugar de Trabajo</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($usuarios as $usuario) { ?>
                <tr>
                    <td>  
                        <a href='?controller=usuarios&action=actualizarUsuarios&idUsuarios=<?php echo $usuario['idUsuarios'] ?>'> 
                            <?php echo $usuario['idUsuarios'] ?> 
                        </a> 
                    </td>
                    <td> <?php echo $usuario['usuarios'] ?> </td>
                    <td> <?php echo $usuario['tipo'] ?> </td>
                    
                    <?php if (isset($usuario['departamento'])) { ?>
                        <td> <?php echo $usuario['departamento'] ?> </td>
                    <?php } ?>

                    <?php if (isset($usuario['sucursal'])) { ?>
                        <td> <?php echo $usuario['sucursal'] ?> </td>
                    <?php } ?>

                    <td> 
                        <a class="btn btn-danger btn-block" onclick="return confirm('¿Seguro que quiere eliminar el registro?')" href='?controller=usuarios&action=borrarUsuarios&idUsuarios=<?php echo $usuario['idUsuarios'] ?>'> 
                            <span class="material-icons"> close </span>
                        </a> 
                    </td>

            <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

