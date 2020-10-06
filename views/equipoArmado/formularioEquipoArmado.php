<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar EquipoArmado</h2>
            <br>

            <form action="?controller=equipoarmado&&action=crearEquipoArmado" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idEquipoArmado"> idEquipoArmado </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idEquipoArmado" id="idEquipoArmado" placeholder="idEquipoArmado" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idFuentePoder"> idFuentePoder </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idFuentePoder" id="idFuentePoder" placeholder="idFuentePoder" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idRam"> idRam </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idRam" id="idRam" placeholder="idRam" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idDiscosDuros"> idDiscosDuros </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idDiscosDuros" id="idDiscosDuros" placeholder="idDiscosDuros" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTeclados"> idTeclados </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idTeclados" id="idTeclados" placeholder="idTeclados" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idMouses"> idMouses </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idMouses" id="idMouses" placeholder="idMouses" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idMonitores"> idMonitores </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idMonitores" id="idMonitores" placeholder="idMonitores" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idTarjetasMadre"> idTarjetasMadre </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idTarjetasMadre" id="idTarjetasMadre" placeholder="idTarjetasMadre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idSO"> idSO </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idSO" id="idSO" placeholder="idSO" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
