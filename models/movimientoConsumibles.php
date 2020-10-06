<?php
    class movimientoConsumibles
    {
        private $idmovimientoConsumibles;
        private $idUsuario;
        private $idPapeleria;
        private $piezas;
        private $ultimoMovimiento;
        private $idSolicitudes;
        private $idLugarTrabajo;
        private $preasignado;

        public function __construct($idmovimientoConsumibles, $idUsuario, $idPapeleria, $piezas, $idSolicitudes, $idLugarTrabajo, $preasignado)
        {
            $this->idmovimientoConsumibles = $idmovimientoConsumibles;
            $this->idUsuario = $idUsuario;
            $this->idPapeleria = $idPapeleria;
            $this->piezas = $piezas;
            $this->idSolicitudes = $idSolicitudes;
            $this->idLugarTrabajo = $idLugarTrabajo;
            $this->preasignado = $preasignado;
        }

        public function getIdmovimientoConsumibles() { return $this->idmovimientoConsumibles;}
        public function setIdmovimientoConsumibles($idmovimientoConsumibles) {$this->idmovimientoConsumibles;}
        public function getIdUsuario() { return $this->idUsuario;}
        public function setIdUsuario($idUsuario) {$this->idUsuario;}
        public function getIdPapeleria() { return $this->idPapeleria;}
        public function setIdPapeleria($idPapeleria) {$this->idPapeleria;}
        public function getPiezas() { return $this->piezas;}
        public function setPiezas($piezas) {$this->piezas;}
        public function getUltimoMovimiento() { return $this->ultimoMovimiento;}
        public function setUltimoMovimiento($ultimoMovimiento) {$this->ultimoMovimiento;}
        public function getIdSolicitudes() { return $this->idSolicitudes;}
        public function setIdSolicitudes($idSolicitudes) {$this->idSolicitudes;}
        public function getIdLugarTrabajo() { return $this->idLugarTrabajo;}
        public function setIdLugarTrabajo($idLugarTrabajo) {$this->idLugarTrabajo;}
        public function getPreasignado() { return $this->preasignado;}
        public function setPreasignado($preasignado) {$this->preasignado;}


        public static function vermovimientoConsumibles(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT  movimientoConsumibles.idMovimientoConsumibles,
                                        usuarios.usuarios,
                                        papeleria.producto,
                                        movimientoConsumibles.piezas,
                                        movimientoConsumibles.ultimoMovimiento,
                                        solicitudes.idSolicitudes,
                                        lugarTrabajo.idLugarTrabajo,
                                        movimientoConsumibles.preasignado
                                    FROM movimientoConsumibles
                                    LEFT JOIN usuarios ON usuarios.idUsuarios = movimientoConsumibles.idUsuarios
                                    LEFT JOIN papeleria ON papeleria.idPapeleria = movimientoConsumibles.idPapeleria
                                    LEFT JOIN solicitudes ON solicitudes.idSolicitudes = movimientoConsumibles.idSolicitudes
                                    LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = movimientoConsumibles.idLugarTrabajo
                                    ORDER BY idmovimientoConsumibles DESC LIMIT 30;");
            
            foreach($req->fetchAll() as $mov) {
                $movimientoConsumibles[] = $mov;
            }

            if (empty($movimientoConsumibles)) {
                $movimientoConsumibles = '0';
            }

            return $movimientoConsumibles;
        }
        
        public static function crearmovimientoConsumibles($movimientoConsumibles){
            $db = Db::getInstance();           
            $insert=$db->prepare('INSERT INTO movimientoConsumibles (idUsuarios, idPapeleria, piezas, idSolicitudes, idLugarTrabajo, preasignado) VALUES (:idUsuarios, :idPapeleria, :piezas, :idSolicitudes, :idLugarTrabajo, :preasginado)');
            $insert->bindValue('idUsuarios', $movimientoConsumibles->getIdUsuario());
            $insert->bindValue('idPapeleria', $movimientoConsumibles->getIdPapeleria());
            $insert->bindValue('piezas', $movimientoConsumibles->getPiezas());
            $insert->bindValue('idSolicitudes', $movimientoConsumibles->getIdSolicitudes());
            $insert->bindValue('idLugarTrabajo', $movimientoConsumibles->getIdLugarTrabajo());
            $insert->bindValue('preasginado', $movimientoConsumibles->getPreasignado());
            $insert->execute();
        }
        
        public static function crearmovimientoConsumiblesFolio($movimientoConsumibles){
            $db = Db::getInstance();           
            $insert=$db->prepare('INSERT INTO movimientoConsumibles (idUsuarios, idPapeleria, piezas, idSolicitudes, idLugarTrabajo, preasignado) VALUES (:idUsuarios, :idPapeleria, :piezas, :idSolicitudes, :idLugarTrabajo, :preasignado)');
            $insert->bindValue('idUsuarios', $movimientoConsumibles->getIdUsuario());
            $insert->bindValue('idPapeleria', $movimientoConsumibles->getidPapeleria());
            $insert->bindValue('piezas', $movimientoConsumibles->getPiezas());
            $insert->bindValue('idSolicitudes', $movimientoConsumibles->getIdSolicitudes());
            $insert->bindValue('idLugarTrabajo', $movimientoConsumibles->getidLugarTrabajo());
            $insert->bindValue('preasignado', $movimientoConsumibles->getPreasignado());
            $insert->execute();
            
            $last_id = $db->lastInsertId();
            return $last_id;
        }

        // public static function crearmovimientoConsumiblesRequerimiento($movimientoConsumibles){
        //     $db = Db::getInstance();

        //     if ($movimientoConsumibles->getidLugarTrabajo() != '') {
        //         $insert=$db->prepare('INSERT INTO movimientoConsumibles (idUsuarios, idPapeleria, piezas, idRastreo, idsolicitudes, idLugarTrabajo) VALUES (:idUsuarios, :idPapeleria, :piezas, :idRastreo, :idsolicitudes, :idLugarTrabajo)');
        //         $insert->bindValue('idLugarTrabajo', $movimientoConsumibles->getidLugarTrabajo());
        //     }

        //     if ($movimientoConsumibles->getIdDepartamentos() != '') {
        //         $insert=$db->prepare('INSERT INTO movimientoConsumibles (idUsuarios, idPapeleria, piezas, idRastreo, idsolicitudes, idDepartamentos) VALUES (:idUsuarios, :idPapeleria, :piezas, :idRastreo, :idsolicitudes, :idDepartamentos)');
        //         $insert->bindValue('idDepartamentos', $movimientoConsumibles->getIdDepartamentos());
        //     }
            
        //     $insert->bindValue('idsolicitudes', $movimientoConsumibles->getIdRequerimiento());
        //     $insert->bindValue('idUsuarios', $movimientoConsumibles->getIdUsuario());
        //     $insert->bindValue('idPapeleria', $movimientoConsumibles->getidPapeleria());
        //     $insert->bindValue('piezas', $movimientoConsumibles->getPiezas());
        //     $insert->bindValue('idRastreo', $movimientoConsumibles->getIdRastreo());
        //     $insert->execute();
        // }

        // public static function obtenerIdTransaccion($movimientoConsumibles){
        //     $db = Db::getInstance();
            
        //     $idUsuario = $movimientoConsumibles->getidUsuario();
        //     $idPapeleria = $movimientoConsumibles->getSucursal();
        //     $insumo = $movimientoConsumibles->getInsumos();
        //     $piezas = $movimientoConsumibles->getPiezas();   
            
        //     $req = $db->query(" SELECT idmovimientoConsumibles FROM movimientoConsumibles 
        //                         WHERE idUsuarios_ididUsuarios = $idUsuario,
        //                                 insumos_idinsumos = $idPapeleria,
        //                                 Sucursales_idLugarTrabajo = $insumo
        //                                 piezas = $piezas;");
        //     return $req;
        // }

        public static function verificarCantidad($lugarTrabajo, $piezas, $producto){
            $db = Db::getInstance();
            $origen = $_SESSION['user_lugar'];
            $req = $db->query(" SELECT  papeleria.idPapeleria, 
                                        sum(m.piezas) as suma, 
                                        rastreo.rastreo, 
                                        m.idLugarTrabajo
                                FROM movimientoConsumibles as m 
                                LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria 
                                LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes 
                                LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo 
                                WHERE (rastreo.idRastreo = 3 OR rastreo.idRastreo is null) 
                                        AND  m.idLugarTrabajo = $lugarTrabajo 
                                        AND papeleria.idPapeleria = $producto
                                GROUP BY papeleria.producto;");

            $valor = FALSE;
            $suma = $req->fetch();

            if ($suma['suma'] >= $piezas) {
                $valor = TRUE;
            }
            
            return $valor;
        }

        
        public static function searchByIdmovimientoConsumibles($id) {
            $db = Db::getInstance();
            $stmt = $db->prepare("SELECT ubicacionInsumo_idubicacion FROM movimientoConsumibles WHERE sucursales_idLugarTrabajo = $id");
            $stmt->execute();

            return $stmt;
        }

        // public static function actualizarUbicacion($idmovimientoConsumibles, $idRastreo){
        //     $db = Db::getInstance();
        //     $update = $db->prepare('UPDATE movimientoConsumibles SET ubicacionInsumo_idubicacion=:idRastreo WHERE idmovimientoConsumibles=:idmovimientoConsumibles');
        //     $update->bindValue('idmovimientoConsumibles', $idmovimientoConsumibles);
        //     $update->bindValue('idRastreo', $idRastreo);
        //     $update->execute();
        // }

        public static function seSolicitaronProductos($idmovimientoConsumibles){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT  papeleria.producto,
                                        movimientoConsumibles.piezas,
                                        solicitudes.idsolicitudes
                                    FROM movimientoConsumibles
                                    LEFT JOIN papeleria ON papeleria.idPapeleria = movimientoConsumibles.idPapeleria
                                    LEFT JOIN solicitudes ON solicitudes.idsolicitudes = movimientoConsumibles.idsolicitudes
                                    WHERE solicitudes.idsolicitudes = $idmovimientoConsumibles ");
            
            foreach($req->fetchAll() as $mov) {
                $movimientoConsumibles[] = $mov;
            }

            if ( empty($movimientoConsumibles) ) {
                $solicitud = TRUE;
            } else {
                $solicitud = FALSE;
            }

            return $solicitud;
        }

        // public static function verEstatus($idRequerimiento){
        //     $db = Db::getInstance();
        //     $movimientoConsumibles = [];          
        //     $req = $db->query(" SELECT  productos.producto,
        //                                 sum(movimientoConsumibles.piezas) AS piezas,
        //                                 rastreo.rastreo,
        //                                 solicitudes.idsolicitudes
        //                         FROM movimientoConsumibles
        //                         LEFT JOIN productos ON productos.idPapeleria = movimientoConsumibles.idPapeleria
        //                         LEFT JOIN rastreo ON rastreo.idRastreo = movimientoConsumibles.idRastreo
        //                         LEFT JOIN solicitudes ON solicitudes.idsolicitudes = movimientoConsumibles.idsolicitudes
        //                         WHERE movimientoConsumibles.idsolicitudes = $idRequerimiento
        //                         GROUP BY productos.producto, rastreo.rastreo
        //                         HAVING piezas > 0 ;");
            
        //     foreach($req->fetchAll() as $mov) {
        //         $movimientoConsumibles[] = $mov;
        //     }

        //     return $movimientoConsumibles;
        // }

        public static function verTotalSolicitudes(){
            $db = Db::getInstance();
            $solicitudes = [];
            
            $stmt = $db->prepare("  SELECT  solicitudes.idSolicitudes,
                                            usuarios.usuarios,
                                            usuarios.idLugarTrabajo, 
                                            tipoPapeleria.tipoPapeleria,
                                            solicitudes.observaciones,
                                            rastreo.idRastreo,
                                            rastreo.rastreo,
                                            solicitudes.ultimoMovimiento
                                    FROM solicitudes
                                    LEFT JOIN usuarios ON usuarios.idUsuarios = solicitudes.idUsuarios
                                    LEFT JOIN tipoPapeleria ON tipoPapeleria.idTipoPapeleria = solicitudes.idTipoPapeleria
                                    LEFT JOIN rastreo ON rastreo.idRastreo = solicitudes.idRastreo
                                    WHERE rastreo.idRastreo != 1 
                                    ORDER BY rastreo.rastreo DESC, solicitudes.idSolicitudes");

            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = $request;
            }

            return $solicitudes;
        }

        public static function atenderSolicitudes($id){
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("  SELECT m.idMovimientoConsumibles, u.usuarios, p.folio, p.idPapeleria, p.producto, m.piezas 
                                    FROM movimientoConsumibles as m
                                    LEFT JOIN usuarios as u ON u.idUsuarios = m.IdUsuarios
                                    LEFT JOIN papeleria as p ON p.idPapeleria = m.IdPapeleria
                                    LEFT JOIN solicitudes as s ON s.idSolicitudes = m.idSolicitudes
                                    WHERE s.idRastreo = 2 AND s.idSolicitudes = $id;");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = $request;
            }

            return $solicitudes;
        }


        public static function actualizarProceso($avance, $idsolicitudes){
            $db = Db::getInstance();
            $update = $db->prepare("UPDATE solicitudes SET proceso=:proceso WHERE idsolicitudes=:idsolicitudes");
            $update->bindValue('proceso', $avance);
            $update->bindValue('idsolicitudes', $idsolicitudes);
            $update->execute();
        }

        
    }
?>