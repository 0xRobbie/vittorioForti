<?php 
    class EquipoArmado 
    { 
        private $idEquipoArmado; 
        private $idFuentePoder; 
        private $idRam; 
        private $idDiscosDuros; 
        private $idTeclados; 
        private $idMouses; 
        private $idMonitores; 
        private $idTarjetasMadre; 
        private $idSO; 
 
        public function __construct ( 
                                        $idEquipoArmado,  
                                        $idFuentePoder,  
                                        $idRam,  
                                        $idDiscosDuros,  
                                        $idTeclados,  
                                        $idMouses,  
                                        $idMonitores,  
                                        $idTarjetasMadre,  
                                        $idSO,  
                                    ) // Borrar la ultima coma
        { 
            $this->idEquipoArmado = $idEquipoArmado; 
            $this->idFuentePoder = $idFuentePoder; 
            $this->idRam = $idRam; 
            $this->idDiscosDuros = $idDiscosDuros; 
            $this->idTeclados = $idTeclados; 
            $this->idMouses = $idMouses; 
            $this->idMonitores = $idMonitores; 
            $this->idTarjetasMadre = $idTarjetasMadre; 
            $this->idSO = $idSO; 
        } 
 
        public function getidEquipoArmado() { return $this->idEquipoArmado;} 
        public function setidEquipoArmado($idEquipoArmado) {$this->idEquipoArmado;} 
        public function getidFuentePoder() { return $this->idFuentePoder;} 
        public function setidFuentePoder($idFuentePoder) {$this->idFuentePoder;} 
        public function getidRam() { return $this->idRam;} 
        public function setidRam($idRam) {$this->idRam;} 
        public function getidDiscosDuros() { return $this->idDiscosDuros;} 
        public function setidDiscosDuros($idDiscosDuros) {$this->idDiscosDuros;} 
        public function getidTeclados() { return $this->idTeclados;} 
        public function setidTeclados($idTeclados) {$this->idTeclados;} 
        public function getidMouses() { return $this->idMouses;} 
        public function setidMouses($idMouses) {$this->idMouses;} 
        public function getidMonitores() { return $this->idMonitores;} 
        public function setidMonitores($idMonitores) {$this->idMonitores;} 
        public function getidTarjetasMadre() { return $this->idTarjetasMadre;} 
        public function setidTarjetasMadre($idTarjetasMadre) {$this->idTarjetasMadre;} 
        public function getidSO() { return $this->idSO;} 
        public function setidSO($idSO) {$this->idSO;} 
 
        public static function verEquipoArmado() 
        { 
            $db = Db::getInstance(); 
            $equipoarmado = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    equipoarmado 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $equipoarmado[] = new EquipoArmado(  
                                                        $select['idEquipoArmado'],  
                                                        $select['idFuentePoder'],  
                                                        $select['idRam'],  
                                                        $select['idDiscosDuros'],  
                                                        $select['idTeclados'],  
                                                        $select['idMouses'],  
                                                        $select['idMonitores'],  
                                                        $select['idTarjetasMadre'],  
                                                        $select['idSO'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $equipoarmado; 
        } 
 
        public static function crearEquipoArmado($equipoarmado) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  equipoarmado (
                                       idEquipoArmado
                                       idFuentePoder
                                       idRam
                                       idDiscosDuros
                                       idTeclados
                                       idMouses
                                       idMonitores
                                       idTarjetasMadre
                                       idSO
                                  )
                                  VALUES ( 
                                       :idEquipoArmado, 
                                       :idFuentePoder, 
                                       :idRam, 
                                       :idDiscosDuros, 
                                       :idTeclados, 
                                       :idMouses, 
                                       :idMonitores, 
                                       :idTarjetasMadre, 
                                       :idSO, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idEquipoArmado', $equipoarmado->getidEquipoArmado()); 
            $insert->bindValue('idFuentePoder', $equipoarmado->getidFuentePoder()); 
            $insert->bindValue('idRam', $equipoarmado->getidRam()); 
            $insert->bindValue('idDiscosDuros', $equipoarmado->getidDiscosDuros()); 
            $insert->bindValue('idTeclados', $equipoarmado->getidTeclados()); 
            $insert->bindValue('idMouses', $equipoarmado->getidMouses()); 
            $insert->bindValue('idMonitores', $equipoarmado->getidMonitores()); 
            $insert->bindValue('idTarjetasMadre', $equipoarmado->getidTarjetasMadre()); 
            $insert->bindValue('idSO', $equipoarmado->getidSO()); 
            $insert->execute(); 
        } 
 
        public static function actualizarEquipoArmado($equipoarmado) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    equipoarmado  
                                    SET  
                                    idEquipoArmado=:idEquipoArmado, 
                                    idFuentePoder=:idFuentePoder, 
                                    idRam=:idRam, 
                                    idDiscosDuros=:idDiscosDuros, 
                                    idTeclados=:idTeclados, 
                                    idMouses=:idMouses, 
                                    idMonitores=:idMonitores, 
                                    idTarjetasMadre=:idTarjetasMadre, 
                                    idSO=:idSO, 
                                    WHERE  // Borrar la ultima coma
                                    idEquipoArmado=:idEquipoArmado'); 
         
            $update->bindValue('idEquipoArmado', $equipoarmado->getidEquipoArmado()); 
            $update->bindValue('idFuentePoder', $equipoarmado->getidFuentePoder()); 
            $update->bindValue('idRam', $equipoarmado->getidRam()); 
            $update->bindValue('idDiscosDuros', $equipoarmado->getidDiscosDuros()); 
            $update->bindValue('idTeclados', $equipoarmado->getidTeclados()); 
            $update->bindValue('idMouses', $equipoarmado->getidMouses()); 
            $update->bindValue('idMonitores', $equipoarmado->getidMonitores()); 
            $update->bindValue('idTarjetasMadre', $equipoarmado->getidTarjetasMadre()); 
            $update->bindValue('idSO', $equipoarmado->getidSO()); 
            $update->execute(); 
        } 
 
        public static function searchByidEquipoArmado($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    equipoarmado  
                                    WHERE  
                                    idEquipoArmado = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new EquipoArmado(   
                                        $select['idEquipoArmado'],  
                                        $select['idFuentePoder'],  
                                        $select['idRam'],  
                                        $select['idDiscosDuros'],  
                                        $select['idTeclados'],  
                                        $select['idMouses'],  
                                        $select['idMonitores'],  
                                        $select['idTarjetasMadre'],  
                                        $select['idSO'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarEquipoArmado($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    equipoarmado  
                    WHERE  
                    idEquipoArmado = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
