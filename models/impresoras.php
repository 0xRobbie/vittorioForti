<?php 
    class Impresoras 
    { 
        private $idImpresoras; 
        private $modelo; 
        private $idInsumos; 
 
        public function __construct ( 
                                        $idImpresoras,  
                                        $modelo,  
                                        $idInsumos,  
                                    ) // Borrar la ultima coma
        { 
            $this->idImpresoras = $idImpresoras; 
            $this->modelo = $modelo; 
            $this->idInsumos = $idInsumos; 
        } 
 
        public function getidImpresoras() { return $this->idImpresoras;} 
        public function setidImpresoras($idImpresoras) {$this->idImpresoras;} 
        public function getmodelo() { return $this->modelo;} 
        public function setmodelo($modelo) {$this->modelo;} 
        public function getidInsumos() { return $this->idInsumos;} 
        public function setidInsumos($idInsumos) {$this->idInsumos;} 
 
        public static function verImpresoras() 
        { 
            $db = Db::getInstance(); 
            $impresoras = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    impresoras 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $impresoras[] = new Impresoras(  
                                                        $select['idImpresoras'],  
                                                        $select['modelo'],  
                                                        $select['idInsumos'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $impresoras; 
        } 
 
        public static function crearImpresoras($impresoras) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  impresoras (
                                       idImpresoras
                                       modelo
                                       idInsumos
                                  )
                                  VALUES ( 
                                       :idImpresoras, 
                                       :modelo, 
                                       :idInsumos, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idImpresoras', $impresoras->getidImpresoras()); 
            $insert->bindValue('modelo', $impresoras->getmodelo()); 
            $insert->bindValue('idInsumos', $impresoras->getidInsumos()); 
            $insert->execute(); 
        } 
 
        public static function actualizarImpresoras($impresoras) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    impresoras  
                                    SET  
                                    idImpresoras=:idImpresoras, 
                                    modelo=:modelo, 
                                    idInsumos=:idInsumos, 
                                    WHERE  // Borrar la ultima coma
                                    idImpresoras=:idImpresoras'); 
         
            $update->bindValue('idImpresoras', $impresoras->getidImpresoras()); 
            $update->bindValue('modelo', $impresoras->getmodelo()); 
            $update->bindValue('idInsumos', $impresoras->getidInsumos()); 
            $update->execute(); 
        } 
 
        public static function searchByidImpresoras($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    impresoras  
                                    WHERE  
                                    idImpresoras = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Impresoras(   
                                        $select['idImpresoras'],  
                                        $select['modelo'],  
                                        $select['idInsumos'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarImpresoras($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    impresoras  
                    WHERE  
                    idImpresoras = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
