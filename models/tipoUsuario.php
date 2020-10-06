<?php
    class TipoUsuario
    {
        private $idTipoUsuario;
        private $tipo;

        public function __construct($idTipoUsuario, $tipo)
        {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->tipo = $tipo;
        }

        public function getidTipoUsuario() { return $this->idTipoUsuario;}
        public function setidTipoUsuario($idTipoUsuario) {$this->idTipoUsuario;}
        public function gettipo() { return $this->tipo;}
        public function settipo($tipo) {$this->tipo;}

        public static function verTipoUsuario(){
            $db = Db::getInstance();
            $tipoUsuario = [];          
            $stmt = $db->prepare('SELECT idTipoUsuario, tipo FROM tipoUsuario');
            $stmt->execute();

            foreach($stmt->fetchAll() as $select) { 
                $tipoUsuario[] = new TipoUsuario($select['idTipoUsuario'], $select['tipo']);
            } 

            return $tipoUsuario; 
        }

        public static function actualizarTipoUsuario($TipoUsuario){
            $db = Db::getInstance();
            $update = $db->prepare('UPDATE TipoUsuario SET TipoUsuario=:TipoUsuario WHERE tipo=:tipo');
            $update->bindValue('idTipoUsuario', $TipoUsuario->idTipoUsuario());
            $update->bindValue('tipo', $TipoUsuario->gettipo());
            $update->execute();
          }

          public static function searchByIdTipoUsuario($id) {
            $db = Db::getInstance();

            $stmt = $db->prepare("SELECT * FROM TipoUsuario WHERE idTipoUsuario = $id");
            $stmt->execute();
            $TipoUsuario = $stmt->fetch();

            return new TipoUsuario($TipoUsuario['idTipoUsuario'], $TipoUsuario['tipo']);
          }

        public static function crearTipoUsuario($TipoUsuario){
            $db = Db::getInstance();
            $insert=$db->prepare('INSERT INTO TipoUsuario (idTipoUsuario, tipo) VALUES (:idTipoUsuario, :tipo)');
            $insert->bindValue('idTipoUsuario', $TipoUsuario->idTipoUsuario());
            $insert->bindValue('tipo', $TipoUsuario->gettipo());
            $insert->execute();
        }

    }
?>