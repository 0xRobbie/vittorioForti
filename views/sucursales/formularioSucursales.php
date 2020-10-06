<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Nueva Sucursal</h2>
            <br>

            <form action="?controller=sucursales&&action=crearSucursales" method="POST">

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="idSucursales"> Id Sucursal </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="idSucursales" id="idSucursales" placeholder="Identificador de la Sucursal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="sucursal"> Sucursal </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="sucursal" id="sucursal" placeholder=" nombre de la sucursal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="direccion"> Direccion </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="direccion" id="direccion" placeholder="direccion" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="region"> Región </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="region" id="region" placeholder="region" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="colonia"> Colonia </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="colonia" id="colonia" placeholder="colonia" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="municipio"> Municipio </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="municipio" id="municipio" placeholder="municipio" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="estado"> Estado </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="estado" id="estado" placeholder="estado" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="telefono"> Teléfono </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="telefono" id="telefono" placeholder="telefono" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="correo"> Correo </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="correo" id="correo" placeholder="correo" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="cp"> Código Postal </label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" name="cp" id="cp" placeholder="código postal" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Realizar movimiento </button>
                <br><br>

            </form>
        </div>
    </div>
</div>