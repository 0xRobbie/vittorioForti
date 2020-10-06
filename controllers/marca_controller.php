<?php 
    class MarcaController 
    { 
        public function verMarca() 
        { 
            $marca = Marca::verMarca(); 
            include_once ('views/marca/verMarca.php'); 
        } 
 
        public function formularioMarca() 
        { 
            include_once ('views/marca/formularioMarca.php'); 
        } 
 
        public function crearMarca() 
        { 
            if (!isset(
                $_POST['idMarca'],
                $_POST['marca'],
                $_POST['idEquipos'],
               ))
                return call('acceso', 'error'); 
 
                $marca = new Marca(
                    $_POST['idMarca'],
                    $_POST['marca'],
                    $_POST['idEquipos'],
  );
            Marca::crearMarca($marca); 
            $this->verMarca(); 
        } 
 
        public function actualizarMarca() 
        { 
            $id = $_GET['idMarca']; 
            $marca = Marca::searchByIdMarca($id); 
            require_once('views/marca/actualizarMarca.php'); 
        } 
 
        public function actualizar() 
        { 
            $marca = new Marca(
                $_POST['idMarca'],
                $_POST['marca'],
                $_POST['idEquipos'],
);
            Marca::actualizarMarca($marca); 
            $this->verMarca(); 
        } 
 
        public function borrarMarca() 
        { 
            if (!isset($_GET['idMarca'])) 
               return call('acceso', 'error'); 
             
            $post = Marca::borrarMarca($_GET['idMarca']); 
            $this->verMarca(); 
        } 
    } 
?> 
