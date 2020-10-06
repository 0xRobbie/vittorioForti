<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=fuentepoder&&action=actualizar" method="POST">

        <input type="hidden" name="idFuentePoder" name="idFuentePoder" value="<?php echo $sucursal->getIdFuentePoder() ?>" >

        <div class="form-group">
            <label for="text">idFuentePoder</label>
            <input type="text" name="idFuentePoder" id="idFuentePoder" class="form-control" value="<?php echo $idFuentePoder->getidFuentePoder() ?>">
        </div>

        <div class="form-group">
            <label for="text">fuentePoder</label>
            <input type="text" name="fuentePoder" id="fuentePoder" class="form-control" value="<?php echo $fuentePoder->getfuentePoder() ?>">
        </div>

        <div class="form-group">
            <label for="text">watts</label>
            <input type="text" name="watts" id="watts" class="form-control" value="<?php echo $watts->getwatts() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar FuentePoder</button>
    </form>
</div>
