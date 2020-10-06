<?php
    class FormatoController
    {
        public function verFormato()
        {
            $formato = Formato::verFormato();
            include_once ('views/formato/verFormato.php');
        }
        
        public function formularioFormato()
        {
            include_once ('views/formato/formularioFormato.php');
        }

        public function crearFormato()
        {
            
        }
    }
?>