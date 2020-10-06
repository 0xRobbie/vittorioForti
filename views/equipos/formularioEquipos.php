<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Equipos</h2>
            <br>

            <form action="?controller=equipos&&action=crearEquipos" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idEquipos"> idEquipos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idEquipos" id="idEquipos" placeholder="idEquipos" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idImpresoras"> idImpresoras </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idImpresoras" id="idImpresoras" placeholder="idImpresoras" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idEquipoArmado"> idEquipoArmado </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idEquipoArmado" id="idEquipoArmado" placeholder="idEquipoArmado" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDispositivoMovil"> idDispositivoMovil </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDispositivoMovil" id="idDispositivoMovil" placeholder="idDispositivoMovil" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idInsumos"> idInsumos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idInsumos" id="idInsumos" placeholder="idInsumos" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
