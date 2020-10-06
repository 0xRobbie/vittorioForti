<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar SO</h2>
            <br>

            <form action="?controller=so&&action=crearSO" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idSO"> idSO </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idSO" id="idSO" placeholder="idSO" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="sistema"> sistema </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="sistema" id="sistema" placeholder="sistema" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
