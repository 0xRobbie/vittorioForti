<?php require_once './views/error.php'; comprobarAcceso(); ?>
    
<div class="container">
    <form action="?controller=movimientos&&action=actualizar" method="POST">
        
        <input type="hidden" name="idSucursales" name="idSucursales" value="<?php echo $id ?>" >

        <p> <?php $inventario ?> </p>
        
        <div class="form-group">
            <label for="text">Ubicacion</label>
            <select class="form-control" name="ubicacion" id="ubicacion">
                <option selected value="0"> - seleccionar - </option>
                <?php foreach ($ubicaciones as $ubicacion) { ?>
                    <option value="<?php echo $ubicacion[0] ?>"><?php echo $ubicacion[0].". ". $ubicacion[1] ?></option>
                <?php } ?>
            </select>
        </div>
        
        <br>

        <button type="submit" class="btn btn-primary">Actualizar Ubicacion</button>
    </form>
</div>