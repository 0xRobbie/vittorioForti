<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2>Crear Movimiento</h2>
            <br>

            <form action="?controller=movimientoConsumibles&&action=crearMovimientoConsumibles" method="POST">

                <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION["user_id"] ?>">
                
                <div class="form-group">
                    <label for="elemento"> Producto </label>
                    <select class="form-control" name="idProductos" id="idProductos">
                        <?php foreach ($productos as $producto) { ?>
                            <option value="<?php echo $producto[0] ?>"><?php echo $producto[0].". ". $producto[1] ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="piezas"> Piezas </label>
                    <input class="form-control" type="text" name="piezas" id="piezas">
                </div>

                <div class="form-group">
                    <label for="elemento"> Lugar de trabajo </label>
                    <select class="form-control" name="idLugarTrabajo" id="idLugarTrabajo">
                        <?php foreach ($lugaresTrabajo as $lugar) { ?>
                            <option value="<?php echo $lugar->getidLugarTrabajo() ?>"><?php echo $lugar->getidDepartamentos() . $lugar->getidSucursales() ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="elemento"> Pre-asignado </label>
                    <select class="form-control" name="preasignado" id="preasignado">
                        <option value="0"> NO </option>
                        <option value="1"> SI </option>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary btn-block"> Realizar movimiento </button>
                <br><br>

            </form>
        </div>
    </div>
</div>