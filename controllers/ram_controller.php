<?php 
    class RamController 
    { 
        public function verRam() 
        { 
            $ram = Ram::verRam(); 
            include_once ('views/ram/verRam.php'); 
        } 
 
        public function formularioRam() 
        { 
            include_once ('views/ram/formularioRam.php'); 
        } 
 
        public function crearRam() 
        { 
            if (!isset(
                $_POST['idRam'],
                $_POST['ram'],
                $_POST['capacidad'],
                $_POST['tipo'],
               ))
                return call('acceso', 'error'); 
 
                $ram = new Ram(
                    $_POST['idRam'],
                    $_POST['ram'],
                    $_POST['capacidad'],
                    $_POST['tipo'],
  );
            Ram::crearRam($ram); 
            $this->verRam(); 
        } 
 
        public function actualizarRam() 
        { 
            $id = $_GET['idRam']; 
            $ram = Ram::searchByIdRam($id); 
            require_once('views/ram/actualizarRam.php'); 
        } 
 
        public function actualizar() 
        { 
            $ram = new Ram(
                $_POST['idRam'],
                $_POST['ram'],
                $_POST['capacidad'],
                $_POST['tipo'],
);
            Ram::actualizarRam($ram); 
            $this->verRam(); 
        } 
 
        public function borrarRam() 
        { 
            if (!isset($_GET['idRam'])) 
               return call('acceso', 'error'); 
             
            $post = Ram::borrarRam($_GET['idRam']); 
            $this->verRam(); 
        } 
    } 
?> 
