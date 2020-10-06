<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Impresoras</h2>
            <br>

            <form action="?controller=impresoras&&action=crearImpresoras" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idImpresoras"> idImpresoras </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idImpresoras" id="idImpresoras" placeholder="idImpresoras" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="modelo"> modelo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="modelo" id="modelo" placeholder="modelo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idInsumos"> idInsumos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idInsumos" id="idInsumos" placeholder="idInsumos" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
