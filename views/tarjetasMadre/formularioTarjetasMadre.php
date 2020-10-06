<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar TarjetasMadre</h2>
            <br>

            <form action="?controller=tarjetasmadre&&action=crearTarjetasMadre" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTarjetasMadre"> idTarjetasMadre </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idTarjetasMadre" id="idTarjetasMadre" placeholder="idTarjetasMadre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="tarjeta"> tarjeta </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="tarjeta" id="tarjeta" placeholder="tarjeta" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="procesador"> procesador </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="procesador" id="procesador" placeholder="procesador" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
