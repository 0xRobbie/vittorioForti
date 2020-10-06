<?php 
    class Equipos 
    { 
        private $idEquipos; 
        private $idImpresoras; 
        private $idEquipoArmado; 
        private $idDispositivoMovil; 
        private $idInsumos; 
 
        public function __construct ( 
                                        $idEquipos,  
                                        $idImpresoras,  
                                        $idEquipoArmado,  
                                        $idDispositivoMovil,  
                                        $idInsumos,  
                                    ) // Borrar la ultima coma
        { 
            $this->idEquipos = $idEquipos; 
            $this->idImpresoras = $idImpresoras; 
            $this->idEquipoArmado = $idEquipoArmado; 
            $this->idDispositivoMovil = $idDispositivoMovil; 
            $this->idInsumos = $idInsumos; 
        } 
 
        public function getidEquipos() { return $this->idEquipos;} 
        public function setidEquipos($idEquipos) {$this->idEquipos;} 
        public function getidImpresoras() { return $this->idImpresoras;} 
        public function setidImpresoras($idImpresoras) {$this->idImpresoras;} 
        public function getidEquipoArmado() { return $this->idEquipoArmado;} 
        public function setidEquipoArmado($idEquipoArmado) {$this->idEquipoArmado;} 
        public function getidDispositivoMovil() { return $this->idDispositivoMovil;} 
        public function setidDispositivoMovil($idDispositivoMovil) {$this->idDispositivoMovil;} 
        public function getidInsumos() { return $this->idInsumos;} 
        public function setidInsumos($idInsumos) {$this->idInsumos;} 
 
        public static function verEquipos() 
        { 
            $db = Db::getInstance(); 
            $equipos = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    equipos 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $equipos[] = new Equipos(  
                                                        $select['idEquipos'],  
                                                        $select['idImpresoras'],  
                                                        $select['idEquipoArmado'],  
                                                        $select['idDispositivoMovil'],  
                                                        $select['idInsumos'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $equipos; 
        } 
 
        public static function crearEquipos($equipos) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  equipos (
                                       idEquipos
                                       idImpresoras
                                       idEquipoArmado
                                       idDispositivoMovil
                                       idInsumos
                                  )
                                  VALUES ( 
                                       :idEquipos, 
                                       :idImpresoras, 
                                       :idEquipoArmado, 
                                       :idDispositivoMovil, 
                                       :idInsumos, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idEquipos', $equipos->getidEquipos()); 
            $insert->bindValue('idImpresoras', $equipos->getidImpresoras()); 
            $insert->bindValue('idEquipoArmado', $equipos->getidEquipoArmado()); 
            $insert->bindValue('idDispositivoMovil', $equipos->getidDispositivoMovil()); 
            $insert->bindValue('idInsumos', $equipos->getidInsumos()); 
            $insert->execute(); 
        } 
 
        public static function actualizarEquipos($equipos) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    equipos  
                                    SET  
                                    idEquipos=:idEquipos, 
                                    idImpresoras=:idImpresoras, 
                                    idEquipoArmado=:idEquipoArmado, 
                                    idDispositivoMovil=:idDispositivoMovil, 
                                    idInsumos=:idInsumos, 
                                    WHERE  // Borrar la ultima coma
                                    idEquipos=:idEquipos'); 
         
            $update->bindValue('idEquipos', $equipos->getidEquipos()); 
            $update->bindValue('idImpresoras', $equipos->getidImpresoras()); 
            $update->bindValue('idEquipoArmado', $equipos->getidEquipoArmado()); 
            $update->bindValue('idDispositivoMovil', $equipos->getidDispositivoMovil()); 
            $update->bindValue('idInsumos', $equipos->getidInsumos()); 
            $update->execute(); 
        } 
 
        public static function searchByidEquipos($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    equipos  
                                    WHERE  
                                    idEquipos = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Equipos(   
                                        $select['idEquipos'],  
                                        $select['idImpresoras'],  
                                        $select['idEquipoArmado'],  
                                        $select['idDispositivoMovil'],  
                                        $select['idInsumos'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarEquipos($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    equipos  
                    WHERE  
                    idEquipos = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
