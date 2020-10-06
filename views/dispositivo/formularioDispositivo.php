<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Dispositivo</h2>
            <br>

            <form action="?controller=dispositivo&&action=crearDispositivo" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDispositivo"> idDispositivo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDispositivo" id="idDispositivo" placeholder="idDispositivo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="dispositivo"> dispositivo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="dispositivo" id="dispositivo" placeholder="dispositivo" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
