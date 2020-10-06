<?php 
    class LugarTrabajoController 
    { 
        public function verLugarTrabajo() 
        { 
            $lugartrabajo = LugarTrabajo::verLugarTrabajo(); 
            include_once ('views/lugartrabajo/verLugarTrabajo.php'); 
        } 
 
        public function formularioLugarTrabajo() 
        { 
            include_once ('views/lugartrabajo/formularioLugarTrabajo.php'); 
        } 
 
        public function crearLugarTrabajo() 
        { 
            if (!isset(  $_POST['idLugarTrabajo'], $_POST['idDepartamentos'],  $_POST['idSucursales']))
                return call('acceso', 'error'); 
 
            $lugartrabajo = new LugarTrabajo( $_POST['idLugarTrabajo'], $_POST['idDepartamentos'], $_POST['idSucursales']);
            LugarTrabajo::crearLugarTrabajo($lugartrabajo); 
            $this->verLugarTrabajo(); 
        } 
        
        public function actualizarLugarTrabajo() 
        { 
            $id = $_GET['idLugarTrabajo']; 
            $lugartrabajo = LugarTrabajo::searchByIdLugarTrabajo($id); 
            require_once('views/lugartrabajo/actualizarLugarTrabajo.php'); 
        } 
 
        public function actualizar() 
        { 
            $lugartrabajo = new LugarTrabajo( $_POST['idLugarTrabajo'], $_POST['idDepartamentos'], $_POST['idSucursales']);
            LugarTrabajo::actualizarLugarTrabajo($lugartrabajo); 
            $this->verLugarTrabajo(); 
        } 
 
        public function borrarLugarTrabajo() 
        { 
            if (!isset($_GET['idLugarTrabajo'])) 
               return call('acceso', 'error'); 
             
            $post = LugarTrabajo::borrarLugarTrabajo($_GET['idLugarTrabajo']); 
            $this->verLugarTrabajo(); 
        } 
    } 
?> 
