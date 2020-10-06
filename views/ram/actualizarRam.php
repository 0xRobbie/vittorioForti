<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=ram&&action=actualizar" method="POST">

        <input type="hidden" name="idRam" name="idRam" value="<?php echo $sucursal->getIdRam() ?>" >

        <div class="form-group">
            <label for="text">idRam</label>
            <input type="text" name="idRam" id="idRam" class="form-control" value="<?php echo $idRam->getidRam() ?>">
        </div>

        <div class="form-group">
            <label for="text">ram</label>
            <input type="text" name="ram" id="ram" class="form-control" value="<?php echo $ram->getram() ?>">
        </div>

        <div class="form-group">
            <label for="text">capacidad</label>
            <input type="text" name="capacidad" id="capacidad" class="form-control" value="<?php echo $capacidad->getcapacidad() ?>">
        </div>

        <div class="form-group">
            <label for="text">tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $tipo->gettipo() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Ram</button>
    </form>
</div>
