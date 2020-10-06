<?php
    class Sucursales
    {
        private $idSucursales;
        private $sucursal;
        private $direccion;
        private $region;
        private $colonia;
        private $municipio;
        private $estado;
        private $telefono;
        private $correo;
        private $cp;

        public function __construct($idSucursales, $sucursal, $direccion, $region, $colonia, $municipio, $estado, $telefono, $correo, $cp)
        {
            $this->idSucursales = $idSucursales;
            $this->sucursal = $sucursal;
            $this->direccion = $direccion;
            $this->region = $region;
            $this->colonia = $colonia;
            $this->municipio = $municipio;
            $this->estado = $estado;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->cp = $cp;
        }

        public function getIdSucursales() { return $this->idSucursales;}
        public function setIdSucursales($idSucursales) {$this->idSucursales;}
        public function getSucursal() { return $this->sucursal;}
        public function setSucursal($sucursal) {$this->sucursal;}
        public function getdireccion() { return $this->direccion;}
        public function setdireccion($direccion) {$this->direccion;}
        public function getRegion() { return $this->region;}
        public function setRegion($region) {$this->region;}
        public function getColonia() { return $this->colonia;}
        public function setColonia($colonia) {$this->colonia;}
        public function getMunicipio() { return $this->municipio;}
        public function setMunicipio($municipio) {$this->municipio;}
        public function getEstado() { return $this->estado;}
        public function setEstado($estado) {$this->estado;}
        public function getTelefono() { return $this->telefono;}
        public function setTelefono($telefono) {$this->telefono;}
        public function getCorreo() { return $this->correo;}
        public function setCorreo($correo) {$this->correo;}
        public function getCP() { return $this->cp;}
        public function setCP($cp) {$this->cp;}

        public static function verSucursales(){
            $db = Db::getInstance();          
            $req = $db->query("SELECT idSucursales, sucursal, region, telefono, correo FROM sucursales ORDER BY sucursal;");

            foreach($req->fetchAll() as $sucursal) {
                $Sucursales[] = $sucursal;
            }

            return $Sucursales;
        }
        
        public static function verInventarioSistemas(){
            $db = Db::getInstance();

            $req = $db->query(" SELECT  m.idMovimientoConsumibles, 
                                        papeleria.idPapeleria, 
                                        papeleria.producto, 
                                        sum(m.piezas) as piezas, 
                                        rastreo.rastreo, 
                                        m.idLugarTrabajo
                                FROM movimientoConsumibles as m 
                                LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                WHERE (rastreo.idRastreo = 3 OR rastreo.idRastreo = 2 OR rastreo.idRastreo is null) AND  m.idLugarTrabajo = 1
                                GROUP BY papeleria.producto;");

            foreach($req->fetchAll() as $productos) {
                $inventario[] = $productos;
            }

            if (empty($inventario)) {
                $inventario = '0';
            }

            return $inventario;
        }

        public static function verInventarioSucursal($lugarTrabajo){
            $db = Db::getInstance();

            $req = $db->query(" SELECT  m.idMovimientoConsumibles, 
                                        papeleria.idPapeleria, 
                                        papeleria.producto, 
                                        papeleria.idTipoPapeleria,
                                        formato.formato,
                                        sum(m.piezas) as piezas, 
                                        rastreo.rastreo, 
                                        m.idLugarTrabajo
                                FROM movimientoConsumibles as m 
                                LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                LEFT JOIN formato ON formato.idFormato = papeleria.idFormato
                                WHERE (rastreo.idRastreo = 4 OR rastreo.idRastreo is null) AND  m.idLugarTrabajo = $lugarTrabajo
                                GROUP BY papeleria.producto;");

            foreach($req->fetchAll() as $productos) {
                $inventario[] = $productos;
            }

            if (empty($inventario)) {
                $inventario = '0';
            }

            return $inventario;
        }

        public static function verInventarioSucursales(){
            $db = Db::getInstance();
            $req = $db->query(" SELECT  m.idMovimientoConsumibles, 
                                        papeleria.idPapeleria, 
                                        papeleria.producto, 
                                        sum(m.piezas) as piezas, 
                                        rastreo.rastreo, 
                                        m.idLugarTrabajo,
                                        sucursales.sucursal,
                                        departamentos.departamento
                                FROM movimientoConsumibles as m 
                                LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = m.idLugarTrabajo 
                                LEFT JOIN sucursales ON sucursales.idSucursales = lugarTrabajo.idSucursales 
                                LEFT JOIN departamentos ON departamentos.idDepartamentos = lugarTrabajo.idDepartamentos 
                                WHERE (rastreo.idRastreo = 3 OR rastreo.idRastreo is null) AND m.idLugarTrabajo != 1
                                GROUP BY m.idLugarTrabajo, papeleria.producto
                                ORDER BY sucursales.sucursal, papeleria.producto;");
            
            foreach($req->fetchAll() as $sucursal) {
                $inventario[] = $sucursal;
            }

            if (empty($inventario)) {
                $inventario = '0';
            }

            return $inventario;
        }

        public static function actualizarSucursales($sucursal){
            $db = Db::getInstance();
            $update = $db->prepare('UPDATE sucursales 
                                    SET sucursal=:sucursal,
                                        direccion=:direccion,
                                        region=:region,
                                        colonia=:colonia,
                                        municipio=:municipio,
                                        estado=:estado,
                                        telefono=:telefono,
                                        correo=:correo,
                                        cp=:cp WHERE idSucursales=:idSucursales');
            $update->bindValue('idSucursales', $sucursal->getIdSucursales());
            $update->bindValue('sucursal', $sucursal->getSucursal());
            $update->bindValue('direccion', $sucursal->getdireccion());
            $update->bindValue('region', $sucursal->getRegion());
            $update->bindValue('colonia', $sucursal->getColonia());
            $update->bindValue('municipio', $sucursal->getMunicipio());
            $update->bindValue('estado', $sucursal->getEstado());
            $update->bindValue('telefono', $sucursal->getTelefono());
            $update->bindValue('correo', $sucursal->getCorreo());
            $update->bindValue('cp', $sucursal->getCP());
            $update->execute();
          }

          public static function searchByIdSucursal($id) {
            $db = Db::getInstance();

            $stmt = $db->prepare("SELECT * FROM sucursales WHERE idSucursales = $id");
            $stmt->execute();
            $sucursal = $stmt->fetch();

            return new Sucursales($sucursal['idSucursales'], $sucursal['sucursal'], $sucursal['direccion'], $sucursal['region'], $sucursal['colonia'], $sucursal['municipio'], $sucursal['estado'], $sucursal['telefono'], $sucursal['correo'], $sucursal['cp']);
          }

        public static function crearSucursales($sucursal){
            $db = Db::getInstance();
            $insert=$db->prepare('INSERT INTO sucursales (idSucursales, sucursal, direccion, region, colonia, municipio, estado, telefono, correo, cp) VALUES (:idSucursales, :sucursal, :direccion, :region, :colonia, :municipio, :estado, :telefono, :correo, :cp)');
            $insert->bindValue('idSucursales', $sucursal->getIdSucursales());
            $insert->bindValue('sucursal', $sucursal->getSucursal());
            $insert->bindValue('direccion', $sucursal->getdireccion());
            $insert->bindValue('region', $sucursal->getRegion());
            $insert->bindValue('colonia', $sucursal->getColonia());
            $insert->bindValue('municipio', $sucursal->getMunicipio());
            $insert->bindValue('estado', $sucursal->getEstado());
            $insert->bindValue('telefono', $sucursal->getTelefono());
            $insert->bindValue('correo', $sucursal->getCorreo());
            $insert->bindValue('cp', $sucursal->getCP());
            $insert->execute();

            $last_id = $db->lastInsertId();
            return $last_id;
        }

        public static function verInventarioSucursalId($id){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT movimientos.idMovimientos, sucursal.sucursal, productos.producto, sum(movimientos.piezas), direccion.direccion
                                FROM movimientos
                                LEFT JOIN productos ON productos.idproductos = movimientos.producto_idproducto
                                LEFT JOIN sucursal ON sucursal.idSucursales = movimientos.sucursales_idSucursales
                                LEFT JOIN direccion ON direccion.iddireccion = movimientos.direccion_idubicacion
                                WHERE movimientos.idMovimientos = $id
                                GROUP BY sucursal.sucursal, productos.producto
                                ORDER BY sum(movimientos.piezas);");

            foreach($req->fetchAll() as $sucursal) {
                $inventario[] = $sucursal;
            }

            return $inventario;
        }

        public static function minmax(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT  papeleria.idPapeleria, 
                                        papeleria.producto,
                                        papeleria.minimoSucursal as mini,
                                        papeleria.maximoSucursal as maxi,
                                        sum(m.piezas) as piezaSum,  
                                        m.idLugarTrabajo,
                                        sucursales.sucursal,
                                        departamentos.departamento
                                    FROM movimientoConsumibles as m 
                                    LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                    LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                    LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                    LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = m.idLugarTrabajo 
                                    LEFT JOIN sucursales ON sucursales.idSucursales = lugarTrabajo.idSucursales 
                                    LEFT JOIN departamentos ON departamentos.idDepartamentos = lugarTrabajo.idDepartamentos 
                                    WHERE (rastreo.idRastreo = 3 OR rastreo.idRastreo IS NULL) AND m.idLugarTrabajo != 1
                                    GROUP BY m.idLugarTrabajo, papeleria.producto
                                    HAVING(piezaSum <= mini OR piezaSum >= maxi)
                                    ORDER BY sucursales.sucursal, papeleria.producto;");

            foreach($req->fetchAll() as $inventario) {
                $minmax[] = $inventario;
            }

            if (empty($minmax)) {
                $minmax = '0';
            }

            return $minmax;
        }

        public static function stock(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT  papeleria.idPapeleria, 
                                        papeleria.producto,
                                        papeleria.stockMinimo,
                                        sum(m.piezas) as piezaSum,  
                                        m.idLugarTrabajo,
                                        sucursales.sucursal,
                                        departamentos.departamento
                                    FROM movimientoConsumibles as m 
                                    LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                    LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                    LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                    LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = m.idLugarTrabajo 
                                    LEFT JOIN sucursales ON sucursales.idSucursales = lugarTrabajo.idSucursales 
                                    LEFT JOIN departamentos ON departamentos.idDepartamentos = lugarTrabajo.idDepartamentos 
                                    WHERE (rastreo.idRastreo = 3 OR rastreo.idRastreo IS NULL) AND m.idLugarTrabajo = 1
                                    GROUP BY m.idLugarTrabajo, papeleria.producto
                                    HAVING piezaSum <= stockMinimo
                                    ORDER BY sucursales.sucursal, papeleria.producto;");

            foreach($req->fetchAll() as $inventario) {
                $stock[] = $inventario;
            }

            if (empty($stock)) {
                $stock = '0';
            }

            return $stock;
        }

        public static function minmaxSucursal(){
            $db = Db::getInstance();
            $idLugar = $_SESSION['user_lugar'];          
            $req = $db->query(" SELECT  papeleria.idPapeleria, 
                                        papeleria.producto,
                                        papeleria.minimoSucursal as mini,
                                        papeleria.maximoSucursal as maxi,
                                        sum(m.piezas) as piezaSum,  
                                        m.idLugarTrabajo,
                                        sucursales.sucursal,
                                        departamentos.departamento
                                    FROM movimientoConsumibles as m 
                                    LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                    LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                    LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                    LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = m.idLugarTrabajo 
                                    LEFT JOIN sucursales ON sucursales.idSucursales = lugarTrabajo.idSucursales 
                                    LEFT JOIN departamentos ON departamentos.idDepartamentos = lugarTrabajo.idDepartamentos 
                                    WHERE (rastreo.idRastreo = 3 OR rastreo.idRastreo IS NULL) AND m.idLugarTrabajo = $idLugar
                                    GROUP BY m.idLugarTrabajo, papeleria.producto
                                    HAVING(piezaSum <= mini OR piezaSum >= maxi)
                                    ORDER BY sucursales.sucursal, papeleria.producto;");

            foreach($req->fetchAll() as $inventario) {
                $minmax[] = $inventario;
            }

            if (empty($minmax)) {
                $minmax = '0';
            }

            return $minmax;
        }

        public static function borrarSucursales($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM sucursales WHERE idSucursales = $id"); 
            $db->exec($sql); 
        } 
        
    }
?>