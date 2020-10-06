<?php 
    class TipoAsignacion 
    { 
        private $idTipoAsignacion; 
        private $asignacion; 
 
        public function __construct ( 
                                        $idTipoAsignacion,  
                                        $asignacion,  
                                    ) // Borrar la ultima coma
        { 
            $this->idTipoAsignacion = $idTipoAsignacion; 
            $this->asignacion = $asignacion; 
        } 
 
        public function getidTipoAsignacion() { return $this->idTipoAsignacion;} 
        public function setidTipoAsignacion($idTipoAsignacion) {$this->idTipoAsignacion;} 
        public function getasignacion() { return $this->asignacion;} 
        public function setasignacion($asignacion) {$this->asignacion;} 
 
        public static function verTipoAsignacion() 
        { 
            $db = Db::getInstance(); 
            $tipoasignacion = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    tipoasignacion 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $tipoasignacion[] = new TipoAsignacion(  
                                                        $select['idTipoAsignacion'],  
                                                        $select['asignacion'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $tipoasignacion; 
        } 
 
        public static function crearTipoAsignacion($tipoasignacion) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  tipoasignacion (
                                       idTipoAsignacion
                                       asignacion
                                  )
                                  VALUES ( 
                                       :idTipoAsignacion, 
                                       :asignacion, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idTipoAsignacion', $tipoasignacion->getidTipoAsignacion()); 
            $insert->bindValue('asignacion', $tipoasignacion->getasignacion()); 
            $insert->execute(); 
        } 
 
        public static function actualizarTipoAsignacion($tipoasignacion) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    tipoasignacion  
                                    SET  
                                    idTipoAsignacion=:idTipoAsignacion, 
                                    asignacion=:asignacion, 
                                    WHERE  // Borrar la ultima coma
                                    idTipoAsignacion=:idTipoAsignacion'); 
         
            $update->bindValue('idTipoAsignacion', $tipoasignacion->getidTipoAsignacion()); 
            $update->bindValue('asignacion', $tipoasignacion->getasignacion()); 
            $update->execute(); 
        } 
 
        public static function searchByidTipoAsignacion($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    tipoasignacion  
                                    WHERE  
                                    idTipoAsignacion = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new TipoAsignacion(   
                                        $select['idTipoAsignacion'],  
                                        $select['asignacion'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarTipoAsignacion($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    tipoasignacion  
                    WHERE  
                    idTipoAsignacion = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
