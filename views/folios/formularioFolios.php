<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Folios</h2>
            <br>

            <form action="?controller=folios&&action=crearFolios" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idFolios"> idFolios </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idFolios" id="idFolios" placeholder="idFolios" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="folioInicial"> folioInicial </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="folioInicial" id="folioInicial" placeholder="folioInicial" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="folioFinal"> folioFinal </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="folioFinal" id="folioFinal" placeholder="folioFinal" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idPapeleria"> idPapeleria </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idPapeleria" id="idPapeleria" placeholder="idPapeleria" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idMovimientoConsumibles"> idMovimientoConsumibles </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idMovimientoConsumibles" id="idMovimientoConsumibles" placeholder="idMovimientoConsumibles" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
