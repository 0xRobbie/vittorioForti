<?php 
    class AsignacionEquipoController 
    { 
        public function verAsignacionEquipo() 
        { 
            $asignacionequipo = AsignacionEquipo::verAsignacionEquipo(); 
            include_once ('views/asignacionequipo/verAsignacionEquipo.php'); 
        } 
 
        public function formularioAsignacionEquipo() 
        { 
            include_once ('views/asignacionequipo/formularioAsignacionEquipo.php'); 
        } 
 
        public function crearAsignacionEquipo() 
        { 
            if (!isset( 
                $_POST['idAsignacionEquipo'], 
                $_POST['idUsuarios'],       
                $_POST['idTipoAsignacion'], 
                $_POST['ultimoMovimiento'],
                $_POST['idEquipos'],
               ))
                return call('acceso', 'error'); 
 
                $asignacionequipo = new AsignacionEquipo(        
                    $_POST['idAsignacionEquipo'],  
                    $_POST['idUsuarios'],
                    $_POST['idTipoAsignacion'],    
                    $_POST['ultimoMovimiento'],    
                    $_POST['idEquipos'],
  );
            AsignacionEquipo::crearAsignacionEquipo($asignacionequipo); 
            $this->verAsignacionEquipo(); 
        } 
 
        public function actualizarAsignacionEquipo() 
        { 
            $id = $_GET['idAsignacionEquipo']; 
            $asignacionequipo = AsignacionEquipo::searchByIdAsignacionEquipo($id); 
            require_once('views/asignacionequipo/actualizarAsignacionEquipo.php'); 
        } 
 
        public function actualizar() 
        { 
            $asignacionequipo = new AsignacionEquipo(        
                $_POST['idAsignacionEquipo'],  
                $_POST['idUsuarios'],
                $_POST['idTipoAsignacion'],    
                $_POST['ultimoMovimiento'],    
                $_POST['idEquipos'],
);
            AsignacionEquipo::actualizarAsignacionEquipo($asignacionequipo); 
            $this->verAsignacionEquipo(); 
        } 
 
        public function borrarAsignacionEquipo() 
        { 
            if (!isset($_GET['idAsignacionEquipo'])) 
               return call('acceso', 'error'); 
             
            $post = AsignacionEquipo::borrarAsignacionEquipo($_GET['idAsignacionEquipo']); 
            $this->verAsignacionEquipo(); 
        } 
    } 
?> 
