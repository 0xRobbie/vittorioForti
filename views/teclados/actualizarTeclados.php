<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=teclados&&action=actualizar" method="POST">

        <input type="hidden" name="idTeclados" name="idTeclados" value="<?php echo $sucursal->getIdTeclados() ?>" >

        <div class="form-group">
            <label for="text">idTeclados</label>
            <input type="text" name="idTeclados" id="idTeclados" class="form-control" value="<?php echo $idTeclados->getidTeclados() ?>">
        </div>

        <div class="form-group">
            <label for="text">teclado</label>
            <input type="text" name="teclado" id="teclado" class="form-control" value="<?php echo $teclado->getteclado() ?>">
        </div>

        <div class="form-group">
            <label for="text">inalambrico</label>
            <input type="text" name="inalambrico" id="inalambrico" class="form-control" value="<?php echo $inalambrico->getinalambrico() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Teclados</button>
    </form>
</div>
