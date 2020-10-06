<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=so&&action=actualizar" method="POST">

        <input type="hidden" name="idSO" name="idSO" value="<?php echo $sucursal->getIdSO() ?>" >

        <div class="form-group">
            <label for="text">idSO</label>
            <input type="text" name="idSO" id="idSO" class="form-control" value="<?php echo $idSO->getidSO() ?>">
        </div>

        <div class="form-group">
            <label for="text">sistema</label>
            <input type="text" name="sistema" id="sistema" class="form-control" value="<?php echo $sistema->getsistema() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar SO</button>
    </form>
</div>
