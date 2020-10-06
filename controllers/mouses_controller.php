<?php 
    class MousesController 
    { 
        public function verMouses() 
        { 
            $mouses = Mouses::verMouses(); 
            include_once ('views/mouses/verMouses.php'); 
        } 
 
        public function formularioMouses() 
        { 
            include_once ('views/mouses/formularioMouses.php'); 
        } 
 
        public function crearMouses() 
        { 
            if (!isset(
                $_POST['idMouses'],
                $_POST['mouse'],
                $_POST['inalambrico'],
               ))
                return call('acceso', 'error'); 
 
                $mouses = new Mouses(
                    $_POST['idMouses'],
                    $_POST['mouse'],
                    $_POST['inalambrico'],
  );
            Mouses::crearMouses($mouses); 
            $this->verMouses(); 
        } 
 
        public function actualizarMouses() 
        { 
            $id = $_GET['idMouses']; 
            $mouses = Mouses::searchByIdMouses($id); 
            require_once('views/mouses/actualizarMouses.php'); 
        } 
 
        public function actualizar() 
        { 
            $mouses = new Mouses(
                $_POST['idMouses'],
                $_POST['mouse'],
                $_POST['inalambrico'],
);
            Mouses::actualizarMouses($mouses); 
            $this->verMouses(); 
        } 
 
        public function borrarMouses() 
        { 
            if (!isset($_GET['idMouses'])) 
               return call('acceso', 'error'); 
             
            $post = Mouses::borrarMouses($_GET['idMouses']); 
            $this->verMouses(); 
        } 
    } 
?> 
