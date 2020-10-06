<?php
    class RastreoController
    {
        public function verRastreo()
        {
            $rastreo = Productos::verProductos();
            include_once ('views/rastreo/verRastreo.php');
        }
        
        public function formularioRastreo()
        {
            include_once ('views/rastreo/formularioRastreo.php');
            
        }

        public function crearRastreo()
        {
            include_once ('views/rastreo/crearRastreo.php');
        }
        
        public function actualizarRastreo()
        {
            include_once ('views/rastreo/actualizarRastreo.php');
        }
    }
?>