<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">
    
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo Papeleria</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($tipoPapeleria as $tipo) { ?>
                <tr>
                    <td> <?php echo $tipo['idTipoPapeleria'] ?> </td>
                    <td> <?php echo $tipo['tipoPapeleria'] ?> </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

