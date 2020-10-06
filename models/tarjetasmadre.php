<?php 
    class TarjetasMadre 
    { 
        private $idTarjetasMadre; 
        private $tarjeta; 
        private $procesador; 
 
        public function __construct ( 
                                        $idTarjetasMadre,  
                                        $tarjeta,  
                                        $procesador,  
                                    ) // Borrar la ultima coma
        { 
            $this->idTarjetasMadre = $idTarjetasMadre; 
            $this->tarjeta = $tarjeta; 
            $this->procesador = $procesador; 
        } 
 
        public function getidTarjetasMadre() { return $this->idTarjetasMadre;} 
        public function setidTarjetasMadre($idTarjetasMadre) {$this->idTarjetasMadre;} 
        public function gettarjeta() { return $this->tarjeta;} 
        public function settarjeta($tarjeta) {$this->tarjeta;} 
        public function getprocesador() { return $this->procesador;} 
        public function setprocesador($procesador) {$this->procesador;} 
 
        public static function verTarjetasMadre() 
        { 
            $db = Db::getInstance(); 
            $tarjetasmadre = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    tarjetasmadre 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $tarjetasmadre[] = new TarjetasMadre(  
                                                        $select['idTarjetasMadre'],  
                                                        $select['tarjeta'],  
                                                        $select['procesador'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $tarjetasmadre; 
        } 
 
        public static function crearTarjetasMadre($tarjetasmadre) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  tarjetasmadre (
                                       idTarjetasMadre
                                       tarjeta
                                       procesador
                                  )
                                  VALUES ( 
                                       :idTarjetasMadre, 
                                       :tarjeta, 
                                       :procesador, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idTarjetasMadre', $tarjetasmadre->getidTarjetasMadre()); 
            $insert->bindValue('tarjeta', $tarjetasmadre->gettarjeta()); 
            $insert->bindValue('procesador', $tarjetasmadre->getprocesador()); 
            $insert->execute(); 
        } 
 
        public static function actualizarTarjetasMadre($tarjetasmadre) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    tarjetasmadre  
                                    SET  
                                    idTarjetasMadre=:idTarjetasMadre, 
                                    tarjeta=:tarjeta, 
                                    procesador=:procesador, 
                                    WHERE  // Borrar la ultima coma
                                    idTarjetasMadre=:idTarjetasMadre'); 
         
            $update->bindValue('idTarjetasMadre', $tarjetasmadre->getidTarjetasMadre()); 
            $update->bindValue('tarjeta', $tarjetasmadre->gettarjeta()); 
            $update->bindValue('procesador', $tarjetasmadre->getprocesador()); 
            $update->execute(); 
        } 
 
        public static function searchByidTarjetasMadre($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    tarjetasmadre  
                                    WHERE  
                                    idTarjetasMadre = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new TarjetasMadre(   
                                        $select['idTarjetasMadre'],  
                                        $select['tarjeta'],  
                                        $select['procesador'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarTarjetasMadre($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    tarjetasmadre  
                    WHERE  
                    idTarjetasMadre = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
