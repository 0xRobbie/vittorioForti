<?php 
    class DiscosDurosController 
    { 
        public function verDiscosDuros() 
        { 
            $discosduros = DiscosDuros::verDiscosDuros(); 
            include_once ('views/discosduros/verDiscosDuros.php'); 
        } 
 
        public function formularioDiscosDuros() 
        { 
            include_once ('views/discosduros/formularioDiscosDuros.php'); 
        } 
 
        public function crearDiscosDuros() 
        { 
            if (!isset( 
                $_POST['idDiscosDuros'],
                $_POST['disco'],
                $_POST['capacidad'],
                $_POST['tipoConexion'],
               ))
                return call('acceso', 'error'); 
 
                $discosduros = new DiscosDuros(
                    $_POST['idDiscosDuros'],       
                    $_POST['disco'],
                    $_POST['capacidad'],
                    $_POST['tipoConexion'],        
  );
            DiscosDuros::crearDiscosDuros($discosduros); 
            $this->verDiscosDuros(); 
        } 
 
        public function actualizarDiscosDuros() 
        { 
            $id = $_GET['idDiscosDuros']; 
            $discosduros = DiscosDuros::searchByIdDiscosDuros($id); 
            require_once('views/discosduros/actualizarDiscosDuros.php'); 
        } 
 
        public function actualizar() 
        { 
            $discosduros = new DiscosDuros(
                $_POST['idDiscosDuros'],       
                $_POST['disco'],
                $_POST['capacidad'],
                $_POST['tipoConexion'],        
);
            DiscosDuros::actualizarDiscosDuros($discosduros); 
            $this->verDiscosDuros(); 
        } 
 
        public function borrarDiscosDuros() 
        { 
            if (!isset($_GET['idDiscosDuros'])) 
               return call('acceso', 'error'); 
             
            $post = DiscosDuros::borrarDiscosDuros($_GET['idDiscosDuros']); 
            $this->verDiscosDuros(); 
        } 
    } 
?> 
