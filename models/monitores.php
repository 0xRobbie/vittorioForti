<?php 
    class Monitores 
    { 
        private $idMonitores; 
        private $monitor; 
        private $resolucion; 
        private $puertos; 
 
        public function __construct ( 
                                        $idMonitores,  
                                        $monitor,  
                                        $resolucion,  
                                        $puertos,  
                                    ) // Borrar la ultima coma
        { 
            $this->idMonitores = $idMonitores; 
            $this->monitor = $monitor; 
            $this->resolucion = $resolucion; 
            $this->puertos = $puertos; 
        } 
 
        public function getidMonitores() { return $this->idMonitores;} 
        public function setidMonitores($idMonitores) {$this->idMonitores;} 
        public function getmonitor() { return $this->monitor;} 
        public function setmonitor($monitor) {$this->monitor;} 
        public function getresolucion() { return $this->resolucion;} 
        public function setresolucion($resolucion) {$this->resolucion;} 
        public function getpuertos() { return $this->puertos;} 
        public function setpuertos($puertos) {$this->puertos;} 
 
        public static function verMonitores() 
        { 
            $db = Db::getInstance(); 
            $monitores = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    monitores 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $monitores[] = new Monitores(  
                                                        $select['idMonitores'],  
                                                        $select['monitor'],  
                                                        $select['resolucion'],  
                                                        $select['puertos'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $monitores; 
        } 
 
        public static function crearMonitores($monitores) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  monitores (
                                       idMonitores
                                       monitor
                                       resolucion
                                       puertos
                                  )
                                  VALUES ( 
                                       :idMonitores, 
                                       :monitor, 
                                       :resolucion, 
                                       :puertos, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idMonitores', $monitores->getidMonitores()); 
            $insert->bindValue('monitor', $monitores->getmonitor()); 
            $insert->bindValue('resolucion', $monitores->getresolucion()); 
            $insert->bindValue('puertos', $monitores->getpuertos()); 
            $insert->execute(); 
        } 
 
        public static function actualizarMonitores($monitores) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    monitores  
                                    SET  
                                    idMonitores=:idMonitores, 
                                    monitor=:monitor, 
                                    resolucion=:resolucion, 
                                    puertos=:puertos, 
                                    WHERE  // Borrar la ultima coma
                                    idMonitores=:idMonitores'); 
         
            $update->bindValue('idMonitores', $monitores->getidMonitores()); 
            $update->bindValue('monitor', $monitores->getmonitor()); 
            $update->bindValue('resolucion', $monitores->getresolucion()); 
            $update->bindValue('puertos', $monitores->getpuertos()); 
            $update->execute(); 
        } 
 
        public static function searchByidMonitores($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    monitores  
                                    WHERE  
                                    idMonitores = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Monitores(   
                                        $select['idMonitores'],  
                                        $select['monitor'],  
                                        $select['resolucion'],  
                                        $select['puertos'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarMonitores($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    monitores  
                    WHERE  
                    idMonitores = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
