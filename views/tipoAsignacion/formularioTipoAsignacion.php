<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar TipoAsignacion</h2>
            <br>

            <form action="?controller=tipoasignacion&&action=crearTipoAsignacion" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTipoAsignacion"> idTipoAsignacion </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idTipoAsignacion" id="idTipoAsignacion" placeholder="idTipoAsignacion" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="asignacion"> asignacion </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="asignacion" id="asignacion" placeholder="asignacion" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
