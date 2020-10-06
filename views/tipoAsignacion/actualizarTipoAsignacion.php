<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=tipoasignacion&&action=actualizar" method="POST">

        <input type="hidden" name="idTipoAsignacion" name="idTipoAsignacion" value="<?php echo $sucursal->getIdTipoAsignacion() ?>" >

        <div class="form-group">
            <label for="text">idTipoAsignacion</label>
            <input type="text" name="idTipoAsignacion" id="idTipoAsignacion" class="form-control" value="<?php echo $idTipoAsignacion->getidTipoAsignacion() ?>">
        </div>

        <div class="form-group">
            <label for="text">asignacion</label>
            <input type="text" name="asignacion" id="asignacion" class="form-control" value="<?php echo $asignacion->getasignacion() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar TipoAsignacion</button>
    </form>
</div>
