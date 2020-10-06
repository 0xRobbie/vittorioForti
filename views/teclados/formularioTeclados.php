<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Teclados</h2>
            <br>

            <form action="?controller=teclados&&action=crearTeclados" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTeclados"> idTeclados </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idTeclados" id="idTeclados" placeholder="idTeclados" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="teclado"> teclado </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="teclado" id="teclado" placeholder="teclado" required>
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
