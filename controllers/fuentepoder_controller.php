<?php 
    class FuentePoderController 
    { 
        public function verFuentePoder() 
        { 
            $fuentepoder = FuentePoder::verFuentePoder(); 
            include_once ('views/fuentepoder/verFuentePoder.php'); 
        } 
 
        public function formularioFuentePoder() 
        { 
            include_once ('views/fuentepoder/formularioFuentePoder.php'); 
        } 
 
        public function crearFuentePoder() 
        { 
            if (!isset(
                $_POST['idFuentePoder'],
                $_POST['fuentePoder'],
                $_POST['watts'],
               ))
                return call('acceso', 'error'); 
 
                $fuentepoder = new FuentePoder(
                    $_POST['idFuentePoder'],       
                    $_POST['fuentePoder'],
                    $_POST['watts'],
  );
            FuentePoder::crearFuentePoder($fuentepoder); 
            $this->verFuentePoder(); 
        } 
 
        public function actualizarFuentePoder() 
        { 
            $id = $_GET['idFuentePoder']; 
            $fuentepoder = FuentePoder::searchByIdFuentePoder($id); 
            require_once('views/fuentepoder/actualizarFuentePoder.php'); 
        } 
 
        public function actualizar() 
        { 
            $fuentepoder = new FuentePoder(
                $_POST['idFuentePoder'],       
                $_POST['fuentePoder'],
                $_POST['watts'],
);
            FuentePoder::actualizarFuentePoder($fuentepoder); 
            $this->verFuentePoder(); 
        } 
 
        public function borrarFuentePoder() 
        { 
            if (!isset($_GET['idFuentePoder'])) 
               return call('acceso', 'error'); 
             
            $post = FuentePoder::borrarFuentePoder($_GET['idFuentePoder']); 
            $this->verFuentePoder(); 
        } 
    } 
?> 
