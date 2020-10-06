<?php require_once './views/error.php'; comprobarAcceso(); ?>

<div class="table text-center">
    
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Formato</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($formato as $form) { ?>
                <tr>
                    <td> <?php echo $form['idFormato'] ?> </td>
                    <td> <?php echo $form['formato'] ?> </td>
            <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

