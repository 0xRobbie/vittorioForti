<?php 
    function comprobarAcceso(){
        if(!isset($_SESSION["user_id"]) ) {
            call('acceso', 'error');
            die();
        }
    }
?>