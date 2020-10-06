<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <form action="?controller=movimientos&&action=asignarTienda" method="POST">

                <input type="hidden" name="id" id="id" value="<?php $id ?>">

                <div class="form-group">
                    <label for="sucursal"> Sucursal </label>
                    <select class="form-control" name="idSucursal" id="idSucursal">
                        <option selected value="0"> - seleccionar - </option>
                        <?php foreach ($tiendas as $tienda) { ?>
                            <option value="<?php echo $tienda[0] ?>"><?php echo $tienda[1] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"> Realizar movimiento </button>
                <br><br>

            </form>
        </div>
    </div>
</div>