<?php
    class SucursalesController
    {
        public function verSucursales()
        {
            $sucursales = Sucursales::verSucursales();
            include_once ('views/sucursales/verSucursales.php');
        }
        
        public function verInventarioSistemas()
        {
            $inventario = Sucursales::verInventarioSistemas();
            include_once ('views/sucursales/verInventarioSucursal.php');
        }
        
        public function verInventarioSucursal()
        {
            $inventario = Sucursales::verInventarioSucursal($_SESSION['user_lugar']);
            include_once ('views/sucursales/verInventarioSucursal.php');
        }

        public function verInventarioSucursales()
        {
            $inventario = Sucursales::verInventarioSucursales();
            include_once ('views/sucursales/verInventarioSucursales.php');
        }

        public function formularioSucursales()
        {
            include_once ('views/Sucursales/formularioSucursales.php');
        }

        public function crearSucursales() {
            if (!isset($_POST['idSucursales'], $_POST['sucursal'], $_POST['direccion'], $_POST['region'], $_POST['telefono'], $_POST['correo'], $_POST['estado']) )
                return call('acceso', 'error');

            $sucursal = new Sucursales($_POST['idSucursales'], $_POST['sucursal'], $_POST['direccion'], $_POST['region'], $_POST['colonia'], $_POST['municipio'], $_POST['estado'], $_POST['telefono'], $_POST['correo'], $_POST['cp']);
            $last_id = Sucursales::crearSucursales($sucursal);

            $lugarTrabajo = new LugarTrabajo(null, null, $_POST['idSucursales']);
            LugarTrabajo::crearLugarTrabajo($lugarTrabajo);

            $this->verSucursales();
        }

        public function actualizarSucursales() {
            $id = $_GET['idSucursales'];
            $sucursal = Sucursales::searchByIdSucursal($id);
            require_once('views/Sucursales/actualizarSucursales.php');
        }

        public function actualizar() {
            $sucursal = new Sucursales($_POST['idSucursales'], $_POST['sucursal'], $_POST['direccion'], $_POST['region'], $_POST['colonia'], $_POST['municipio'], $_POST['estado'], $_POST['telefono'], $_POST['correo'], $_POST['cp']);
            Sucursales::actualizarSucursales($sucursal);
            $this->verSucursales();
        }

        public function borrarSucursales()
        {
            if (!isset($_GET['idSucursales'])) 
               return call('acceso', 'error'); 
             
            LugarTrabajo::borrarSucursal($_GET['idSucursales']);
            $post = Sucursales::borrarSucursales($_GET['idSucursales']); 
            $this->verSucursales(); 
        }
    }
?>