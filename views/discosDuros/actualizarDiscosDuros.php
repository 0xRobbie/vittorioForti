<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=discosduros&&action=actualizar" method="POST">

        <input type="hidden" name="idDiscosDuros" name="idDiscosDuros" value="<?php echo $sucursal->getIdDiscosDuros() ?>" >

        <div class="form-group">
            <label for="text">idDiscosDuros</label>
            <input type="text" name="idDiscosDuros" id="idDiscosDuros" class="form-control" value="<?php echo $idDiscosDuros->getidDiscosDuros() ?>">
        </div>

        <div class="form-group">
            <label for="text">disco</label>
            <input type="text" name="disco" id="disco" class="form-control" value="<?php echo $disco->getdisco() ?>">
        </div>

        <div class="form-group">
            <label for="text">capacidad</label>
            <input type="text" name="capacidad" id="capacidad" class="form-control" value="<?php echo $capacidad->getcapacidad() ?>">
        </div>

        <div class="form-group">
            <label for="text">tipoConexion</label>
            <input type="text" name="tipoConexion" id="tipoConexion" class="form-control" value="<?php echo $tipoConexion->gettipoConexion() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar DiscosDuros</button>
    </form>
</div>
