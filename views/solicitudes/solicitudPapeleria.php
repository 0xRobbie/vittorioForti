<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Solicitar Productos</h2>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-12">
            
            <form action="?controller=solicitudes&&action=revisarPedido" method="POST">

                <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION["user_id"] ?>">
                <input type="hidden" name="idLugarTrabajo" id="idLugarTrabajo" value="<?php echo $_SESSION["user_lugar"] ?>">
                <input type="hidden" name="idSolicitudes" id="idSolicitudes" value="<?php echo $idSolicitud ?>">
                <br>

                <?php $contador = 1; ?>
                <?php foreach($papeleria as $producto) { ?>
                    <?php if ($contador == 1) { echo "<div class=\"row\">"; } ?>
                        <div class="col-3">
                            <label style="font-size:small" id="producto" for=""> <?php echo $producto['producto'] ?> </label>
                            <input class="form-control form-control-sm" type="text" name="<?php echo $producto['idPapeleria'] ?>" id="<?php echo $producto['idPapeleria'] ?>" placeholder="piezas">
                            <br>
                        </div>
                    <?php if ($contador == 4) { echo "</div>";  $contador = 0; } ?>
                    <?php $contador++; ?>
                <?php } ?>
                <?php if (count($papeleria) % 4 > 0) { echo "</div>"; } ?>

                <input type="hidden" name="preasignado" id="preasignado" value="0">
                
                <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Enviar Pedido</button>
                </div>
                <br><br><br>
            </form>

        </div>
    </div>
</div>