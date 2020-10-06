<?php
    class TipoUsuarioController
    {
        public function verTipoUsuario()
        {
            $tipoUsuarios = TipoUsuario::verTipoUsuario();
            include_once ('views/tipoUsuario/verTipoUsuario.php');
        }
        
        public function formularioTipoUsuario()
        {
            include_once ('views/tipoUsuario/formularioTipoUsuario.php');
        }
        
        public function crearTipoUsuario()
        {

        }

        public function actualizarTipoUsuario()
        {
            include_once ('views/tipoUsuario/actualizarTipoUsuario.php');
        }

        public function actualizar()
        {

        }
    }
?>