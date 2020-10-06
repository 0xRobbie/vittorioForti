<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4> Asignación Productos a Sucursal </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="?controller=movimientoConsumibles&&action=asignacionMasivaP" method="POST">
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="elemento"> Lugar de Trabajo </label>
                            <select class="form-control" name="idLugarTrabajo" id="idLugarTrabajo">
                                <?php foreach ($lugaresTrabajo as $lugar) { ?>
                                    <option value="<?php echo $lugar->getidLugarTrabajo() ?>"><?php echo $lugar->getidDepartamentos() . $lugar->getidSucursales() ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="elemento"> Pre-asignado </label>
                            <select class="form-control" name="preasignado" id="preasignado">
                                <option value="0"> NO </option>
                                <option value="1"> SI </option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <br><br>
                
                <label for="elemento"> Lugar de trabajo </label>
                <br>
                
                <?php $contador = 1; ?>
                <?php foreach($productos as $producto) { ?>
                    <?php if ($contador == 1) { echo "<div class=\"row\">"; } ?>
                        <div class="col-3">
                            <input type="checkbox" name="mov[<?php echo $producto[0] ?>][producto]" id="<?php echo $producto[0] ?>" value="<?php echo $producto[0] ?>">
                            <label style="font-size:small" for="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></label>
                            <input class="form-control form-control-sm" type="text" name="mov[<?php echo $producto[0] ?>][piezas]" id="mov[<?php echo $producto[0] ?>][piezas]" placeholder="piezas">
                            <br>
                        </div>
                    <?php if ($contador == 4) { echo "</div>";  $contador = 0; } ?>
                    <?php $contador++; ?>
                <?php } ?>
                <?php if (count($productos) % 4 > 0) { echo "</div>"; } ?>

                
                <br>
                <button type="submit" class="btn btn-primary btn-block"> Realizar movimiento </button>
                <br><br>
                
            </form>
        </div>
    </div>
</div>