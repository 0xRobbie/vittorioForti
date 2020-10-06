<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=mouses&&action=actualizar" method="POST">

        <input type="hidden" name="idMouses" name="idMouses" value="<?php echo $sucursal->getIdMouses() ?>" >

        <div class="form-group">
            <label for="text">idMouses</label>
            <input type="text" name="idMouses" id="idMouses" class="form-control" value="<?php echo $idMouses->getidMouses() ?>">
        </div>

        <div class="form-group">
            <label for="text">mouse</label>
            <input type="text" name="mouse" id="mouse" class="form-control" value="<?php echo $mouse->getmouse() ?>">
        </div>

        <div class="form-group">
            <label for="text">inalambrico</label>
            <input type="text" name="inalambrico" id="inalambrico" class="form-control" value="<?php echo $inalambrico->getinalambrico() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Mouses</button>
    </form>
</div>
