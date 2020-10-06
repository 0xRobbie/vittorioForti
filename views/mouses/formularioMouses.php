<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Mouses</h2>
            <br>

            <form action="?controller=mouses&&action=crearMouses" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idMouses"> idMouses </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idMouses" id="idMouses" placeholder="idMouses" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="mouse"> mouse </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="mouse" id="mouse" placeholder="mouse" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="inalambrico"> inalambrico </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="inalambrico" id="inalambrico" placeholder="inalambrico" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
