<?php 
    class DiscosDuros 
    { 
        private $idDiscosDuros; 
        private $disco; 
        private $capacidad; 
        private $tipoConexion; 
 
        public function __construct ( 
                                        $idDiscosDuros,  
                                        $disco,  
                                        $capacidad,  
                                        $tipoConexion,  
                                    ) // Borrar la ultima coma
        { 
            $this->idDiscosDuros = $idDiscosDuros; 
            $this->disco = $disco; 
            $this->capacidad = $capacidad; 
            $this->tipoConexion = $tipoConexion; 
        } 
 
        public function getidDiscosDuros() { return $this->idDiscosDuros;} 
        public function setidDiscosDuros($idDiscosDuros) {$this->idDiscosDuros;} 
        public function getdisco() { return $this->disco;} 
        public function setdisco($disco) {$this->disco;} 
        public function getcapacidad() { return $this->capacidad;} 
        public function setcapacidad($capacidad) {$this->capacidad;} 
        public function gettipoConexion() { return $this->tipoConexion;} 
        public function settipoConexion($tipoConexion) {$this->tipoConexion;} 
 
        public static function verDiscosDuros() 
        { 
            $db = Db::getInstance(); 
            $discosduros = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    discosduros 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $discosduros[] = new DiscosDuros(  
                                                        $select['idDiscosDuros'],  
                                                        $select['disco'],  
                                                        $select['capacidad'],  
                                                        $select['tipoConexion'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $discosduros; 
        } 
 
        public static function crearDiscosDuros($discosduros) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  discosduros (
                                       idDiscosDuros
                                       disco
                                       capacidad
                                       tipoConexion
                                  )
                                  VALUES ( 
                                       :idDiscosDuros, 
                                       :disco, 
                                       :capacidad, 
                                       :tipoConexion, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idDiscosDuros', $discosduros->getidDiscosDuros()); 
            $insert->bindValue('disco', $discosduros->getdisco()); 
            $insert->bindValue('capacidad', $discosduros->getcapacidad()); 
            $insert->bindValue('tipoConexion', $discosduros->gettipoConexion()); 
            $insert->execute(); 
        } 
 
        public static function actualizarDiscosDuros($discosduros) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    discosduros  
                                    SET  
                                    idDiscosDuros=:idDiscosDuros, 
                                    disco=:disco, 
                                    capacidad=:capacidad, 
                                    tipoConexion=:tipoConexion, 
                                    WHERE  // Borrar la ultima coma
                                    idDiscosDuros=:idDiscosDuros'); 
         
            $update->bindValue('idDiscosDuros', $discosduros->getidDiscosDuros()); 
            $update->bindValue('disco', $discosduros->getdisco()); 
            $update->bindValue('capacidad', $discosduros->getcapacidad()); 
            $update->bindValue('tipoConexion', $discosduros->gettipoConexion()); 
            $update->execute(); 
        } 
 
        public static function searchByidDiscosDuros($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    discosduros  
                                    WHERE  
                                    idDiscosDuros = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new DiscosDuros(   
                                        $select['idDiscosDuros'],  
                                        $select['disco'],  
                                        $select['capacidad'],  
                                        $select['tipoConexion'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarDiscosDuros($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    discosduros  
                    WHERE  
                    idDiscosDuros = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
