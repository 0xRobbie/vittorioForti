<?php
    class Acceso
    {
        public static function verDatos(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT DISTINCT 'Sucursales', count(solicitudes.idUsuarios) FROM solicitudes 
                                LEFT JOIN usuarios ON usuarios.idUsuarios = solicitudes.idUsuarios
                                LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = usuarios.idLugarTrabajo
                                WHERE lugarTrabajo.idSucursales IS NOT NULL
                                GROUP BY idTipoPapeleria
                                UNION
                                SELECT 'total sucursales', count(idSucursales) FROM sucursales
                                UNION
                                SELECT DISTINCT 'Departamentos', count(solicitudes.idUsuarios) FROM solicitudes 
                                LEFT JOIN usuarios ON usuarios.idUsuarios = solicitudes.idUsuarios
                                LEFT JOIN lugarTrabajo ON lugarTrabajo.idLugarTrabajo = usuarios.idLugarTrabajo
                                WHERE lugarTrabajo.idDepartamentos IS NOT NULL
                                GROUP BY idTipoPapeleria
                                UNION
                                SELECT 'total departamentos', count(idDepartamentos) FROM departamentos
                                UNION
                                SELECT 'Papeleria', count(idTipoPapeleria) FROM solicitudes WHERE idTipoPapeleria = 1
                                UNION
                                SELECT 'Papeleria Impresa', count(idTipoPapeleria) FROM solicitudes WHERE idTipoPapeleria = 2;");

            foreach($req->fetchAll() as $data) {
                $datos[] = $data;
            }

            return $datos;
        }

        public static function verUsuario($idUsuario){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT u.usuarios, l.idLugarTrabajo, s.sucursal, d.departamento
                                FROM usuarios AS u
                                LEFT JOIN lugarTrabajo AS l ON l.idLugarTrabajo = u.idLugarTrabajo
                                LEFT JOIN sucursales AS s ON s.idSucursales = l.idSucursales
                                LEFT JOIN departamentos AS d ON d.idDepartamentos = l.idDepartamentos
                                WHERE u.idUsuarios = $idUsuario;");

            foreach($req->fetchAll() as $data) {
                $usuarios[] = $data;
            }

            return $usuarios;
        }
    }
?>