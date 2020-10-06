<?php
    class SolicitudesController
    {
        public function verSolicitudes()
        {
            $id = $_GET['idSolicitudes'];
            $Solicitudes = Solicitudes::verSolicitudes($id);
            $EnTramite = Solicitudes::verSolicitudesTramite($id);
            $Enviadas = Solicitudes::verSolicitudesEnviadas($id);
            // $Resueltas = Solicitudes::verSolicitudesResueltas();
            include_once ('views/solicitudes/verSolicitudes.php');
        }
        
        public function formularioSolicitudes()
        {
            $tipos = TipoPapeleria::verTipoPapeleria();
            include_once ('views/solicitudes/formularioSolicitudes.php');
        }

        public function crearSolicitudes()
        {
            if (!isset($_POST['idUsuario'], $_POST['idTipoPapeleria'], $_POST['observaciones'], $_POST['idRastreo']) )
                return call('acceso', 'error');

            $idUsuario = $_POST['idUsuario'];
            $idTipoPapeleria = $_POST['idTipoPapeleria'];
            $observaciones = $_POST['observaciones'];
            $rastreo = $_POST['idRastreo'];

            Solicitudes::crearSolicitudes($idUsuario, $idTipoPapeleria, $observaciones, $rastreo);
            $this->verSolicitudes();
        }
        
        public function solicitudPapeleria()
        {
            $idUsuario = $_SESSION['user_id'];
            $idSolicitud = $_GET['idSolicitudes'];
            $tipoPapeleria = $_GET['tipoPapeleria'];
            
            $solicitud = MovimientoConsumibles::seSolicitaronProductos($idSolicitud);
            
            if ($solicitud) {
                $papeleria = Papeleria::verPapeleria($tipoPapeleria);
                include_once ('views/solicitudes/solicitudPapeleria.php');
            } else {
                echo '<script>alert("Ya se solicitaron productos para esta solicitud");</script>';
                echo "<script>window.location.href = '?controller=solicitudes&action=verSolicitudes&idSolicitudes=$idUsuario';</script>";
            }
        }

        public function revisarPedido()
        {   
            $idUsuario = $_POST['idUsuario'];
            $idSolicitudes = $_POST['idSolicitudes'];
            $idLugarTrabajo = $_POST['idLugarTrabajo'];
            $preasignado = $_POST['preasignado'];

            foreach ($_POST as $idPapeleria => $piezas) {
                if ($piezas != '' && $idPapeleria != 'idUsuario' && $idPapeleria != 'idSolicitudes' && $idPapeleria != 'idLugarTrabajo' && $idPapeleria != 'preasignado') {
                    $movimientos = new MovimientoConsumibles(null, $idUsuario, $idPapeleria, $piezas, $idSolicitudes, $idLugarTrabajo, $preasignado);
                    MovimientoConsumibles::crearMovimientoConsumibles($movimientos);
                    Solicitudes::actualizarSolicitudes($idSolicitudes, 2);
                }
            }
            include_once ('views/solicitudes/revisarPedido.php');
        }

        public function verSolicitudProductos()
        {   
            $idSolicitud = $_GET['idSolicitudes'];
            $rastreo = $_GET['rastreo'];
            $lugar = $_SESSION['user_lugar']; // CAMBIAR ESTA LINEA
            $productos = Solicitudes::verSolicitudProductos($idSolicitud, $rastreo, $lugar);
            include_once ('views/solicitudes/verSolicitudProductos.php');
        }

        public function cancelarSolicitudes()
        {
            if ( !isset($_GET['idCancelar']) )
               return call('acceso', 'error');
            
            $idUsuario = $_SESSION['user_id'];
            $idSolicitud = $_GET['idCancelar'];
            $solicitud = MovimientoConsumibles::seSolicitaronProductos($idSolicitud);
            
            if ($solicitud) {
                $post = Solicitudes::borrarSolicitudes($_GET['idCancelar']);
                $this->verSolicitudes();
            } else {
                echo '<script>alert("Ya se solicitaron productos para esta solicitud no puede eliminar ni agregar nuevos productos");</script>';
                echo "<script>window.location.href = '?controller=solicitudes&action=verSolicitudes&idSolicitudes=$idUsuario';</script>";
            }
        }

        public function confirmarEntrega()
        {
            $idSolicitud = $_GET['idSolicitudes'];
            $idUsuario = $_SESSION['user_id'];
            $idRastreo = 4;
            Solicitudes::actualizarSolicitudes($idSolicitud, $idRastreo);
            echo "<script>window.location.href = '?controller=solicitudes&action=verSolicitudes&idSolicitudes=$idUsuario';</script>";
        }

        public function resumenSolicitudes()
        {
            //$inventarioSistemas = Sucursales::verInventarioSucursal(1);
            $solicitudes = Solicitudes::verSolicitudesNoAtendidas();
            include_once ('views/solicitudes/resumenSolicitudes.php');
        }
    }
?>