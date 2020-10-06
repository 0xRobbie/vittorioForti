<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <form action="?controller=movimientos&&action=asignar" method="POST">

                <div class="form-group">
                    <label for="origen"> Origen </label>
                    <select class="form-control" name="origen" id="origen">
                        <option selected value="0"> - seleccionar - </option>
                        <?php foreach ($sucursales as $sucursal) { ?>
                            <option value="<?php echo $sucursal[0] ?>"><?php echo $sucursal[0].". ". $sucursal[1] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destino"> Destino </label>
                    <select class="form-control" name="destino" id="destino">
                        <option selected value="0"> - seleccionar - </option>
                        <?php foreach ($sucursales as $sucursal) { ?>
                            <option value="<?php echo $sucursal[0] ?>"><?php echo $sucursal[0].". ". $sucursal[1] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="insumo"> Insumo </label>
                    <select class="form-control" name="insumos" id="insumos">
                        <option selected value="0"> - seleccionar - </option>
                        <?php foreach ($insumos as $insumo) { ?>
                            <option value="<?php echo $insumo[0] ?>"><?php echo $insumo[0].". ". $insumo[1] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="piezas"> Piezas </label>
                    <input class="form-control" type="text" name="piezas" id="piezas">
                </div>

                <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION["user_id"] ?>">

                <button type="submit" class="btn btn-danger"> Realizar movimiento </button>
                <br><br>

            </form>
        </div>
    </div>
</div>