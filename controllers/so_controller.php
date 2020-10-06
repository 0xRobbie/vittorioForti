<?php 
    class SOController 
    { 
        public function verSO() 
        { 
            $so = SO::verSO(); 
            include_once ('views/so/verSO.php'); 
        } 
 
        public function formularioSO() 
        { 
            include_once ('views/so/formularioSO.php'); 
        } 
 
        public function crearSO() 
        { 
            if (!isset( 
                $_POST['idSO'], 
                $_POST['sistema'], 
               ))
                return call('acceso', 'error'); 
 
                $so = new SO(
                    $_POST['idSO'],
                    $_POST['sistema'],
  );
            SO::crearSO($so); 
            $this->verSO(); 
        } 
 
        public function actualizarSO() 
        { 
            $id = $_GET['idSO']; 
            $so = SO::searchByIdSO($id); 
            require_once('views/so/actualizarSO.php'); 
        } 
 
        public function actualizar() 
        { 
            $so = new SO(
                $_POST['idSO'],
                $_POST['sistema'],
);
            SO::actualizarSO($so); 
            $this->verSO(); 
        } 
 
        public function borrarSO() 
        { 
            if (!isset($_GET['idSO'])) 
               return call('acceso', 'error'); 
             
            $post = SO::borrarSO($_GET['idSO']); 
            $this->verSO(); 
        } 
    } 
?> 
