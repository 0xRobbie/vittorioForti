<?php
    function call($controller, $action) {
        require_once('controllers/' . $controller . '_controller.php');

        switch($controller) {
            case 'acceso':
                include_once ('models/acceso.php');
                include_once ('models/usuarios.php');
                include_once ('models/sucursales.php');
                $controller = new AccesoController();
            break;
            case 'departamentos':
                include_once ('models/departamentos.php');
                include_once ('models/lugarTrabajo.php');
                $controller = new DepartamentosController();
            break;
            case 'sucursales':
                include_once ('models/sucursales.php');
                include_once ('models/lugarTrabajo.php');
                $controller = new SucursalesController();
            break;
            case 'lugartrabajo':
                include_once ('models/lugarTrabajo.php');
                $controller = new LugartrabajoController();
            break;
            case 'rastreo':
                include_once ('models/rastreo.php');
                $controller = new RastreoController();
            break;
            case 'papeleria':
                include_once ('models/papeleria.php');
                include_once ('models/tipoPapeleria.php');
                include_once ('models/formato.php');
                $controller = new PapeleriaController();
            break;
            case 'folios':
                include_once ('models/folios.php');
                include_once ('models/papeleria.php');
                include_once ('models/movimientoConsumibles.php');
                $controller = new foliosController();
            break;
            case 'usuarios':
                include_once ('models/usuarios.php');
                include_once ('models/tipoUsuario.php');
                include_once ('models/lugarTrabajo.php');
                $controller = new UsuariosController();
            break;
            case 'tipoUsuario':
                include_once ('models/tipoUsuario.php');
                $controller = new TipoUsuarioController();
            break;
            case 'tipoPapeleria':
                include_once ('models/tipoPapeleria.php');
                $controller = new TipoPapeleriaController();
            break;
            case 'formato':
                include_once ('models/formato.php');
                $controller = new FormatoController();
            break;
            case 'solicitudes':
                include_once ('models/solicitudes.php');
                include_once ('models/sucursales.php');
                include_once ('models/tipoPapeleria.php');
                include_once ('models/papeleria.php');
                include_once ('models/movimientoConsumibles.php');
                $controller = new SolicitudesController();
            break;
            case 'movimientoConsumibles':
                include_once ('models/usuarios.php');
                include_once ('models/papeleria.php');
                include_once ('models/folios.php');
                include_once ('models/rastreo.php');
                include_once ('models/lugarTrabajo.php');
                include_once ('models/sucursales.php');
                include_once ('models/departamentos.php');
                include_once ('models/solicitudes.php');
                include_once ('models/movimientoConsumibles.php');
                $controller = new MovimientoConsumiblesController();
            break;
            case 'servicio':
                include_once ('models/servicio.php');
                $controller = new servicioController();
            break;
            case 'claves':
                include_once ('models/usuarios.php');
                include_once ('models/servicio.php');
                include_once ('models/claves.php');
                $controller = new clavesController();
            break;
            case 'insumos':
                include_once ('models/insumos.php');
                $controller = new insumosController();
           break;
           case 'impresoras':
                include_once ('models/impresoras.php');
                include_once ('models/insumos.php');
                $controller = new impresorasController();
           break;
           case 'fuentepoder':
                include_once ('models/fuentepoder.php');
                $controller = new fuentepoderController();
           break;
           case 'ram':
                include_once ('models/ram.php');
                $controller = new ramController();
           break;
           case 'discosduros':
                include_once ('models/discosduros.php');  
                $controller = new discosdurosController();
           break;
           case 'teclados':
                include_once ('models/teclados.php');  
                $controller = new tecladosController();
           break;
           case 'mouses':
                include_once ('models/mouses.php');
                $controller = new mousesController();
           break;
           case 'monitores':
                include_once ('models/monitores.php');
                $controller = new monitoresController();
           break;
           case 'tarjetasmadre':
                include_once ('models/tarjetasmadre.php');  
                $controller = new tarjetasmadreController();
           break;
           case 'so':
                include_once ('models/so.php');  
                $controller = new soController();
           break;
           case 'equipoarmado':
                include_once ('models/fuentepoder.php');
                include_once ('models/ram.php');
                include_once ('models/discosduros.php');  
                include_once ('models/teclados.php');  
                include_once ('models/mouses.php');
                include_once ('models/monitores.php');
                include_once ('models/tarjetasmadre.php');  
                include_once ('models/so.php');  
                include_once ('models/equipoarmado.php');
                $controller = new equipoarmadoController();
           break;
           case 'tipoasignacion':
                include_once ('models/tipoasignacion.php');
                $controller = new tipoasignacionController();
           break;
           case 'dispositivo':
                include_once ('models/dispositivo.php');
                $controller = new dispositivoController();
           break;
           case 'dispositivomovil':
                include_once ('models/so.php');  
                include_once ('models/dispositivomovil.php');
                include_once ('models/dispositivo.php');
                $controller = new dispositivomovilController();
           break;
           case 'equipos':
                include_once ('models/equipoarmado.php');
                include_once ('models/dispositivomovil.php');
                include_once ('models/equipos.php');
                include_once ('models/impresoras.php');
                include_once ('models/insumos.php');
                $controller = new equiposController();
           break;
           case 'asignacionequipo':
                include_once ('models/tipoasignacion.php');
                include_once ('models/asignacionequipo.php');  
                $controller = new asignacionequipoController();
           break;
           case 'marca':
                include_once ('models/marca.php');
                $controller = new marcaController();
           break;
        }

        $controller->{ $action }();
    }

    $controllers = array(   'acceso' => ['index', 'error', 'login', 'logout', 'menuSistemas', 'menuSucursales'] ,
                            'usuarios' => ['verUsuarios', 'crearUsuarios', 'actualizarUsuarios', 'actualizar', 'formularioUsuarios', 'borrarUsuarios'],
                            'papeleria' => ['verPapeleria', 'crearPapeleria', 'actualizarPapeleria', 'formularioPapeleria', 'actualizar', 'borrarPapeleria'],
                            'folios' => ['verFolios', 'crearFolios', 'actualizarFolios', 'actualizar', 'formularioFolios'],
                            'rastreo' => ['verRastreo', 'crearRastreo', 'actualizarRastreo', 'formularioRastreo'],
                            'tipoPapeleria' => ['verTipoPapeleria', 'crearTipoPapeleria', 'actualizarTipoPapeleria', 'formularioTipoPapeleria'],
                            'tipoUsuario' => ['verTipoUsuario', 'crearTipoUsuario', 'actualizarTipoUsuario', 'formularioTipoUsuario'],
                            'formato' => ['verFormato', 'crearFormato', 'actualizarFormato', 'formularioFormato'],
                            'departamentos' => ['verDepartamentos', 'crearDepartamentos', 'actualizarDepartamentos', 'actualizar', 'formularioDepartamentos', 'borrarDepartamentos'],
                            'sucursales' => ['verSucursales', 'crearSucursales', 'actualizarSucursales', 'actualizar', 'formularioSucursales', 'borrarSucursales', // CRUD Sucursales
                                                'verInventarioSucursal', 'verInventarioSucursales', 'verInventarioSistemas'],
                            'lugartrabajo' => ['verLugarTrabajo', 'crearLugarTrabajo', 'actualizarLugarTrabajo', 'actualizar', 'formularioLugarTrabajo, borrarSucursal, borrarDepartamento'],
                            'solicitudes' => ['verSolicitudes', 'crearSolicitudes', 'actualizarSolicitudes', 'formularioSolicitudes', // CRUD solicitudes
                                                    'solicitudPapeleria', 'revisarPedido', 'verEstatus', 'cancelarSolicitudes', 'verSolicitudProductos', 'confirmarEntrega', 'resumenSolicitudes'], // Sistemas opciones
                            'movimientoConsumibles' => ['verMovimientoConsumibles', 'crearMovimientoConsumibles', 'actualizarUbicacion', 'actualizar', 'formularioMovimientoConsumibles', //CRUD Movimientos
                                                            'asignarTienda', 'asignarInsumos', 'asignar', 'movimientoSinSolicitud',
                                                            'verTotalSolicitudes', 'atenderSolicitudes', 'actualizarSolicitudes',
                                                            'materialOcupado', 'salidaProducto', 'asignacionMasivaTiendas', 'asignacionMasivaProductos', 'asignacionMasivaT', 'asignacionMasivaP'], // Movimientos
                            'servicio' => ['verServicio', 'crearServicio', 'actualizarServicio', 'actualizar', 'formularioServicio', 'borrarServicio'],
                            'claves' => ['verClaves', 'crearClaves', 'actualizarClaves', 'actualizar', 'formularioClaves', 'borrarClaves'],
                            'insumos' => ['verInsumos', 'crearInsumos', 'actualizarInsumos', 'actualizar', 'formularioInsumos', 'borrarInsumos'],
                            'impresoras' => ['verImpresoras', 'crearImpresoras', 'actualizarImpresoras', 'actualizar', 'formularioImpresoras', 'borrarImpresoras'],
                            'fuentepoder' => ['verFuentePoder', 'crearFuentePoder', 'actualizarFuentePoder', 'actualizar', 'formularioFuentePoder', 'borrarFuentepoder'],
                            'ram' => ['verRam', 'crearRam', 'actualizarRam', 'actualizar', 'formularioRam', 'borrarRam'],
                            'discosduros' => ['verDiscosDuros', 'crearDiscosDuros', 'actualizarDiscosDuros', 'actualizar', 'formularioDiscosDuros', 'borrarDiscosduros'],
                            'teclados' => ['verTeclados', 'crearTeclados', 'actualizarTeclados', 'actualizar', 'formularioTeclados', 'borrarTeclados'],
                            'mouses' => ['verMouses', 'crearMouses', 'actualizarMouses', 'actualizar', 'formularioMouses', 'borrarMouses'],
                            'monitores' => ['verMonitores', 'crearMonitores', 'actualizarMonitores', 'actualizar', 'formularioMonitores', 'borrarMonitores'],
                            'tarjetasmadre' => ['verTarjetasMadre', 'crearTarjetasMadre', 'actualizarTarjetasMadre', 'actualizar', 'formularioTarjetasMadre', 'borrarTarjetasmadre'],
                            'so' => ['verSO', 'crearSO', 'actualizarSO', 'actualizar', 'formularioSO', 'borrarSo'],
                            'equipoarmado' => ['verEquipoArmado', 'crearEquipoArmado', 'actualizarEquipoArmado', 'actualizar', 'formularioEquipoArmado', 'borrarEquipoarmado'],
                            'tipoasignacion' => ['verTipoAsignacion', 'crearTipoAsignacion', 'actualizarTipoAsignacion', 'actualizar', 'formularioTipoAsignacion', 'borrarTipoasignacion'],
                            'dispositivo' => ['verDispositivo', 'crearDispositivo', 'actualizarDispositivo', 'actualizar', 'formularioDispositivo', 'borrarDispositivo'],
                            'dispositivomovil' => ['verDispositivoMovil', 'crearDispositivoMovil', 'actualizarDispositivoMovil', 'actualizar', 'formularioDispositivoMovil', 'borrarDispositivomovil'],
                            'equipos' => ['verEquipos', 'crearEquipos', 'actualizarEquipos', 'actualizar', 'formularioEquipos', 'borrarEquipos'],
                            'asignacionequipo' => ['verAsignacionEquipo', 'crearAsignacionEquipo', 'actualizarAsignacionEquipo', 'actualizar', 'formularioAsignacionEquipo', 'borrarAsignacionequipo'],
                            'marca' => ['verMarca', 'crearMarca', 'actualizarMarca', 'actualizar', 'formularioMarca', 'borrarMarca']
                    );

    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            call('acceso', 'error');
        }
    } else {
            call('acceso', 'error');
    }

?>