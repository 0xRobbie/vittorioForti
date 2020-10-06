<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=equipos&&action=actualizar" method="POST">

        <input type="hidden" name="idEquipos" name="idEquipos" value="<?php echo $sucursal->getIdEquipos() ?>" >

        <div class="form-group">
            <label for="text">idEquipos</label>
            <input type="text" name="idEquipos" id="idEquipos" class="form-control" value="<?php echo $idEquipos->getidEquipos() ?>">
        </div>

        <div class="form-group">
            <label for="text">idImpresoras</label>
            <input type="text" name="idImpresoras" id="idImpresoras" class="form-control" value="<?php echo $idImpresoras->getidImpresoras() ?>">
        </div>

        <div class="form-group">
            <label for="text">idEquipoArmado</label>
            <input type="text" name="idEquipoArmado" id="idEquipoArmado" class="form-control" value="<?php echo $idEquipoArmado->getidEquipoArmado() ?>">
        </div>

        <div class="form-group">
            <label for="text">idDispositivoMovil</label>
            <input type="text" name="idDispositivoMovil" id="idDispositivoMovil" class="form-control" value="<?php echo $idDispositivoMovil->getidDispositivoMovil() ?>">
        </div>

        <div class="form-group">
            <label for="text">idInsumos</label>
            <input type="text" name="idInsumos" id="idInsumos" class="form-control" value="<?php echo $idInsumos->getidInsumos() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Equipos</button>
    </form>
</div>
