<?php
    class UsuariosController
    {
        public function verUsuarios()
        {
            $usuarios = Usuarios::verUsuarios();
            include_once ('views/usuarios/verUsuarios.php');
        }
        
        public function formularioUsuarios()
        {
            $lugaresTrabajo = LugarTrabajo::verLugarTrabajo();
            $tiposUsuario = TipoUsuario::verTipoUsuario();
            include_once ('views/usuarios/formularioUsuarios.php');
        }
        
        public function crearUsuarios()
        {   
            if (!isset($_POST['usuarios'], $_POST['password'], $_POST['idLugarTrabajo'],$_POST['idTipoUsuario']))
                return call('acceso', 'error'); 
 
            $usuarios = new Usuarios( null, $_POST['usuarios'], $_POST['password'], $_POST['idLugarTrabajo'],  $_POST['idTipoUsuario']);
            Usuarios::crearUsuarios($usuarios); 
            $this->verUsuarios(); 
        }

        public function actualizarUsuarios() 
        { 
            $id = $_GET['idUsuarios'];
            $lugaresTrabajo = LugarTrabajo::verLugarTrabajo();
            $tiposUsuario = TipoUsuario::verTipoUsuario();
            $usuario = Usuarios::searchByIdUsuarios($id); 
            require_once('views/usuarios/actualizarUsuarios.php'); 
        } 
 
        public function actualizar() 
        {             
            $usuarios = new Usuarios($_POST['idUsuarios'], $_POST['usuario'], $_POST['password'], $_POST['idLugarTrabajo'], $_POST['idTipoUsuario']); 
            Usuarios::actualizarUsuarios($usuarios); 
            $this->verUsuarios(); 
        } 
 
        public function borrarUsuarios() 
        {   
            if (!isset($_GET['idUsuarios'])) 
               return call('acceso', 'error'); 
             
            $post = Usuarios::borrarUsuarios($_GET['idUsuarios']); 
            $this->verUsuarios(); 
        } 
    }
?>