<?php 
    class Ram 
    { 
        private $idRam; 
        private $ram; 
        private $capacidad; 
        private $tipo; 
 
        public function __construct ( 
                                        $idRam,  
                                        $ram,  
                                        $capacidad,  
                                        $tipo,  
                                    ) // Borrar la ultima coma
        { 
            $this->idRam = $idRam; 
            $this->ram = $ram; 
            $this->capacidad = $capacidad; 
            $this->tipo = $tipo; 
        } 
 
        public function getidRam() { return $this->idRam;} 
        public function setidRam($idRam) {$this->idRam;} 
        public function getram() { return $this->ram;} 
        public function setram($ram) {$this->ram;} 
        public function getcapacidad() { return $this->capacidad;} 
        public function setcapacidad($capacidad) {$this->capacidad;} 
        public function gettipo() { return $this->tipo;} 
        public function settipo($tipo) {$this->tipo;} 
 
        public static function verRam() 
        { 
            $db = Db::getInstance(); 
            $ram = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    ram 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $ram[] = new Ram(  
                                                        $select['idRam'],  
                                                        $select['ram'],  
                                                        $select['capacidad'],  
                                                        $select['tipo'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $ram; 
        } 
 
        public static function crearRam($ram) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  ram (
                                       idRam
                                       ram
                                       capacidad
                                       tipo
                                  )
                                  VALUES ( 
                                       :idRam, 
                                       :ram, 
                                       :capacidad, 
                                       :tipo, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idRam', $ram->getidRam()); 
            $insert->bindValue('ram', $ram->getram()); 
            $insert->bindValue('capacidad', $ram->getcapacidad()); 
            $insert->bindValue('tipo', $ram->gettipo()); 
            $insert->execute(); 
        } 
 
        public static function actualizarRam($ram) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    ram  
                                    SET  
                                    idRam=:idRam, 
                                    ram=:ram, 
                                    capacidad=:capacidad, 
                                    tipo=:tipo, 
                                    WHERE  // Borrar la ultima coma
                                    idRam=:idRam'); 
         
            $update->bindValue('idRam', $ram->getidRam()); 
            $update->bindValue('ram', $ram->getram()); 
            $update->bindValue('capacidad', $ram->getcapacidad()); 
            $update->bindValue('tipo', $ram->gettipo()); 
            $update->execute(); 
        } 
 
        public static function searchByidRam($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    ram  
                                    WHERE  
                                    idRam = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Ram(   
                                        $select['idRam'],  
                                        $select['ram'],  
                                        $select['capacidad'],  
                                        $select['tipo'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarRam($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    ram  
                    WHERE  
                    idRam = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
