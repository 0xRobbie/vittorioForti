<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar DispositivoMovil</h2>
            <br>

            <form action="?controller=dispositivomovil&&action=crearDispositivoMovil" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDispositivoMovil"> idDispositivoMovil </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDispositivoMovil" id="idDispositivoMovil" placeholder="idDispositivoMovil" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDispositivo"> idDispositivo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDispositivo" id="idDispositivo" placeholder="idDispositivo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idSO"> idSO </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idSO" id="idSO" placeholder="idSO" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="memoria"> memoria </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="memoria" id="memoria" placeholder="memoria" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="almacenamiento"> almacenamiento </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="almacenamiento" id="almacenamiento" placeholder="almacenamiento" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="identificador"> identificador </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="identificador" id="identificador" placeholder="identificador" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
