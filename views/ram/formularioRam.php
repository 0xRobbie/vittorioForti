<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Ram</h2>
            <br>

            <form action="?controller=ram&&action=crearRam" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idRam"> idRam </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idRam" id="idRam" placeholder="idRam" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="ram"> ram </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="ram" id="ram" placeholder="ram" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="capacidad"> capacidad </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="capacidad" id="capacidad" placeholder="capacidad" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="tipo"> tipo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="tipo" id="tipo" placeholder="tipo" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
