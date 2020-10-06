<?php 
    class Teclados 
    { 
        private $idTeclados; 
        private $teclado; 
        private $inalambrico; 
 
        public function __construct ( 
                                        $idTeclados,  
                                        $teclado,  
                                        $inalambrico,  
                                    ) // Borrar la ultima coma
        { 
            $this->idTeclados = $idTeclados; 
            $this->teclado = $teclado; 
            $this->inalambrico = $inalambrico; 
        } 
 
        public function getidTeclados() { return $this->idTeclados;} 
        public function setidTeclados($idTeclados) {$this->idTeclados;} 
        public function getteclado() { return $this->teclado;} 
        public function setteclado($teclado) {$this->teclado;} 
        public function getinalambrico() { return $this->inalambrico;} 
        public function setinalambrico($inalambrico) {$this->inalambrico;} 
 
        public static function verTeclados() 
        { 
            $db = Db::getInstance(); 
            $teclados = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    teclados 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $teclados[] = new Teclados(  
                                                        $select['idTeclados'],  
                                                        $select['teclado'],  
                                                        $select['inalambrico'],  
                                                    ); // Borrar la ultima coma
            } 
 
            return $teclados; 
        } 
 
        public static function crearTeclados($teclados) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  teclados (
                                       idTeclados
                                       teclado
                                       inalambrico
                                  )
                                  VALUES ( 
                                       :idTeclados, 
                                       :teclado, 
                                       :inalambrico, 
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idTeclados', $teclados->getidTeclados()); 
            $insert->bindValue('teclado', $teclados->getteclado()); 
            $insert->bindValue('inalambrico', $teclados->getinalambrico()); 
            $insert->execute(); 
        } 
 
        public static function actualizarTeclados($teclados) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    teclados  
                                    SET  
                                    idTeclados=:idTeclados, 
                                    teclado=:teclado, 
                                    inalambrico=:inalambrico, 
                                    WHERE  // Borrar la ultima coma
                                    idTeclados=:idTeclados'); 
         
            $update->bindValue('idTeclados', $teclados->getidTeclados()); 
            $update->bindValue('teclado', $teclados->getteclado()); 
            $update->bindValue('inalambrico', $teclados->getinalambrico()); 
            $update->execute(); 
        } 
 
        public static function searchByidTeclados($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("  SELECT  
                                    *  
                                    FROM  
                                    teclados  
                                    WHERE  
                                    idTeclados = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Teclados(   
                                        $select['idTeclados'],  
                                        $select['teclado'],  
                                        $select['inalambrico'],  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarTeclados($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    teclados  
                    WHERE  
                    idTeclados = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
