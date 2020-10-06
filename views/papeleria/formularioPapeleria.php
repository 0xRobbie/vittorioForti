<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Nuevo Producto</h2>
            <br>

            <form action="?controller=papeleria&&action=crearPapeleria" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="producto"> Producto </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="producto" id="producto" placeholder=" nombre de la producto" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="stockMinimo"> Stock Minimo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="stockMinimo" id="stockMinimo" placeholder="stock mínimo en almacén" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="minimoSucursal"> Mín Sucursal </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="minimoSucursal" id="minimoSucursal" placeholder="minimo en sucursal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="maximoSucursal"> Máx Sucursal </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="maximoSucursal" id="maximoSucursal" placeholder="maximo en sucursal" required>
                    </div>
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
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idFormato"> Formato </label>
                    <div class="col-9">
                        <select class="form-control form-control-sm" name="formato" id="formato">
                            <option selected value="0"> - seleccionar - </option>
                            <?php foreach ($formatos as $formato) { ?>
                                <option value="<?php echo $formato[0] ?>"><?php echo $formato[0].". ". $formato[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTipoPapeleria"> Tipo Papeleria </label>
                    <div class="col-9">
                        <select class="form-control form-control-sm" name="idTipoPapeleria" id="idTipoPapeleria">
                            <option selected value="0"> - seleccionar - </option>
                            <?php foreach ($tipos as $tipo) { ?>
                                <option value="<?php echo $tipo[0] ?>"><?php echo $tipo[0].". ". $tipo[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary btn-block"> Realizar movimiento </button>
                <br><br>

            </form>
        </div>
    </div>
</div>