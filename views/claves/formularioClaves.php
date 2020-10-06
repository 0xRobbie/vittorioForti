<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <h2> Ingresar Claves</h2>
            <br>

            <form action="?controller=claves&&action=crearClaves" method="POST">

                <div class="form-group row">
                    <label class="col-4 col-form-label" for="usuario"> nuevo usuario </label>
                    <div class="col-8">
                        <input class="form-control form-control-sm" type="text" name="usuario" id="usuario" placeholder="usuario del servicio" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-form-label" for="password"> nuevo password </label>
                    <div class="col-8">
                        <input class="form-control form-control-sm" type="text" name="password" id="password" placeholder="password del servicio" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-form-label" for="idServicio"> Servicio </label>
                    <div class="col-8">
                        <select class="form-control form-control-sm" name="idServicio" id="idServicio">
                            <option selected value="0"> - seleccionar - </option>
                            <?php foreach ($servicios as $servicio) { ?>
                                <option value="<?php echo $servicio->getidServicio() ?>"><?php echo $servicio->getidServicio() .". ". $servicio->getservicio() ?></option>
                            <?php } ?>
                        </select>
                
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-form-label" for="idUsuarios"> Usuarios </label>
                    <div class="col-8">
                        <select class="form-control form-control-sm" name="idUsuarios" id="idUsuarios">
                            <option selected value="0"> - seleccionar - </option>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <option value="<?php echo $usuario['idUsuarios'] ?>"><?php echo $usuario['idUsuarios'] .". ". $usuario['usuarios'] ?></option>
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
