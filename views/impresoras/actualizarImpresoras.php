<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=impresoras&&action=actualizar" method="POST">

        <input type="hidden" name="idImpresoras" name="idImpresoras" value="<?php echo $sucursal->getIdImpresoras() ?>" >

        <div class="form-group">
            <label for="text">idImpresoras</label>
            <input type="text" name="idImpresoras" id="idImpresoras" class="form-control" value="<?php echo $idImpresoras->getidImpresoras() ?>">
        </div>

        <div class="form-group">
            <label for="text">modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="<?php echo $modelo->getmodelo() ?>">
        </div>

        <div class="form-group">
            <label for="text">idInsumos</label>
            <input type="text" name="idInsumos" id="idInsumos" class="form-control" value="<?php echo $idInsumos->getidInsumos() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Impresoras</button>
    </form>
</div>
