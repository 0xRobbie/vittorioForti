<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Marca</h2>
            <br>

            <form action="?controller=marca&&action=crearMarca" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idMarca"> idMarca </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idMarca" id="idMarca" placeholder="idMarca" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="marca"> marca </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="marca" id="marca" placeholder="marca" required>
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
