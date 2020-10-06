<?php 
    class DispositivoMovilController 
    { 
        public function verDispositivoMovil() 
        { 
            $dispositivomovil = DispositivoMovil::verDispositivoMovil(); 
            include_once ('views/dispositivomovil/verDispositivoMovil.php'); 
        } 
 
        public function formularioDispositivoMovil() 
        { 
            include_once ('views/dispositivomovil/formularioDispositivoMovil.php'); 
        } 
 
        public function crearDispositivoMovil() 
        { 
            if (!isset(
                $_POST['idDispositivoMovil'],
                $_POST['idDispositivo'],
                $_POST['idSO'],
                $_POST['memoria'],
                $_POST['almacenamiento'],
                $_POST['identificador'],
               ))
                return call('acceso', 'error'); 
 
                $dispositivomovil = new DispositivoMovil(        
                    $_POST['idDispositivoMovil'],  
                    $_POST['idDispositivo'],       
                    $_POST['idSO'],
                    $_POST['memoria'], 
                    $_POST['almacenamiento'], 
                    $_POST['identificador'], 
  );
            DispositivoMovil::crearDispositivoMovil($dispositivomovil); 
            $this->verDispositivoMovil(); 
        } 
 
        public function actualizarDispositivoMovil() 
        { 
            $id = $_GET['idDispositivoMovil']; 
            $dispositivomovil = DispositivoMovil::searchByIdDispositivoMovil($id); 
            require_once('views/dispositivomovil/actualizarDispositivoMovil.php'); 
        } 
 
        public function actualizar() 
        { 
            $dispositivomovil = new DispositivoMovil(        
                $_POST['idDispositivoMovil'],  
                $_POST['idDispositivo'],       
                $_POST['idSO'],
                $_POST['memoria'], 
                $_POST['almacenamiento'], 
                $_POST['identificador'], 
);
            DispositivoMovil::actualizarDispositivoMovil($dispositivomovil); 
            $this->verDispositivoMovil(); 
        } 
 
        public function borrarDispositivoMovil() 
        { 
            if (!isset($_GET['idDispositivoMovil'])) 
               return call('acceso', 'error'); 
             
            $post = DispositivoMovil::borrarDispositivoMovil($_GET['idDispositivoMovil']); 
            $this->verDispositivoMovil(); 
        } 
    } 
?> 
