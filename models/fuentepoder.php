<?php 
    class FuentePoder 
    { 
        private $idFuentePoder; 
        private $fuentePoder; 
        private $watts; 
 
        public function __construct ( 
                                        $idFuentePoder,  
                                        $fuentePoder,  
                                        $watts,  
                                    ) // Borrar la ultima coma
        { 
            $this->idFuentePoder = $idFuentePoder; 
            $this->fuentePoder = $fuentePoder; 
            $this->watts = $watts; 
        } 
 
        public function getidFuentePoder() { return $this->idFuentePoder;} 
        public function setidFuentePoder($idFuentePoder) {$this->idFuentePoder;} 
        public function getfuentePoder() { return $this->fuentePoder;} 
        public function setfuentePoder($fuentePoder) {$this->fuentePoder;} 
        public function getwatts() { return $this->watts;} 
        public function setwatts($watts) {$this->watts;} 
 
        public static function verFuentePoder() 
        { 
            $db = Db::getInstance(); 
            $fuentepoder = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    fuentepoder 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $fuentepoder[] = new FuentePoder(  
                                                        $select['idFuentePoder'],  
                                                        $select['fuentePoder'],  
                                                        $select['watts'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $fuentepoder; 
        } 
 
        public static function crearFuentePoder($fuentepoder) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  fuentepoder (
                                       idFuentePoder
                                       fuentePoder
                                       watts
                                  )
                                  VALUES ( 
                                       :idFuentePoder, 
                                       :fuentePoder, 
                                       :watts, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idFuentePoder', $fuentepoder->getidFuentePoder()); 
            $insert->bindValue('fuentePoder', $fuentepoder->getfuentePoder()); 
            $insert->bindValue('watts', $fuentepoder->getwatts()); 
            $insert->execute(); 
        } 
 
        public static function actualizarFuentePoder($fuentepoder) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    fuentepoder  
                                    SET  
                                    idFuentePoder=:idFuentePoder, 
                                    fuentePoder=:fuentePoder, 
                                    watts=:watts, 
                                    WHERE  // Borrar la ultima coma
                                    idFuentePoder=:idFuentePoder'); 
         
            $update->bindValue('idFuentePoder', $fuentepoder->getidFuentePoder()); 
            $update->bindValue('fuentePoder', $fuentepoder->getfuentePoder()); 
            $update->bindValue('watts', $fuentepoder->getwatts()); 
            $update->execute(); 
        } 
 
        public static function searchByidFuentePoder($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    fuentepoder  
                                    WHERE  
                                    idFuentePoder = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new FuentePoder(   
                                        $select['idFuentePoder'],  
                                        $select['fuentePoder'],  
                                        $select['watts'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarFuentePoder($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    fuentepoder  
                    WHERE  
                    idFuentePoder = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
