<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=asignacionequipo&&action=actualizar" method="POST">

        <input type="hidden" name="idAsignacionEquipo" name="idAsignacionEquipo" value="<?php echo $sucursal->getIdAsignacionEquipo() ?>" >

        <div class="form-group">
            <label for="text">idAsignacionEquipo</label>
            <input type="text" name="idAsignacionEquipo" id="idAsignacionEquipo" class="form-control" value="<?php echo $idAsignacionEquipo->getidAsignacionEquipo() ?>">
        </div>

        <div class="form-group">
            <label for="text">idUsuarios</label>
            <input type="text" name="idUsuarios" id="idUsuarios" class="form-control" value="<?php echo $idUsuarios->getidUsuarios() ?>">
        </div>

        <div class="form-group">
            <label for="text">idTipoAsignacion</label>
            <input type="text" name="idTipoAsignacion" id="idTipoAsignacion" class="form-control" value="<?php echo $idTipoAsignacion->getidTipoAsignacion() ?>">
        </div>

        <div class="form-group">
            <label for="text">ultimoMovimiento</label>
            <input type="text" name="ultimoMovimiento" id="ultimoMovimiento" class="form-control" value="<?php echo $ultimoMovimiento->getultimoMovimiento() ?>">
        </div>

        <div class="form-group">
            <label for="text">idEquipos</label>
            <input type="text" name="idEquipos" id="idEquipos" class="form-control" value="<?php echo $idEquipos->getidEquipos() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar AsignacionEquipo</button>
    </form>
</div>
