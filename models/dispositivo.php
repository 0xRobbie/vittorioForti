<?php 
    class Dispositivo 
    { 
        private $idDispositivo; 
        private $dispositivo; 
 
        public function __construct ( 
                                        $idDispositivo,  
                                        $dispositivo,  
                                    ) // Borrar la ultima coma
        { 
            $this->idDispositivo = $idDispositivo; 
            $this->dispositivo = $dispositivo; 
        } 
 
        public function getidDispositivo() { return $this->idDispositivo;} 
        public function setidDispositivo($idDispositivo) {$this->idDispositivo;} 
        public function getdispositivo() { return $this->dispositivo;} 
        public function setdispositivo($dispositivo) {$this->dispositivo;} 
 
        public static function verDispositivo() 
        { 
            $db = Db::getInstance(); 
            $dispositivo = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    dispositivo 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $dispositivo[] = new Dispositivo(  
                                                        $select['idDispositivo'],  
                                                        $select['dispositivo'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $dispositivo; 
        } 
 
        public static function crearDispositivo($dispositivo) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  dispositivo (
                                       idDispositivo
                                       dispositivo
                                  )
                                  VALUES ( 
                                       :idDispositivo, 
                                       :dispositivo, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idDispositivo', $dispositivo->getidDispositivo()); 
            $insert->bindValue('dispositivo', $dispositivo->getdispositivo()); 
            $insert->execute(); 
        } 
 
        public static function actualizarDispositivo($dispositivo) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    dispositivo  
                                    SET  
                                    idDispositivo=:idDispositivo, 
                                    dispositivo=:dispositivo, 
                                    WHERE  // Borrar la ultima coma
                                    idDispositivo=:idDispositivo'); 
         
            $update->bindValue('idDispositivo', $dispositivo->getidDispositivo()); 
            $update->bindValue('dispositivo', $dispositivo->getdispositivo()); 
            $update->execute(); 
        } 
 
        public static function searchByidDispositivo($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    dispositivo  
                                    WHERE  
                                    idDispositivo = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Dispositivo(   
                                        $select['idDispositivo'],  
                                        $select['dispositivo'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarDispositivo($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    dispositivo  
                    WHERE  
                    idDispositivo = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
