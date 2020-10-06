<?php 
    class ImpresorasController 
    { 
        public function verImpresoras() 
        { 
            $impresoras = Impresoras::verImpresoras(); 
            include_once ('views/impresoras/verImpresoras.php'); 
        } 
 
        public function formularioImpresoras() 
        { 
            include_once ('views/impresoras/formularioImpresoras.php'); 
        } 
 
        public function crearImpresoras() 
        { 
            if (!isset( 
                $_POST['idImpresoras'], 
                $_POST['modelo'], 
                $_POST['idInsumos'], 
               ))
                return call('acceso', 'error'); 
 
                $impresoras = new Impresoras(
                    $_POST['idImpresoras'],        
                    $_POST['modelo'],
                    $_POST['idInsumos'],
  );
            Impresoras::crearImpresoras($impresoras); 
            $this->verImpresoras(); 
        } 
 
        public function actualizarImpresoras() 
        { 
            $id = $_GET['idImpresoras']; 
            $impresoras = Impresoras::searchByIdImpresoras($id); 
            require_once('views/impresoras/actualizarImpresoras.php'); 
        } 
 
        public function actualizar() 
        { 
            $impresoras = new Impresoras(
                $_POST['idImpresoras'],        
                $_POST['modelo'],
                $_POST['idInsumos'],
);
            Impresoras::actualizarImpresoras($impresoras); 
            $this->verImpresoras(); 
        } 
 
        public function borrarImpresoras() 
        { 
            if (!isset($_GET['idImpresoras'])) 
               return call('acceso', 'error'); 
             
            $post = Impresoras::borrarImpresoras($_GET['idImpresoras']); 
            $this->verImpresoras(); 
        } 
    } 
?> 
