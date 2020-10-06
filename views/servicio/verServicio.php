<?php require_once './views/error.php'; comprobarAcceso(); ?> 

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Servicios</h2>
        </div>
        <div class="col-4">
            <a class="btn btn-primary btn-block" href="?controller=servicio&&action=formularioServicio">
                Nuevo servicio
            </a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="table text-center"> 
            
            <table class="table table-striped table-light"> 
                <thead class="thead-dark"> 
                    <tr> 
                        <th>idServicio</th> 
                        <th>servicio</th> 
                        <th>borrar</th> 
                    </tr> 
                </thead> 
        
                <tbody> 
                    <?php foreach($servicio as $ver) { ?> 
                        <tr> 
                            <td> <?php echo $ver->getidServicio() ?> </td> 
                            <td> <?php echo $ver->getservicio() ?> </td> 
                            <td> 
                                <a class="btn btn-danger btn-block" onclick="return confirm('¿Seguro que quiere eliminar el registro?')" href='?controller=servicio&action=borrarServicio&idServicio=<?php echo $ver->getidServicio() ?>'> 
                                    <span class="material-icons"> close </span>
                                </a> 
                            </td>
                    <?php } ?> 
                        </tr> 
                </tbody> 
            </table> 
        </div> 
    </div>

</div>
 
