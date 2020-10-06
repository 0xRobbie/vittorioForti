<?php 
    class Mouses 
    { 
        private $idMouses; 
        private $mouse; 
        private $inalambrico; 
 
        public function __construct ( 
                                        $idMouses,  
                                        $mouse,  
                                        $inalambrico,  
                                    ) // Borrar la ultima coma
        { 
            $this->idMouses = $idMouses; 
            $this->mouse = $mouse; 
            $this->inalambrico = $inalambrico; 
        } 
 
        public function getidMouses() { return $this->idMouses;} 
        public function setidMouses($idMouses) {$this->idMouses;} 
        public function getmouse() { return $this->mouse;} 
        public function setmouse($mouse) {$this->mouse;} 
        public function getinalambrico() { return $this->inalambrico;} 
        public function setinalambrico($inalambrico) {$this->inalambrico;} 
 
        public static function verMouses() 
        { 
            $db = Db::getInstance(); 
            $mouses = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    mouses 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $mouses[] = new Mouses(  
                                                        $select['idMouses'],  
                                                        $select['mouse'],  
                                                        $select['inalambrico'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $mouses; 
        } 
 
        public static function crearMouses($mouses) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  mouses (
                                       idMouses
                                       mouse
                                       inalambrico
                                  )
                                  VALUES ( 
                                       :idMouses, 
                                       :mouse, 
                                       :inalambrico, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idMouses', $mouses->getidMouses()); 
            $insert->bindValue('mouse', $mouses->getmouse()); 
            $insert->bindValue('inalambrico', $mouses->getinalambrico()); 
            $insert->execute(); 
        } 
 
        public static function actualizarMouses($mouses) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    mouses  
                                    SET  
                                    idMouses=:idMouses, 
                                    mouse=:mouse, 
                                    inalambrico=:inalambrico, 
                                    WHERE  // Borrar la ultima coma
                                    idMouses=:idMouses'); 
         
            $update->bindValue('idMouses', $mouses->getidMouses()); 
            $update->bindValue('mouse', $mouses->getmouse()); 
            $update->bindValue('inalambrico', $mouses->getinalambrico()); 
            $update->execute(); 
        } 
 
        public static function searchByidMouses($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    mouses  
                                    WHERE  
                                    idMouses = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Mouses(   
                                        $select['idMouses'],  
                                        $select['mouse'],  
                                        $select['inalambrico'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarMouses($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    mouses  
                    WHERE  
                    idMouses = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
