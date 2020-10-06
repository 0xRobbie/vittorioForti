<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Tipo de Usuario</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=tipoUsuario&action=formularioTipoUsuario">
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
                <th>Tipo de Usuario</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($tipoUsuarios as $tipo) { ?>
                <tr>
                    <td>  
                        <a href='?controller=tipoUsuario&action=actualizartipoUsuario&idtipoUsuario=<?php echo $tipo['idtipoUsuario'] ?>'> 
                            <?php echo $tipo['idtipoUsuario'] ?> 
                        </a> 
                    </td>
                    <td> <?php echo $tipo['tipoUsuario'] ?> </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

