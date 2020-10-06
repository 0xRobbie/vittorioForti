<?php
    class DepartamentosController
    {
        public function verDepartamentos()
        {
            $departamentos = Departamentos::verDepartamentos();
            include_once ('views/departamentos/verDepartamentos.php');
        }
        
        public function formularioDepartamentos()
        {
            include_once ('views/departamentos/formularioDepartamentos.php');
        }
        
        public function crearDepartamentos()
        {
            if ( !isset($_POST['departamento']) )
                return call('acceso', 'error');

            $departamento = new Departamentos(null, $_POST['departamento']);
            $last_id = Departamentos::crearDepartamentos($departamento);

            $lugarTrabajo = new LugarTrabajo(null, $last_id, null);
            LugarTrabajo::crearLugarTrabajo($lugarTrabajo);

            $this->verDepartamentos();
        }

        public function actualizarDepartamentos() 
        { 
            $id = $_GET['idDepartamentos']; 
            $departamentos = Departamentos::searchByIdDepartamentos($id); 
            require_once('views/departamentos/actualizarDepartamentos.php'); 
        } 
 
        public function actualizar() 
        { 
            $departamentos = new Departamentos($_POST['idDepartamentos'], $_POST['departamento'] );
            Departamentos::actualizarDepartamentos($departamentos); 
            $this->verDepartamentos(); 
        } 
 
        public function borrarDepartamentos() 
        { 
            if (!isset($_GET['idDepartamentos'])) 
               return call('acceso', 'error'); 
            
            LugarTrabajo::borrarDepartamento($_GET['idDepartamentos']);
            $post = Departamentos::borrarDepartamentos($_GET['idDepartamentos']); 
            $this->verDepartamentos(); 
        } 
    }
?>