<?php require_once './views/error.php'; comprobarAcceso(); ?>
    
<div class="container">
    <form action="?controller=departamentos&&action=actualizar" method="POST">
        
        <input type="hidden" name="idDepartamentos" name="idDepartamentos" value="<?php echo $departamentos->getIdDepartamentos() ?>" >
        
        <div class="form-group">
            <label for="text">Departamento:</label>
            <input type="text" name="departamento" id="departamento" class="form-control" value="<?php echo $departamentos->getDepartamento() ?>">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Actualizar Departamento</button>
    </form>
</div>
