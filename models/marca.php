<?php 
    class Marca 
    { 
        private $idMarca; 
        private $marca; 
        private $idEquipos; 
 
        public function __construct ( 
                                        $idMarca,  
                                        $marca,  
                                        $idEquipos,  
                                    ) // Borrar la ultima coma
        { 
            $this->idMarca = $idMarca; 
            $this->marca = $marca; 
            $this->idEquipos = $idEquipos; 
        } 
 
        public function getidMarca() { return $this->idMarca;} 
        public function setidMarca($idMarca) {$this->idMarca;} 
        public function getmarca() { return $this->marca;} 
        public function setmarca($marca) {$this->marca;} 
        public function getidEquipos() { return $this->idEquipos;} 
        public function setidEquipos($idEquipos) {$this->idEquipos;} 
 
        public static function verMarca() 
        { 
            $db = Db::getInstance(); 
            $marca = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    marca 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $marca[] = new Marca(  
                                                        $select['idMarca'],  
                                                        $select['marca'],  
                                                        $select['idEquipos'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $marca; 
        } 
 
        public static function crearMarca($marca) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  marca (
                                       idMarca
                                       marca
                                       idEquipos
                                  )
                                  VALUES ( 
                                       :idMarca, 
                                       :marca, 
                                       :idEquipos, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idMarca', $marca->getidMarca()); 
            $insert->bindValue('marca', $marca->getmarca()); 
            $insert->bindValue('idEquipos', $marca->getidEquipos()); 
            $insert->execute(); 
        } 
 
        public static function actualizarMarca($marca) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    marca  
                                    SET  
                                    idMarca=:idMarca, 
                                    marca=:marca, 
                                    idEquipos=:idEquipos, 
                                    WHERE  // Borrar la ultima coma
                                    idMarca=:idMarca'); 
         
            $update->bindValue('idMarca', $marca->getidMarca()); 
            $update->bindValue('marca', $marca->getmarca()); 
            $update->bindValue('idEquipos', $marca->getidEquipos()); 
            $update->execute(); 
        } 
 
        public static function searchByidMarca($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    marca  
                                    WHERE  
                                    idMarca = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Marca(   
                                        $select['idMarca'],  
                                        $select['marca'],  
                                        $select['idEquipos'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarMarca($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    marca  
                    WHERE  
                    idMarca = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
