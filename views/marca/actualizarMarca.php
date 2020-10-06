<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=marca&&action=actualizar" method="POST">

        <input type="hidden" name="idMarca" name="idMarca" value="<?php echo $sucursal->getIdMarca() ?>" >

        <div class="form-group">
            <label for="text">idMarca</label>
            <input type="text" name="idMarca" id="idMarca" class="form-control" value="<?php echo $idMarca->getidMarca() ?>">
        </div>

        <div class="form-group">
            <label for="text">marca</label>
            <input type="text" name="marca" id="marca" class="form-control" value="<?php echo $marca->getmarca() ?>">
        </div>

        <div class="form-group">
            <label for="text">idEquipos</label>
            <input type="text" name="idEquipos" id="idEquipos" class="form-control" value="<?php echo $idEquipos->getidEquipos() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Marca</button>
    </form>
</div>
