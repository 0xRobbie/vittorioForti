<?php 
    class ServicioController 
    { 
        public function verServicio() 
        { 
            $servicio = Servicio::verServicio(); 
            include_once ('views/servicio/verServicio.php'); 
        } 
 
        public function formularioServicio() 
        { 
            include_once ('views/servicio/formularioServicio.php'); 
        } 
 
        public function crearServicio() 
        { 
            if (!isset( $_POST['servicio']))
                return call('acceso', 'error'); 
 
            $servicio = new Servicio( null , $_POST['servicio'] );
            Servicio::crearServicio($servicio); 
            $this->verServicio(); 
        } 
 
        public function actualizarServicio() 
        { 
            $id = $_GET['idServicio']; 
            $servicio = Servicio::searchByIdServicio($id); 
            require_once('views/servicio/actualizarServicio.php'); 
        } 
 
        public function actualizar() 
        { 
            $servicio = new Servicio( $_POST['idServicio'], $_POST['servicio']);
            Servicio::actualizarServicio($servicio); 
            $this->verServicio(); 
        } 
 
        public function borrarServicio() 
        { 
            if (!isset($_GET['idServicio'])) 
               return call('acceso', 'error'); 
             
            $post = Servicio::borrarServicio($_GET['idServicio']); 
            $this->verServicio(); 
        } 
    } 
?> 
