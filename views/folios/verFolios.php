<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Folios enviados</h2>
        </div>
    </div>
    <br>

    <div class="row">

        <?php  
            $productoAnterior = '';
            foreach($folios as $ver) { 
                if ( $productoAnterior != $ver->getidPapeleria() ) {
                    $productoAnterior = $ver->getidPapeleria();
        ?>

                <div class="col">
                    <div class="table text-center">
                        <h6 class="text-left"><?php echo $ver->getidPapeleria() ?></h6>
                        <table class="table table-striped table-light"> 
                            <thead> 
                                <tr> 
                                    <th>Folio Inicial</th> 
                                    <th>Folio Final</th> 
                                    <th>Id Movimiento</th> 
                                </tr> 
                            </thead> 
                    
                            <tbody> 
                                <?php foreach($folios as $ver) { ?> 
                                    <?php if ($productoAnterior == $ver->getidPapeleria()) { ?> 
                                    <tr> 
                                        <td> <?php echo $ver->getfolioInicial() ?> </td> 
                                        <td> <?php echo $ver->getfolioFinal() ?> </td> 
                                        <td> <?php echo $ver->getidMovimientoConsumibles() ?> </td> 
                                    <?php } ?> 
                                <?php } ?> 
                                    </tr> 
                            </tbody> 
                        </table> 
                    </div>
                </div>

        <?php  
                }
            }
        ?>




    </div>
</div>
 
