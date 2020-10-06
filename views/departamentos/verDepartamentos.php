<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Departamentos</h2>
            </div>
            <div class="col-4">
                <a class="btn btn-primary btn-block" href="?controller=departamentos&action=formularioDepartamentos">
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
                <th>Departamento</th>
                <th>Borrar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($departamentos as $departamento) { ?>
                <tr>
                    <td>  
                        <a href='?controller=departamentos&action=actualizarDepartamentos&idDepartamentos=<?php echo $departamento->getIdDepartamentos() ?>'> 
                            <?php echo $departamento->getIdDepartamentos() ?> 
                        </a> 
                    </td>
                    <td> <?php echo $departamento->getDepartamento() ?> </td>
                    <td> 
                        <a class="btn btn-danger btn-block" onclick="return confirm('¿Seguro que quiere eliminar el registro?')" href='?controller=departamentos&action=borrarDepartamentos&idDepartamentos=<?php echo $departamento->getIdDepartamentos() ?>'> 
                            <span class="material-icons"> close </span>
                        </a> 
                    </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

