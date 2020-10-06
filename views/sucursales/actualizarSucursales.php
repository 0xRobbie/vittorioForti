<?php require_once './views/error.php'; comprobarAcceso(); ?>
    
<div class="container">
    <form action="?controller=sucursales&&action=actualizar" method="POST">
        
        <input type="hidden" name="idSucursales" name="idSucursales" value="<?php echo $sucursal->getIdSucursales() ?>" >
        
        <div class="form-group">
            <label for="text">Sucursal</label>
            <input type="text" name="sucursal" id="sucursal" class="form-control" value="<?php echo $sucursal->getSucursal() ?>">
        </div>
        <div class="form-group">
            <label for="text">Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $sucursal->getDireccion(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Region</label>
            <input type="text" name="region" id="region" class="form-control" value="<?php echo $sucursal->getRegion(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Colonia</label>
            <input type="text" name="colonia" id="colonia" class="form-control" value="<?php echo $sucursal->getColonia(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Municipio</label>
            <input type="text" name="municipio" id="municipio" class="form-control" value="<?php echo $sucursal->getMunicipio(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="<?php echo $sucursal->getEstado(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $sucursal->getTelefono(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Correo</label>
            <input type="text" name="correo" id="correo" class="form-control" value="<?php echo $sucursal->getCorreo(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Código Postal</label>
            <input type="text" name="cp" id="cp" class="form-control" value="<?php echo $sucursal->getCP(); ?>">
        </div>
        
        <br>

        <button type="submit" class="btn btn-primary">Actualizar Sucursal</button>
    </form>
</div>
