<?php 
    class LugarTrabajo 
    { 
        private $idLugarTrabajo; 
        private $idDepartamentos; 
        private $idSucursales; 
 
        public function __construct ( $idLugarTrabajo,  $idDepartamentos,  $idSucursales) // Borrar la ultima coma
        { 
            $this->idLugarTrabajo = $idLugarTrabajo; 
            $this->idDepartamentos = $idDepartamentos; 
            $this->idSucursales = $idSucursales; 
        } 
 
        public function getidLugarTrabajo() { return $this->idLugarTrabajo;} 
        public function setidLugarTrabajo($idLugarTrabajo) {$this->idLugarTrabajo;} 
        public function getidDepartamentos() { return $this->idDepartamentos;} 
        public function setidDepartamentos($idDepartamentos) {$this->idDepartamentos;} 
        public function getidSucursales() { return $this->idSucursales;} 
        public function setidSucursales($idSucursales) {$this->idSucursales;} 
 
        public static function verLugarTrabajo() 
        { 
            $db = Db::getInstance(); 
            $lugarTrabajo = [];          
            $stmt = $db->prepare('  SELECT  lugarTrabajo.idLugarTrabajo, 
                                            sucursales.sucursal, 
                                            departamentos.departamento 
                                    FROM lugarTrabajo
                                    LEFT JOIN sucursales ON sucursales.idSucursales = lugarTrabajo.idSucursales 
                                    LEFT JOIN departamentos ON departamentos.idDepartamentos = lugarTrabajo.idDepartamentos'); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $lugarTrabajo[] = new LugarTrabajo( $select['idLugarTrabajo'], $select['sucursal'], $select['departamento']  );
            } 
 
            return $lugarTrabajo; 
        } 
 
        public static function crearLugarTrabajo($lugarTrabajo) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO lugarTrabajo (idDepartamentos, idSucursales)
                                  VALUES (:idDepartamentos, :idSucursales)');
            $insert->bindValue('idDepartamentos', $lugarTrabajo->getidDepartamentos()); 
            $insert->bindValue('idSucursales', $lugarTrabajo->getidSucursales()); 
            $insert->execute(); 
        } 
 
        public static function actualizarLugarTrabajo($lugarTrabajo) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    lugarTrabajo  
                                    SET  
                                    idLugarTrabajo=:idLugarTrabajo, 
                                    idDepartamentos=:idDepartamentos, 
                                    idSucursales=:idSucursales 
                                    WHERE
                                    idLugarTrabajo=:idLugarTrabajo'); 
         
            $update->bindValue('idLugarTrabajo', $lugarTrabajo->getidLugarTrabajo()); 
            $update->bindValue('idDepartamentos', $lugarTrabajo->getidDepartamentos()); 
            $update->bindValue('idSucursales', $lugarTrabajo->getidSucursales()); 
            $update->execute(); 
        } 
 
        public static function searchByidLugarTrabajo($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare('  SELECT  
                                    *  
                                    FROM  
                                    lugarTrabajo  
                                    WHERE  
                                    idLugarTrabajo = $id'); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new LugarTrabajo(  $select['idLugarTrabajo'], $select['idDepartamentos'], $select['idSucursales'] );
        } 
 
        // public static function borrarLugarTrabajo($id)  
        // { 
        //     $db = Db::getInstance(); 
        //     $sql = ('DELETE FROM lugarTrabajo WHERE idLugarTrabajo = $id'); 
        //     $db->exec($sql); 
        // } 

        public static function borrarSucursal($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM lugarTrabajo WHERE idSucursales = $id"); 
            $db->exec($sql); 
        } 

        public static function borrarDepartamento($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM lugarTrabajo WHERE idDepartamentos = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
