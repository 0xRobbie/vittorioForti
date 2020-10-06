<?php 
    class EquipoArmadoController 
    { 
        public function verEquipoArmado() 
        { 
            $equipoarmado = EquipoArmado::verEquipoArmado(); 
            include_once ('views/equipoarmado/verEquipoArmado.php'); 
        } 
 
        public function formularioEquipoArmado() 
        { 
            include_once ('views/equipoarmado/formularioEquipoArmado.php'); 
        } 
 
        public function crearEquipoArmado() 
        { 
            if (!isset(
                $_POST['idEquipoArmado'],
                $_POST['idFuentePoder'],
                $_POST['idRam'],
                $_POST['idDiscosDuros'],
                $_POST['idTeclados'],
                $_POST['idMouses'],
                $_POST['idMonitores'],
                $_POST['idTarjetasMadre'],
                $_POST['idSO'],
               ))
                return call('acceso', 'error'); 
 
                $equipoarmado = new EquipoArmado(
                    $_POST['idEquipoArmado'],      
                    $_POST['idFuentePoder'],       
                    $_POST['idRam'],
                    $_POST['idDiscosDuros'],       
                    $_POST['idTeclados'],
                    $_POST['idMouses'],
                    $_POST['idMonitores'],
                    $_POST['idTarjetasMadre'], 
                    $_POST['idSO'], 
  );
            EquipoArmado::crearEquipoArmado($equipoarmado); 
            $this->verEquipoArmado(); 
        } 
 
        public function actualizarEquipoArmado() 
        { 
            $id = $_GET['idEquipoArmado']; 
            $equipoarmado = EquipoArmado::searchByIdEquipoArmado($id); 
            require_once('views/equipoarmado/actualizarEquipoArmado.php'); 
        } 
 
        public function actualizar() 
        { 
            $equipoarmado = new EquipoArmado(
                $_POST['idEquipoArmado'],      
                $_POST['idFuentePoder'],       
                $_POST['idRam'],
                $_POST['idDiscosDuros'],       
                $_POST['idTeclados'],
                $_POST['idMouses'],
                $_POST['idMonitores'],
                $_POST['idTarjetasMadre'], 
                $_POST['idSO'], 
);
            EquipoArmado::actualizarEquipoArmado($equipoarmado); 
            $this->verEquipoArmado(); 
        } 
 
        public function borrarEquipoArmado() 
        { 
            if (!isset($_GET['idEquipoArmado'])) 
               return call('acceso', 'error'); 
             
            $post = EquipoArmado::borrarEquipoArmado($_GET['idEquipoArmado']); 
            $this->verEquipoArmado(); 
        } 
    } 
?> 
