<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=dispositivo&&action=actualizar" method="POST">

        <input type="hidden" name="idDispositivo" name="idDispositivo" value="<?php echo $sucursal->getIdDispositivo() ?>" >

        <div class="form-group">
            <label for="text">idDispositivo</label>
            <input type="text" name="idDispositivo" id="idDispositivo" class="form-control" value="<?php echo $idDispositivo->getidDispositivo() ?>">
        </div>

        <div class="form-group">
            <label for="text">dispositivo</label>
            <input type="text" name="dispositivo" id="dispositivo" class="form-control" value="<?php echo $dispositivo->getdispositivo() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Dispositivo</button>
    </form>
</div>
