<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Generar Nuevo Requerimiento</h2>
            <br>

            <form action="?controller=solicitudes&&action=crearSolicitudes&idSolicitudes=<?php echo $_SESSION["user_id"] ?>" method="POST">


                <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION["user_id"] ?>">
                
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTipoPapeleria"> Tipo Papeleria </label>
                    <div class="col-9">
                        <select class="form-control form-control-sm" name="idTipoPapeleria" id="idTipoPapeleria">
                            <option selected value="0"> - seleccionar - </option>
                            <?php foreach ($tipos as $tipo) { ?>
                                <option value="<?php echo $tipo[0] ?>"><?php echo $tipo[0].". ". $tipo[1] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="observaciones"> Observaciones </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" placeholder="observaciones" required>
                    </div>
                </div>
                
                <input type="hidden" name="idRastreo" id="idRastreo" value="<?php echo '1' ?>">

                <button type="submit" class="btn btn-primary btn-block"> Realizar movimiento </button>
                <br><br>

            </form>
        </div>
    </div>
</div>