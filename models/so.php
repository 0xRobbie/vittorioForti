<?php 
    class SO 
    { 
        private $idSO; 
        private $sistema; 
 
        public function __construct ( 
                                        $idSO,  
                                        $sistema,  
                                    ) // Borrar la ultima coma
        { 
            $this->idSO = $idSO; 
            $this->sistema = $sistema; 
        } 
 
        public function getidSO() { return $this->idSO;} 
        public function setidSO($idSO) {$this->idSO;} 
        public function getsistema() { return $this->sistema;} 
        public function setsistema($sistema) {$this->sistema;} 
 
        public static function verSO() 
        { 
            $db = Db::getInstance(); 
            $so = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    so 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $so[] = new SO(  
                                                        $select['idSO'],  
                                                        $select['sistema'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $so; 
        } 
 
        public static function crearSO($so) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  so (
                                       idSO
                                       sistema
                                  )
                                  VALUES ( 
                                       :idSO, 
                                       :sistema, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idSO', $so->getidSO()); 
            $insert->bindValue('sistema', $so->getsistema()); 
            $insert->execute(); 
        } 
 
        public static function actualizarSO($so) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    so  
                                    SET  
                                    idSO=:idSO, 
                                    sistema=:sistema, 
                                    WHERE  // Borrar la ultima coma
                                    idSO=:idSO'); 
         
            $update->bindValue('idSO', $so->getidSO()); 
            $update->bindValue('sistema', $so->getsistema()); 
            $update->execute(); 
        } 
 
        public static function searchByidSO($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    so  
                                    WHERE  
                                    idSO = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new SO(   
                                        $select['idSO'],  
                                        $select['sistema'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarSO($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    so  
                    WHERE  
                    idSO = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
