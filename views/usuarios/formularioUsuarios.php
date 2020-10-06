<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            
            <h2> Ingresar Usuarios</h2>
            <br>
            
            <form action="?controller=usuarios&&action=crearUsuarios" method="POST">

                <div class="form-group row">
                    <label class="col-4 col-form-label" for="usuarios"> Usuario </label>
                    <div class="col-8">
                        <input class="form-control form-control-sm" type="text" name="usuarios" id="usuarios" placeholder="usuarios" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-4 col-form-label" for="password"> Password </label>
                    <div class="col-8">
                        <input class="form-control form-control-sm" type="text" name="password" id="password" placeholder="password" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-4 col-form-label" for="idLugartrabajo"> Lugar de trabajo </label>
                    <div class="col-8">
                        <select class="form-control form-control-sm" name="idLugarTrabajo" id="idLugarTrabajo">
                            <?php foreach ($lugaresTrabajo as $lugar) { ?>
                            <option value="<?php echo $lugar->getidLugarTrabajo() ?>"><?php echo $lugar->getidLugarTrabajo().". ". $lugar->getidDepartamentos() . $lugar->getidSucursales() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-4 col-form-label" for="idTipoUsuario"> Tipo de usuario </label>
                    <div class="col-8">
                        <select class="form-control form-control-sm" name="idTipoUsuario" id="idTipoUsuario">
                            <?php foreach ($tiposUsuario as $tipo) { ?>
                            <option value="<?php echo $tipo->getidTipoUsuario() ?>"><?php echo $tipo->getidTipoUsuario().". ". $tipo->gettipo() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Ingresar datos </button>
                <br><br>

            </form>
        </div>
    </div>
</div>
