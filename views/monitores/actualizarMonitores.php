<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <form action="?controller=monitores&&action=actualizar" method="POST">

        <input type="hidden" name="idMonitores" name="idMonitores" value="<?php echo $sucursal->getIdMonitores() ?>" >

        <div class="form-group">
            <label for="text">idMonitores</label>
            <input type="text" name="idMonitores" id="idMonitores" class="form-control" value="<?php echo $idMonitores->getidMonitores() ?>">
        </div>

        <div class="form-group">
            <label for="text">monitor</label>
            <input type="text" name="monitor" id="monitor" class="form-control" value="<?php echo $monitor->getmonitor() ?>">
        </div>

        <div class="form-group">
            <label for="text">resolucion</label>
            <input type="text" name="resolucion" id="resolucion" class="form-control" value="<?php echo $resolucion->getresolucion() ?>">
        </div>

        <div class="form-group">
            <label for="text">puertos</label>
            <input type="text" name="puertos" id="puertos" class="form-control" value="<?php echo $puertos->getpuertos() ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Actualizar Monitores</button>
    </form>
</div>
