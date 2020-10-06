<?php 
    class DispositivoController 
    { 
        public function verDispositivo() 
        { 
            $dispositivo = Dispositivo::verDispositivo(); 
            include_once ('views/dispositivo/verDispositivo.php'); 
        } 
 
        public function formularioDispositivo() 
        { 
            include_once ('views/dispositivo/formularioDispositivo.php'); 
        } 
 
        public function crearDispositivo() 
        { 
            if (!isset(
                $_POST['idDispositivo'],
                $_POST['dispositivo'],
               ))
                return call('acceso', 'error'); 
 
                $dispositivo = new Dispositivo(
                    $_POST['idDispositivo'],       
                    $_POST['dispositivo'],
  );
            Dispositivo::crearDispositivo($dispositivo); 
            $this->verDispositivo(); 
        } 
 
        public function actualizarDispositivo() 
        { 
            $id = $_GET['idDispositivo']; 
            $dispositivo = Dispositivo::searchByIdDispositivo($id); 
            require_once('views/dispositivo/actualizarDispositivo.php'); 
        } 
 
        public function actualizar() 
        { 
            $dispositivo = new Dispositivo(
                $_POST['idDispositivo'],       
                $_POST['dispositivo'],
);
            Dispositivo::actualizarDispositivo($dispositivo); 
            $this->verDispositivo(); 
        } 
 
        public function borrarDispositivo() 
        { 
            if (!isset($_GET['idDispositivo'])) 
               return call('acceso', 'error'); 
             
            $post = Dispositivo::borrarDispositivo($_GET['idDispositivo']); 
            $this->verDispositivo(); 
        } 
    } 
?> 
