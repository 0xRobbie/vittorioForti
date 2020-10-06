<?php 
    class TipoAsignacionController 
    { 
        public function verTipoAsignacion() 
        { 
            $tipoasignacion = TipoAsignacion::verTipoAsignacion(); 
            include_once ('views/tipoasignacion/verTipoAsignacion.php'); 
        } 
 
        public function formularioTipoAsignacion() 
        { 
            include_once ('views/tipoasignacion/formularioTipoAsignacion.php'); 
        } 
 
        public function crearTipoAsignacion() 
        { 
            if (!isset(
                $_POST['idTipoAsignacion'], 
                $_POST['asignacion'], 
               ))
                return call('acceso', 'error'); 
 
                $tipoasignacion = new TipoAsignacion(
                    $_POST['idTipoAsignacion'],    
                    $_POST['asignacion'],
  );
            TipoAsignacion::crearTipoAsignacion($tipoasignacion); 
            $this->verTipoAsignacion(); 
        } 
 
        public function actualizarTipoAsignacion() 
        { 
            $id = $_GET['idTipoAsignacion']; 
            $tipoasignacion = TipoAsignacion::searchByIdTipoAsignacion($id); 
            require_once('views/tipoasignacion/actualizarTipoAsignacion.php'); 
        } 
 
        public function actualizar() 
        { 
            $tipoasignacion = new TipoAsignacion(
                $_POST['idTipoAsignacion'],    
                $_POST['asignacion'],
);
            TipoAsignacion::actualizarTipoAsignacion($tipoasignacion); 
            $this->verTipoAsignacion(); 
        } 
 
        public function borrarTipoAsignacion() 
        { 
            if (!isset($_GET['idTipoAsignacion'])) 
               return call('acceso', 'error'); 
             
            $post = TipoAsignacion::borrarTipoAsignacion($_GET['idTipoAsignacion']); 
            $this->verTipoAsignacion(); 
        } 
    } 
?> 
