<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Insumos</h2>
            <br>

            <form action="?controller=insumos&&action=crearInsumos" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idInsumos"> idInsumos </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idInsumos" id="idInsumos" placeholder="idInsumos" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="insumo"> insumo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="insumo" id="insumo" placeholder="insumo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="modelo"> modelo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="modelo" id="modelo" placeholder="modelo" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="piezas"> piezas </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="piezas" id="piezas" placeholder="piezas" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
