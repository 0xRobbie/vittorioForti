<?php
    class TipoPapeleriaController
    {
        public function verTipoPapeleria()
        {
            $tipoPapeleria = TipoPapeleria::verTipoPapeleria();
            include_once ('views/tipoPapeleria/verTipoPapeleria.php');
        }
        
        public function formularioTipoPapeleria()
        {
            include_once ('views/tipoPapeleria/formularioTipoPapeleria.php');
            
        }

        public function crearTipoPapeleria()
        {
            include_once ('views/tipoPapeleria/crearTipoPapeleria.php');
        }
    }
?>