<?php 
    class MonitoresController 
    { 
        public function verMonitores() 
        { 
            $monitores = Monitores::verMonitores(); 
            include_once ('views/monitores/verMonitores.php'); 
        } 
 
        public function formularioMonitores() 
        { 
            include_once ('views/monitores/formularioMonitores.php'); 
        } 
 
        public function crearMonitores() 
        { 
            if (!isset( 
                $_POST['idMonitores'], 
                $_POST['monitor'], 
                $_POST['resolucion'], 
                $_POST['puertos'],    
               ))
                return call('acceso', 'error'); 
 
                $monitores = new Monitores(
                    $_POST['idMonitores'],
                    $_POST['monitor'],
                    $_POST['resolucion'],
                    $_POST['puertos'],
  );
            Monitores::crearMonitores($monitores); 
            $this->verMonitores(); 
        } 
 
        public function actualizarMonitores() 
        { 
            $id = $_GET['idMonitores']; 
            $monitores = Monitores::searchByIdMonitores($id); 
            require_once('views/monitores/actualizarMonitores.php'); 
        } 
 
        public function actualizar() 
        { 
            $monitores = new Monitores(
                $_POST['idMonitores'],
                $_POST['monitor'],
                $_POST['resolucion'],
                $_POST['puertos'],
);
            Monitores::actualizarMonitores($monitores); 
            $this->verMonitores(); 
        } 
 
        public function borrarMonitores() 
        { 
            if (!isset($_GET['idMonitores'])) 
               return call('acceso', 'error'); 
             
            $post = Monitores::borrarMonitores($_GET['idMonitores']); 
            $this->verMonitores(); 
        } 
    } 
?> 
