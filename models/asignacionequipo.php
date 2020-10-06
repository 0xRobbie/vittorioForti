<?php 
    class AsignacionEquipo 
    { 
        private $idAsignacionEquipo; 
        private $idUsuarios; 
        private $idTipoAsignacion; 
        private $ultimoMovimiento; 
        private $idEquipos; 
 
        public function __construct ( 
                                        $idAsignacionEquipo,  
                                        $idUsuarios,  
                                        $idTipoAsignacion,  
                                        $ultimoMovimiento,  
                                        $idEquipos,  
                                    ) // Borrar la ultima coma
        { 
            $this->idAsignacionEquipo = $idAsignacionEquipo; 
            $this->idUsuarios = $idUsuarios; 
            $this->idTipoAsignacion = $idTipoAsignacion; 
            $this->ultimoMovimiento = $ultimoMovimiento; 
            $this->idEquipos = $idEquipos; 
        } 
 
        public function getidAsignacionEquipo() { return $this->idAsignacionEquipo;} 
        public function setidAsignacionEquipo($idAsignacionEquipo) {$this->idAsignacionEquipo;} 
        public function getidUsuarios() { return $this->idUsuarios;} 
        public function setidUsuarios($idUsuarios) {$this->idUsuarios;} 
        public function getidTipoAsignacion() { return $this->idTipoAsignacion;} 
        public function setidTipoAsignacion($idTipoAsignacion) {$this->idTipoAsignacion;} 
        public function getultimoMovimiento() { return $this->ultimoMovimiento;} 
        public function setultimoMovimiento($ultimoMovimiento) {$this->ultimoMovimiento;} 
        public function getidEquipos() { return $this->idEquipos;} 
        public function setidEquipos($idEquipos) {$this->idEquipos;} 
 
        public static function verAsignacionEquipo() 
        { 
            $db = Db::getInstance(); 
            $asignacionequipo = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    asignacionequipo 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $asignacionequipo[] = new AsignacionEquipo(  
                                                        $select['idAsignacionEquipo'],  
                                                        $select['idUsuarios'],  
                                                        $select['idTipoAsignacion'],  
                                                        $select['ultimoMovimiento'],  
                                                        $select['idEquipos'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $asignacionequipo; 
        } 
 
        public static function crearAsignacionEquipo($asignacionequipo) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  asignacionequipo (
                                       idAsignacionEquipo
                                       idUsuarios
                                       idTipoAsignacion
                                       ultimoMovimiento
                                       idEquipos
                                  )
                                  VALUES ( 
                                       :idAsignacionEquipo, 
                                       :idUsuarios, 
                                       :idTipoAsignacion, 
                                       :ultimoMovimiento, 
                                       :idEquipos, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idAsignacionEquipo', $asignacionequipo->getidAsignacionEquipo()); 
            $insert->bindValue('idUsuarios', $asignacionequipo->getidUsuarios()); 
            $insert->bindValue('idTipoAsignacion', $asignacionequipo->getidTipoAsignacion()); 
            $insert->bindValue('ultimoMovimiento', $asignacionequipo->getultimoMovimiento()); 
            $insert->bindValue('idEquipos', $asignacionequipo->getidEquipos()); 
            $insert->execute(); 
        } 
 
        public static function actualizarAsignacionEquipo($asignacionequipo) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    asignacionequipo  
                                    SET  
                                    idAsignacionEquipo=:idAsignacionEquipo, 
                                    idUsuarios=:idUsuarios, 
                                    idTipoAsignacion=:idTipoAsignacion, 
                                    ultimoMovimiento=:ultimoMovimiento, 
                                    idEquipos=:idEquipos, 
                                    WHERE  // Borrar la ultima coma
                                    idAsignacionEquipo=:idAsignacionEquipo'); 
         
            $update->bindValue('idAsignacionEquipo', $asignacionequipo->getidAsignacionEquipo()); 
            $update->bindValue('idUsuarios', $asignacionequipo->getidUsuarios()); 
            $update->bindValue('idTipoAsignacion', $asignacionequipo->getidTipoAsignacion()); 
            $update->bindValue('ultimoMovimiento', $asignacionequipo->getultimoMovimiento()); 
            $update->bindValue('idEquipos', $asignacionequipo->getidEquipos()); 
            $update->execute(); 
        } 
 
        public static function searchByidAsignacionEquipo($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    asignacionequipo  
                                    WHERE  
                                    idAsignacionEquipo = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new AsignacionEquipo(   
                                        $select['idAsignacionEquipo'],  
                                        $select['idUsuarios'],  
                                        $select['idTipoAsignacion'],  
                                        $select['ultimoMovimiento'],  
                                        $select['idEquipos'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarAsignacionEquipo($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    asignacionequipo  
                    WHERE  
                    idAsignacionEquipo = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
