<?php 
    class Insumos 
    { 
        private $idInsumos; 
        private $insumo; 
        private $modelo; 
        private $piezas; 
 
        public function __construct ( 
                                        $idInsumos,  
                                        $insumo,  
                                        $modelo,  
                                        $piezas  
                                    ) // Borrar la ultima coma
        { 
            $this->idInsumos = $idInsumos; 
            $this->insumo = $insumo; 
            $this->modelo = $modelo; 
            $this->piezas = $piezas; 
        } 
 
        public function getidInsumos() { return $this->idInsumos;} 
        public function setidInsumos($idInsumos) {$this->idInsumos;} 
        public function getinsumo() { return $this->insumo;} 
        public function setinsumo($insumo) {$this->insumo;} 
        public function getmodelo() { return $this->modelo;} 
        public function setmodelo($modelo) {$this->modelo;} 
        public function getpiezas() { return $this->piezas;} 
        public function setpiezas($piezas) {$this->piezas;} 
 
        public static function verInsumos() 
        { 
            $db = Db::getInstance(); 
            $insumos = [];          
            $stmt = $db->prepare('  SELECT     
                                    * 
                                    FROM  
                                    insumos 
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $insumos[] = new Insumos(  
                                                        $select['idInsumos'],  
                                                        $select['insumo'],  
                                                        $select['modelo'],  
                                                        $select['piezas'] 
                                                    ); // Borrar la ultima coma
            } 
 
            return $insumos; 
        } 
 
        public static function crearInsumos($insumos) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  insumos (
                                       idInsumos
                                       insumo
                                       modelo
                                       piezas
                                  )
                                  VALUES ( 
                                       :idInsumos, 
                                       :insumo, 
                                       :modelo, 
                                       :piezas
                                       ');  // Borrar la ultima coma
            $insert->bindValue('idInsumos', $insumos->getidInsumos()); 
            $insert->bindValue('insumo', $insumos->getinsumo()); 
            $insert->bindValue('modelo', $insumos->getmodelo()); 
            $insert->bindValue('piezas', $insumos->getpiezas()); 
            $insert->execute(); 
        } 
 
        public static function actualizarInsumos($insumos) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    insumos  
                                    SET  
                                    idInsumos=:idInsumos, 
                                    insumo=:insumo, 
                                    modelo=:modelo, 
                                    piezas=:piezas 
                                    WHERE
                                    idInsumos=:idInsumos'); 
         
            $update->bindValue('idInsumos', $insumos->getidInsumos()); 
            $update->bindValue('insumo', $insumos->getinsumo()); 
            $update->bindValue('modelo', $insumos->getmodelo()); 
            $update->bindValue('piezas', $insumos->getpiezas()); 
            $update->execute(); 
        } 
 
        public static function searchByidInsumos($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare('  SELECT  
                                    *  
                                    FROM  
                                    insumos  
                                    WHERE  
                                    idInsumos = $id'); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Insumos(   
                                        $select['idInsumos'],  
                                        $select['insumo'],  
                                        $select['modelo'],  
                                        $select['piezas']  
                                    ); // Borrar la ultima coma
        } 
 
        public static function borrarInsumos($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM  
                    insumos  
                    WHERE  
                    idInsumos = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
