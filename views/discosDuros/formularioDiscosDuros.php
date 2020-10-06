<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar DiscosDuros</h2>
            <br>

            <form action="?controller=discosduros&&action=crearDiscosDuros" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDiscosDuros"> idDiscosDuros </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDiscosDuros" id="idDiscosDuros" placeholder="idDiscosDuros" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="disco"> disco </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="disco" id="disco" placeholder="disco" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="capacidad"> capacidad </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="capacidad" id="capacidad" placeholder="capacidad" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="tipoConexion"> tipoConexion </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="tipoConexion" id="tipoConexion" placeholder="tipoConexion" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
