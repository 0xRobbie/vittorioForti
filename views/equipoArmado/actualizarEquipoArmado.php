<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=equipoarmado&&action=actualizar" method="POST">

        <input type="hidden" name="idEquipoArmado" name="idEquipoArmado" value="<?php echo $sucursal->getIdEquipoArmado() ?>" >

        <div class="form-group">
            <label for="text">idEquipoArmado</label>
            <input type="text" name="idEquipoArmado" id="idEquipoArmado" class="form-control" value="<?php echo $idEquipoArmado->getidEquipoArmado() ?>">
        </div>

        <div class="form-group">
            <label for="text">idFuentePoder</label>
            <input type="text" name="idFuentePoder" id="idFuentePoder" class="form-control" value="<?php echo $idFuentePoder->getidFuentePoder() ?>">
        </div>

        <div class="form-group">
            <label for="text">idRam</label>
            <input type="text" name="idRam" id="idRam" class="form-control" value="<?php echo $idRam->getidRam() ?>">
        </div>

        <div class="form-group">
            <label for="text">idDiscosDuros</label>
            <input type="text" name="idDiscosDuros" id="idDiscosDuros" class="form-control" value="<?php echo $idDiscosDuros->getidDiscosDuros() ?>">
        </div>

        <div class="form-group">
            <label for="text">idTeclados</label>
            <input type="text" name="idTeclados" id="idTeclados" class="form-control" value="<?php echo $idTeclados->getidTeclados() ?>">
        </div>

        <div class="form-group">
            <label for="text">idMouses</label>
            <input type="text" name="idMouses" id="idMouses" class="form-control" value="<?php echo $idMouses->getidMouses() ?>">
        </div>

        <div class="form-group">
            <label for="text">idMonitores</label>
            <input type="text" name="idMonitores" id="idMonitores" class="form-control" value="<?php echo $idMonitores->getidMonitores() ?>">
        </div>

        <div class="form-group">
            <label for="text">idTarjetasMadre</label>
            <input type="text" name="idTarjetasMadre" id="idTarjetasMadre" class="form-control" value="<?php echo $idTarjetasMadre->getidTarjetasMadre() ?>">
        </div>

        <div class="form-group">
            <label for="text">idSO</label>
            <input type="text" name="idSO" id="idSO" class="form-control" value="<?php echo $idSO->getidSO() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar EquipoArmado</button>
    </form>
</div>
