<?php 
    class DispositivoMovil 
    { 
        private $idDispositivoMovil; 
        private $idDispositivo; 
        private $idSO; 
        private $memoria; 
        private $almacenamiento; 
        private $identificador; 
 
        public function __construct ( 
                                        $idDispositivoMovil,  
                                        $idDispositivo,  
                                        $idSO,  
                                        $memoria,  
                                        $almacenamiento,  
                                        $identificador,  
                                    ) // Borrar la ultima coma
        { 
            $this->idDispositivoMovil = $idDispositivoMovil; 
            $this->idDispositivo = $idDispositivo; 
            $this->idSO = $idSO; 
            $this->memoria = $memoria; 
            $this->almacenamiento = $almacenamiento; 
            $this->identificador = $identificador; 
        } 
 
        public function getidDispositivoMovil() { return $this->idDispositivoMovil;} 
        public function setidDispositivoMovil($idDispositivoMovil) {$this->idDispositivoMovil;} 
        public function getidDispositivo() { return $this->idDispositivo;} 
        public function setidDispositivo($idDispositivo) {$this->idDispositivo;} 
        public function getidSO() { return $this->idSO;} 
        public function setidSO($idSO) {$this->idSO;} 
        public function getmemoria() { return $this->memoria;} 
        public function setmemoria($memoria) {$this->memoria;} 
        public function getalmacenamiento() { return $this->almacenamiento;} 
        public function setalmacenamiento($almacenamiento) {$this->almacenamiento;} 
        public function getidentificador() { return $this->identificador;} 
        public function setidentificador($identificador) {$this->identificador;} 
 
        public static function verDispositivoMovil() 
        { 
            $db = Db::getInstance(); 
            $dispositivomovil = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    dispositivomovil 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $dispositivomovil[] = new DispositivoMovil(  
                                                        $select['idDispositivoMovil'],  
                                                        $select['idDispositivo'],  
                                                        $select['idSO'],  
                                                        $select['memoria'],  
                                                        $select['almacenamiento'],  
                                                        $select['identificador'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $dispositivomovil; 
        } 
 
        public static function crearDispositivoMovil($dispositivomovil) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  dispositivomovil (
                                       idDispositivoMovil
                                       idDispositivo
                                       idSO
                                       memoria
                                       almacenamiento
                                       identificador
                                  )
                                  VALUES ( 
                                       :idDispositivoMovil, 
                                       :idDispositivo, 
                                       :idSO, 
                                       :memoria, 
                                       :almacenamiento, 
                                       :identificador, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idDispositivoMovil', $dispositivomovil->getidDispositivoMovil()); 
            $insert->bindValue('idDispositivo', $dispositivomovil->getidDispositivo()); 
            $insert->bindValue('idSO', $dispositivomovil->getidSO()); 
            $insert->bindValue('memoria', $dispositivomovil->getmemoria()); 
            $insert->bindValue('almacenamiento', $dispositivomovil->getalmacenamiento()); 
            $insert->bindValue('identificador', $dispositivomovil->getidentificador()); 
            $insert->execute(); 
        } 
 
        public static function actualizarDispositivoMovil($dispositivomovil) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    dispositivomovil  
                                    SET  
                                    idDispositivoMovil=:idDispositivoMovil, 
                                    idDispositivo=:idDispositivo, 
                                    idSO=:idSO, 
                                    memoria=:memoria, 
                                    almacenamiento=:almacenamiento, 
                                    identificador=:identificador, 
                                    WHERE  // Borrar la ultima coma
                                    idDispositivoMovil=:idDispositivoMovil'); 
         
            $update->bindValue('idDispositivoMovil', $dispositivomovil->getidDispositivoMovil()); 
            $update->bindValue('idDispositivo', $dispositivomovil->getidDispositivo()); 
            $update->bindValue('idSO', $dispositivomovil->getidSO()); 
            $update->bindValue('memoria', $dispositivomovil->getmemoria()); 
            $update->bindValue('almacenamiento', $dispositivomovil->getalmacenamiento()); 
            $update->bindValue('identificador', $dispositivomovil->getidentificador()); 
            $update->execute(); 
        } 
 
        public static function searchByidDispositivoMovil($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    dispositivomovil  
                                    WHERE  
                                    idDispositivoMovil = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new DispositivoMovil(   
                                        $select['idDispositivoMovil'],  
                                        $select['idDispositivo'],  
                                        $select['idSO'],  
                                        $select['memoria'],  
                                        $select['almacenamiento'],  
                                        $select['identificador'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarDispositivoMovil($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    dispositivomovil  
                    WHERE  
                    idDispositivoMovil = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
