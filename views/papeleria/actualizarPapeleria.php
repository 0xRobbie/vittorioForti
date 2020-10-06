<?php require_once './views/error.php'; comprobarAcceso(); ?>
    
<div class="container">
    <form action="?controller=papeleria&&action=actualizar" method="POST">
        
        <input type="hidden" name="idPapeleria" name="idPapeleria" value="<?php echo $producto->getIdPapeleria() ?>" >
        
        <div class="form-group">
            <label for="text">Producto</label>
            <input type="text" name="producto" id="producto" class="form-control" value="<?php echo $producto->getProducto() ?>">
        </div>
        <div class="form-group">
            <label for="text">Stock mínimo</label>
            <input type="text" name="stockMinimo" id="stockMinimo" class="form-control" value="<?php echo $producto->getStockMinimo(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Mínimo Sucursal</label>
            <input type="text" name="minimoSucursal" id="minimoSucursal" class="form-control" value="<?php echo $producto->getMinimoSucursal(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Máximo Sucursal</label>
            <input type="text" name="maximoSucursal" id="maximoSucursal" class="form-control" value="<?php echo $producto->getMaximoSucursal(); ?>">
        </div>
        <div class="form-group row">
            <label class="col-3 col-form-label" for="folio"> Folio </label>
            <div class="col-9">
                <select class="form-control form-control-sm" name="folio" id="folio">
                    <option value="0">NO</option>
                    <option value="1">SI</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="text">Formato</label>
            <select class="form-control form-control-sm" name="idFormato" id="idFormato">
                <?php foreach ($formatos as $form) { ?>
                    <option value="<?php echo $form['idFormato'] ?>"><?php echo $form['idFormato'].". ".  $form['formato'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="text">Tipo Papeleria</label>
            <select class="form-control form-control-sm" name="idTipoPapeleria" id="idTipoPapeleria">
                <?php foreach ($tiposPapeleria as $tipo) { ?>
                    <option value="<?php echo $tipo['idTipoPapeleria'] ?>"><?php echo $tipo['idTipoPapeleria'].". ".  $tipo['tipoPapeleria'] ?></option>
                <?php } ?>
            </select>
        </div>
        
        <br>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
