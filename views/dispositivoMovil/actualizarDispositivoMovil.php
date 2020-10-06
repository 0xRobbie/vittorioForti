<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=dispositivomovil&&action=actualizar" method="POST">

        <input type="hidden" name="idDispositivoMovil" name="idDispositivoMovil" value="<?php echo $sucursal->getIdDispositivoMovil() ?>" >

        <div class="form-group">
            <label for="text">idDispositivoMovil</label>
            <input type="text" name="idDispositivoMovil" id="idDispositivoMovil" class="form-control" value="<?php echo $idDispositivoMovil->getidDispositivoMovil() ?>">
        </div>

        <div class="form-group">
            <label for="text">idDispositivo</label>
            <input type="text" name="idDispositivo" id="idDispositivo" class="form-control" value="<?php echo $idDispositivo->getidDispositivo() ?>">
        </div>

        <div class="form-group">
            <label for="text">idSO</label>
            <input type="text" name="idSO" id="idSO" class="form-control" value="<?php echo $idSO->getidSO() ?>">
        </div>

        <div class="form-group">
            <label for="text">memoria</label>
            <input type="text" name="memoria" id="memoria" class="form-control" value="<?php echo $memoria->getmemoria() ?>">
        </div>

        <div class="form-group">
            <label for="text">almacenamiento</label>
            <input type="text" name="almacenamiento" id="almacenamiento" class="form-control" value="<?php echo $almacenamiento->getalmacenamiento() ?>">
        </div>

        <div class="form-group">
            <label for="text">identificador</label>
            <input type="text" name="identificador" id="identificador" class="form-control" value="<?php echo $identificador->getidentificador() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar DispositivoMovil</button>
    </form>
</div>
