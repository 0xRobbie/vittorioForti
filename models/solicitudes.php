<?php
    class Solicitudes
    {
        private $idSolicitudes;
        private $idUsuarios;
        private $idTipoPapeleria;
        private $observaciones;
        private $rastreo;
        private $ultimoMovimiento;

        public function __construct($idSolicitudes, $idUsuarios, $idTipoPapeleria, $observaciones, $rastreo, $ultimoMovimiento)
        {
            $this->idSolicitudes = $idSolicitudes;
            $this->idUsuarios = $idUsuarios;
            $this->idTipoPapeleria = $idTipoPapeleria;
            $this->observaciones = $observaciones;
            $this->rastreo = $rastreo;
            $this->ultimoMovimiento = $ultimoMovimiento;
        }

        public function getIdSolicitudes() { return $this->idSolicitudes;}
        public function setIdSolicitudes($idSolicitudes) {$this->idSolicitudes;}
        public function getIdUsuarios() { return $this->idUsuarios;}
        public function setIdUsuarios($idUsuarios) {$this->idUsuarios;}
        public function getIdTipoPapeleria() { return $this->idTipoPapeleria;}
        public function setIdTipoPapeleria($idTipoPapeleria) {$this->idTipoPapeleria;}
        public function getObservaciones() { return $this->observaciones;}
        public function setObservaciones($observaciones) {$this->observaciones;}
        public function getIdRastreo() { return $this->rastreo;}
        public function setIdRastreo($rastreo) {$this->rastreo;}
        public function getUltimoMovimiento() { return $this->ultimoMovimiento;}
        public function setUltimoMovimiento($ultimoMovimiento) {$this->ultimoMovimiento;}

        public static function verSolicitudes($id){
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("SELECT    solicitudes.idSolicitudes, 
                                            usuarios.usuarios, 
                                            solicitudes.idTipoPapeleria, 
                                            solicitudes.observaciones,
                                            solicitudes.idRastreo,
                                            solicitudes.ultimoMovimiento
                                FROM solicitudes
                                LEFT JOIN usuarios ON usuarios.idusuarios = solicitudes.idUsuarios
                                WHERE usuarios.idUsuarios = $id and solicitudes.idRastreo = 1
                                ORDER BY solicitudes.idRastreo");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = new Solicitudes($request['idSolicitudes'], $request['usuarios'], $request['idTipoPapeleria'], $request['observaciones'], $request['idRastreo'], $request['ultimoMovimiento']);
            }

            return $solicitudes;
        }

        public static function verSolicitudesTramite($id){
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("SELECT    solicitudes.idSolicitudes, 
                                            usuarios.usuarios, 
                                            solicitudes.idTipoPapeleria, 
                                            solicitudes.observaciones,
                                            solicitudes.idRastreo,
                                            solicitudes.ultimoMovimiento
                                FROM solicitudes
                                LEFT JOIN usuarios ON usuarios.idusuarios = solicitudes.idUsuarios
                                WHERE usuarios.idUsuarios = $id and solicitudes.idRastreo = 2
                                ORDER BY solicitudes.idRastreo");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = new Solicitudes($request['idSolicitudes'], $request['usuarios'], $request['idTipoPapeleria'], $request['observaciones'], $request['idRastreo'], $request['ultimoMovimiento']);
            }

            return $solicitudes;
        }

        public static function verSolicitudesEnviadas($id){
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("SELECT    solicitudes.idSolicitudes, 
                                            usuarios.usuarios, 
                                            solicitudes.idTipoPapeleria, 
                                            solicitudes.observaciones,
                                            solicitudes.idRastreo,
                                            solicitudes.ultimoMovimiento
                                FROM solicitudes
                                LEFT JOIN usuarios ON usuarios.idusuarios = solicitudes.idUsuarios
                                WHERE usuarios.idUsuarios = $id and solicitudes.idRastreo = 3
                                ORDER BY solicitudes.idRastreo");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = new Solicitudes($request['idSolicitudes'], $request['usuarios'], $request['idTipoPapeleria'], $request['observaciones'], $request['idRastreo'], $request['ultimoMovimiento']);
            }

            return $solicitudes;
        }

        public static function verSolicitudesResueltas(){
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("SELECT    solicitudes.idSolicitudes, 
                                            usuarios.usuarios, 
                                            solicitudes.idTipoPapeleria, 
                                            solicitudes.observaciones,
                                            solicitudes.idRastreo,
                                            solicitudes.ultimoMovimiento
                                FROM solicitudes
                                LEFT JOIN usuarios ON usuarios.idusuarios = solicitudes.idUsuarios
                                WHERE solicitudes.idRastreo = 4
                                ORDER BY solicitudes.idRastreo");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = new Solicitudes($request['idSolicitudes'], $request['usuarios'], $request['idTipoPapeleria'], $request['observaciones'], $request['idRastreo'], $request['ultimoMovimiento']);
            }

            return $solicitudes;
        }

        public static function verSolicitudesNoAtendidas(){
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("  SELECT p.producto, f.formato, sum(m.piezas) AS piezasSolicitadas, inventario.inventario
                                    FROM movimientoConsumibles AS m 
                                    LEFT JOIN papeleria AS p ON p.idPapeleria = m.idPapeleria
                                    LEFT JOIN solicitudes AS s ON s.idSolicitudes = m.idSolicitudes
                                    LEFT JOIN rastreo AS r ON r.idRastreo = s.idRastreo
                                    LEFT JOIN formato AS f ON f.idFormato = p.idFormato
                                    LEFT JOIN (	SELECT  p.producto, sum(m.piezas) AS inventario
                                                FROM movimientoConsumibles AS m
                                                LEFT JOIN solicitudes AS s ON s.idSolicitudes = m.idSolicitudes
                                                LEFT JOIN rastreo AS r ON r.idRastreo = s.idRastreo
                                                LEFT JOIN papeleria AS p ON p.idPapeleria = m.idPapeleria
                                                LEFT JOIN lugarTrabajo AS l ON l.idLugarTrabajo = m.idLugarTrabajo
                                                WHERE l.idLugarTrabajo = 1 AND (s.idRastreo = 3 OR s.idRastreo is null)
                                                GROUP BY p.producto) AS inventario ON p.producto = inventario.producto
                                    WHERE r.idRastreo = 1
                                    GROUP BY p.producto;");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $solicitudes[] = $request;
            }

            return $solicitudes;
        }

        public static function crearSolicitudes($idUsuario, $idTipoPapeleria, $observaciones, $idRastreo){
            $db = Db::getInstance();
            $insert=$db->prepare('INSERT INTO solicitudes (idUsuarios, idTipoPapeleria, observaciones, idRastreo) VALUES (:idUsuarios, :idTipoPapeleria, :observaciones, :idRastreo)');
            $insert->bindValue('idUsuarios', $idUsuario);
            $insert->bindValue('idTipoPapeleria', $idTipoPapeleria);
            $insert->bindValue('observaciones', $observaciones);
            $insert->bindValue('idRastreo', $idRastreo);
            $insert->execute();
        }

        public static function actualizarSolicitudes($idSolicitud, $idRastreo){
            $db = Db::getInstance();
            $update = $db->prepare('UPDATE solicitudes 
                                    SET idRastreo=:idRastreo
                                    WHERE idSolicitudes=:idSolicitudes');
            $update->bindValue('idSolicitudes', $idSolicitud);
            $update->bindValue('idRastreo', $idRastreo);
            $update->execute();
        }

        public static function borrarSolicitudes($idSolicitudes){
            $db = Db::getInstance();
            $sql = "DELETE FROM Solicitudes WHERE idSolicitudes = $idSolicitudes";
            $db->exec($sql);
        }

        public static function verSolicitudProductos($idSolicitud, $rastreo, $lugar) {
            $db = Db::getInstance();
            $solicitudes = [];         
            $stmt = $db->prepare("SELECT    m.idMovimientoConsumibles, 
                                            usuarios.usuarios, 
                                            papeleria.producto,
                                            m.idSolicitudes,
                                            sum(m.piezas) as piezas 
                                FROM movimientoConsumibles as m
                                LEFT JOIN usuarios ON usuarios.idusuarios = m.idUsuarios
                                LEFT JOIN papeleria ON papeleria.idPapeleria = m.idPapeleria
                                LEFT JOIN solicitudes ON solicitudes.idSolicitudes = m.idSolicitudes
                                WHERE m.idSolicitudes = $idSolicitud AND solicitudes.idRastreo = $rastreo AND m.idLugarTrabajo = $lugar
                                GROUP BY papeleria.producto
                                ORDER BY solicitudes.idRastreo");
            $stmt->execute();
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $request) {
                $productos[] = $request;
            }

            return $productos;
        }

    }
?>