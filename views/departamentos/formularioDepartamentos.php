<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Departamentos</h2>
            <br>

            <form action="?controller=departamentos&&action=crearDepartamentos" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="departamento"> Departamento </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="departamento" id="departamento" placeholder="nuevo departamento" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
