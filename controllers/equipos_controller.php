<?php 
    class EquiposController 
    { 
        public function verEquipos() 
        { 
            $equipos = Equipos::verEquipos(); 
            include_once ('views/equipos/verEquipos.php'); 
        } 
 
        public function formularioEquipos() 
        { 
            include_once ('views/equipos/formularioEquipos.php'); 
        } 
 
        public function crearEquipos() 
        { 
            if (!isset(
                $_POST['idEquipos'],
                $_POST['idImpresoras'],
                $_POST['idEquipoArmado'],
                $_POST['idDispositivoMovil'],
                $_POST['idInsumos'],
               ))
                return call('acceso', 'error'); 
 
                $equipos = new Equipos(
                    $_POST['idEquipos'],
                    $_POST['idImpresoras'],        
                    $_POST['idEquipoArmado'],      
                    $_POST['idDispositivoMovil'],  
                    $_POST['idInsumos'],
  );
            Equipos::crearEquipos($equipos); 
            $this->verEquipos(); 
        } 
 
        public function actualizarEquipos() 
        { 
            $id = $_GET['idEquipos']; 
            $equipos = Equipos::searchByIdEquipos($id); 
            require_once('views/equipos/actualizarEquipos.php'); 
        } 
 
        public function actualizar() 
        { 
            $equipos = new Equipos(
                $_POST['idEquipos'],
                $_POST['idImpresoras'],        
                $_POST['idEquipoArmado'],      
                $_POST['idDispositivoMovil'],  
                $_POST['idInsumos'],
);
            Equipos::actualizarEquipos($equipos); 
            $this->verEquipos(); 
        } 
 
        public function borrarEquipos() 
        { 
            if (!isset($_GET['idEquipos'])) 
               return call('acceso', 'error'); 
             
            $post = Equipos::borrarEquipos($_GET['idEquipos']); 
            $this->verEquipos(); 
        } 
    } 
?> 
