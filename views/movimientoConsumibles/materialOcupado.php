<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <?php 
            if ($inventario == '0') {
                echo "<div class='col-12 text-center'>";
                echo '<br><br><br>';
                echo '<h3>no hay datos para mostrar</h3>';
                echo "</div>";
            } else {
        ?>
            
            <div class="col-6 text-center">
                <h2>Inventario</h2>
                <div class="table text-center">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th>Existencias</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($inventario as $piezas) { ?>
                                <tr>
                                    <td> <?php echo $piezas['producto'] ?> </td>
                                    <td> <?php echo $piezas['piezas'] ?> </td>
                            <?php } ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-6 text-center">
                <h2>Registrar piezas usadas</h2>
                <br>

                <form action="?controller=movimientoConsumibles&&action=salidaProducto" method="POST">
                    <?php foreach($inventario as $req) { ?>
                        
                                <input  class="form-control form-control-sm" 
                                type="hidden" 
                                name="mov[<?php echo $req['idMovimientoConsumibles']?>][lugarTrabajo]" 
                                id="mov[<?php echo $req['idMovimientoConsumibles']?>][lugarTrabajo]" 
                                value="<?php echo $_SESSION['user_lugar']?>" required>
                                
                            <div class="form-row">
                                <div class="col text-right">
                                    <label for="producto"> <?php echo $req['producto'] ?> </label>
                                    <input  class="form-control form-control-sm" 
                                            type="hidden" 
                                            name="mov[<?php echo $req['idMovimientoConsumibles']?>][producto]" 
                                            id="mov[<?php echo $req['idMovimientoConsumibles']?>][producto]" 
                                            value="<?php echo $req['idPapeleria'] ?>">
                                </div>
                                <div class="col">
                                    <input  class="form-control" 
                                            type="text" 
                                            name="mov[<?php echo $req['idMovimientoConsumibles']?>][piezas]" 
                                            id="mov[<?php echo $req['idMovimientoConsumibles']?>][piezas]"  
                                            placeholder="piezas usadas" required>
                                </div>
                            </div>
                        <br>

                    <?php } ?>
                    
                    <br>
                    <button class="btn btn-primary btn-block">Actualizar Inventario</button>
                </form>
            </div>

        <?php } ?>
    </div>
</div>