<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Monitores</h2>
            <br>

            <form action="?controller=monitores&&action=crearMonitores" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idMonitores"> idMonitores </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idMonitores" id="idMonitores" placeholder="idMonitores" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="monitor"> monitor </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="monitor" id="monitor" placeholder="monitor" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="resolucion"> resolucion </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="resolucion" id="resolucion" placeholder="resolucion" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="puertos"> puertos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="puertos" id="puertos" placeholder="puertos" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
