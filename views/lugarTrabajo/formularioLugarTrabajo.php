<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar LugarTrabajo</h2>
            <br>

            <form action="?controller=lugartrabajo&&action=crearLugarTrabajo" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idLugarTrabajo"> idLugarTrabajo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idLugarTrabajo" id="idLugarTrabajo" placeholder="idLugarTrabajo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDepartamentos"> idDepartamentos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDepartamentos" id="idDepartamentos" placeholder="idDepartamentos" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idSucursales"> idSucursales </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idSucursales" id="idSucursales" placeholder="idSucursales" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
