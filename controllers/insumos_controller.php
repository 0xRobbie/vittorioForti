<?php 
    class InsumosController 
    { 
        public function verInsumos() 
        { 
            $insumos = Insumos::verInsumos(); 
            include_once ('views/insumos/verInsumos.php'); 
        } 
 
        public function formularioInsumos() 
        { 
            include_once ('views/insumos/formularioInsumos.php'); 
        } 
 
        public function crearInsumos() 
        { 
            if (!isset(
                $_POST['idInsumos'],
                $_POST['insumo'],
                $_POST['modelo'],
                $_POST['piezas']
               ))
                return call('acceso', 'error'); 
 
                $insumos = new Insumos(
                    $_POST['idInsumos'],
                    $_POST['insumo'],
                    $_POST['modelo'],
                    $_POST['piezas']
  );
            Insumos::crearInsumos($insumos); 
            $this->verInsumos(); 
        } 
 
        public function actualizarInsumos() 
        { 
            $id = $_GET['idInsumos']; 
            $insumos = Insumos::searchByIdInsumos($id); 
            require_once('views/insumos/actualizarInsumos.php'); 
        } 
 
        public function actualizar() 
        { 
            $insumos = new Insumos(
                $_POST['idInsumos'],
                $_POST['insumo'],
                $_POST['modelo'],
                $_POST['piezas']
);
            Insumos::actualizarInsumos($insumos); 
            $this->verInsumos(); 
        } 
 
        public function borrarInsumos() 
        { 
            if (!isset($_GET['idInsumos'])) 
               return call('acceso', 'error'); 
             
            $post = Insumos::borrarInsumos($_GET['idInsumos']); 
            $this->verInsumos(); 
        } 
    } 
?> 
