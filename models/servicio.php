<?php 
    class Servicio 
    { 
        private $idServicio; 
        private $servicio; 
 
        public function __construct ( $idServicio,  $servicio ) 
        { 
            $this->idServicio = $idServicio; 
            $this->servicio = $servicio; 
        } 
 
        public function getidServicio() { return $this->idServicio;} 
        public function setidServicio($idServicio) {$this->idServicio;} 
        public function getservicio() { return $this->servicio;} 
        public function setservicio($servicio) {$this->servicio;} 
 
        public static function verServicio() 
        { 
            $db = Db::getInstance(); 
            $servicio = [];          
            $stmt = $db->prepare('SELECT * FROM  servicio '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $servicio[] = new Servicio( $select['idServicio'], $select['servicio'] ); // Borrar la ultima coma
            } 
 
            return $servicio; 
        } 
 
        public static function crearServicio($servicio) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO servicio ( idServicio, servicio ) VALUES ( :idServicio, :servicio )');
            $insert->bindValue('idServicio', $servicio->getidServicio()); 
            $insert->bindValue('servicio', $servicio->getservicio()); 
            $insert->execute(); 
        } 
 
        public static function actualizarServicio($servicio) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    servicio  
                                    SET  
                                    idServicio=:idServicio, 
                                    servicio=:servicio
                                    WHERE
                                    idServicio=:idServicio'); 
         
            $update->bindValue('idServicio', $servicio->getidServicio()); 
            $update->bindValue('servicio', $servicio->getservicio()); 
            $update->execute(); 
        } 
 
        public static function searchByidServicio($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare('SELECT * FROM servicio WHERE idServicio = $id'); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
            return new Servicio( $select['idServicio'], $select['servicio'] );
        } 
 
        public static function borrarServicio($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM servicio WHERE idServicio = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
