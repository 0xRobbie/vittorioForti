<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=insumos&&action=actualizar" method="POST">

        <input type="hidden" name="idInsumos" name="idInsumos" value="<?php echo $sucursal->getIdInsumos() ?>" >

        <div class="form-group">
            <label for="text">idInsumos</label>
            <input type="text" name="idInsumos" id="idInsumos" class="form-control" value="<?php echo $idInsumos->getidInsumos() ?>">
        </div>

        <div class="form-group">
            <label for="text">insumo</label>
            <input type="text" name="insumo" id="insumo" class="form-control" value="<?php echo $insumo->getinsumo() ?>">
        </div>

        <div class="form-group">
            <label for="text">modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="<?php echo $modelo->getmodelo() ?>">
        </div>

        <div class="form-group">
            <label for="text">piezas</label>
            <input type="text" name="piezas" id="piezas" class="form-control" value="<?php echo $piezas->getpiezas() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Insumos</button>
    </form>
</div>
