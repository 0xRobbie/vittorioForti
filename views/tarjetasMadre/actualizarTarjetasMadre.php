<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=tarjetasmadre&&action=actualizar" method="POST">

        <input type="hidden" name="idTarjetasMadre" name="idTarjetasMadre" value="<?php echo $sucursal->getIdTarjetasMadre() ?>" >

        <div class="form-group">
            <label for="text">idTarjetasMadre</label>
            <input type="text" name="idTarjetasMadre" id="idTarjetasMadre" class="form-control" value="<?php echo $idTarjetasMadre->getidTarjetasMadre() ?>">
        </div>

        <div class="form-group">
            <label for="text">tarjeta</label>
            <input type="text" name="tarjeta" id="tarjeta" class="form-control" value="<?php echo $tarjeta->gettarjeta() ?>">
        </div>

        <div class="form-group">
            <label for="text">procesador</label>
            <input type="text" name="procesador" id="procesador" class="form-control" value="<?php echo $procesador->getprocesador() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar TarjetasMadre</button>
    </form>
</div>
