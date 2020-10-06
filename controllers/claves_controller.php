<?php 
    class ClavesController 
    { 
        public function verClaves() 
        { 
            $claves = Claves::verClaves(); 
            include_once ('views/claves/verClaves.php'); 
        } 
 
        public function formularioClaves() 
        {   
            $servicios = Servicio::verServicio();
            $usuarios = Usuarios::verUsuarios();
            include_once ('views/claves/formularioClaves.php'); 
        } 
 
        public function crearClaves() 
        { 
            if (!isset( $_POST['usuario'], $_POST['password'],  $_POST['idServicio'], $_POST['idUsuarios']))
                return call('acceso', 'error'); 
 
            $claves = new Claves(null, $_POST['usuario'],$_POST['password'],$_POST['idServicio'],$_POST['idUsuarios']);
            Claves::crearClaves($claves); 
            $this->verClaves(); 
        } 
 
        public function actualizarClaves() 
        { 
            $id = $_GET['idClaves']; 
            $claves = Claves::searchByIdClaves($id); 
            require_once('views/claves/actualizarClaves.php'); 
        } 
 
        public function actualizar() 
        { 
            $claves = new Claves($_POST['idClaves'], $_POST['usuario'],$_POST['password'],$_POST['idServicio'],$_POST['idUsuarios']);
            Claves::actualizarClaves($claves); 
            $this->verClaves(); 
        } 
 
        public function borrarClaves() 
        { 
            if (!isset($_GET['idClaves'])) 
               return call('acceso', 'error'); 
             
            $post = Claves::borrarClaves($_GET['idClaves']); 
            $this->verClaves(); 
        } 
    } 
?> 
