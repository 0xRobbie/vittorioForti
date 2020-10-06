<?php 
    class TecladosController 
    { 
        public function verTeclados() 
        { 
            $teclados = Teclados::verTeclados(); 
            include_once ('views/teclados/verTeclados.php'); 
        } 
 
        public function formularioTeclados() 
        { 
            include_once ('views/teclados/formularioTeclados.php'); 
        } 
 
        public function crearTeclados() 
        { 
            if (!isset(
                $_POST['idTeclados'], 
                $_POST['teclado'],    
                $_POST['inalambrico'], 
               ))
                return call('acceso', 'error'); 
 
                $teclados = new Teclados(
                    $_POST['idTeclados'],
                    $_POST['teclado'],
                    $_POST['inalambrico'],
  );
            Teclados::crearTeclados($teclados); 
            $this->verTeclados(); 
        } 
 
        public function actualizarTeclados() 
        { 
            $id = $_GET['idTeclados']; 
            $teclados = Teclados::searchByIdTeclados($id); 
            require_once('views/teclados/actualizarTeclados.php'); 
        } 
 
        public function actualizar() 
        { 
            $teclados = new Teclados(
                $_POST['idTeclados'],
                $_POST['teclado'],
                $_POST['inalambrico'],
);
            Teclados::actualizarTeclados($teclados); 
            $this->verTeclados(); 
        } 
 
        public function borrarTeclados() 
        { 
            if (!isset($_GET['idTeclados'])) 
               return call('acceso', 'error'); 
             
            $post = Teclados::borrarTeclados($_GET['idTeclados']); 
            $this->verTeclados(); 
        } 
    } 
?> 
