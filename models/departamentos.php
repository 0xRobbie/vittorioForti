<?php
    class Departamentos
    {
        private $idDepartamentos;
        private $departamento;

        public function __construct($idDepartamentos, $departamento)
        {
            $this->idDepartamentos = $idDepartamentos;
            $this->departamento = $departamento;
        }

        public function getIdDepartamentos() { return $this->idDepartamentos;}
        public function setIdDepartamentos($idDepartamentos) {$this->idDepartamentos;}
        public function getDepartamento() { return $this->departamento;}
        public function setDepartamento($departamento) {$this->departamento;}

        public static function verDepartamentos(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT * FROM departamentos;");

            foreach($req->fetchAll() as $select) {
                $departamentos[] = new Departamentos( $select['idDepartamentos'], $select['departamento']);
            }

            return $departamentos;
        }

        public static function crearDepartamentos($departamentos){
            $db = Db::getInstance();
            $insert=$db->prepare('INSERT INTO departamentos (departamento) VALUES (:departamento)');
            $insert->bindValue('departamento', $departamentos->getDepartamento());
            $insert->execute();

            $last_id = $db->lastInsertId();
            return $last_id;
        }

        public static function actualizarDepartamentos($departamentos) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE departamentos SET idDepartamentos=:idDepartamentos,departamento=:departamento WHERE idDepartamentos=:idDepartamentos'); 
            $update->bindValue('idDepartamentos', $departamentos->getidDepartamentos()); 
            $update->bindValue('departamento', $departamentos->getdepartamento()); 
            $update->execute(); 
        } 
 
        public static function searchByidDepartamentos($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("SELECT * FROM departamentos WHERE idDepartamentos = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Departamentos( $select['idDepartamentos'], $select['departamento'] );
        } 
 
        public static function borrarDepartamentos($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM departamentos WHERE idDepartamentos = $id"); 
            $db->exec($sql); 
        } 

        

    }
?>