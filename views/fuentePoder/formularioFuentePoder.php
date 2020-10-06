<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar FuentePoder</h2>
            <br>

            <form action="?controller=fuentepoder&&action=crearFuentePoder" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idFuentePoder"> idFuentePoder </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idFuentePoder" id="idFuentePoder" placeholder="idFuentePoder" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="fuentePoder"> fuentePoder </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="fuentePoder" id="fuentePoder" placeholder="fuentePoder" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="watts"> watts </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="watts" id="watts" placeholder="watts" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
