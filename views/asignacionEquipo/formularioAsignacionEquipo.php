<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar AsignacionEquipo</h2>
            <br>

            <form action="?controller=asignacionequipo&&action=crearAsignacionEquipo" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idAsignacionEquipo"> idAsignacionEquipo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idAsignacionEquipo" id="idAsignacionEquipo" placeholder="idAsignacionEquipo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idUsuarios"> idUsuarios </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idUsuarios" id="idUsuarios" placeholder="idUsuarios" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTipoAsignacion"> idTipoAsignacion </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idTipoAsignacion" id="idTipoAsignacion" placeholder="idTipoAsignacion" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="ultimoMovimiento"> ultimoMovimiento </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="ultimoMovimiento" id="ultimoMovimiento" placeholder="ultimoMovimiento" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idEquipos"> idEquipos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idEquipos" id="idEquipos" placeholder="idEquipos" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
