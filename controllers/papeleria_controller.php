<?php
    class PapeleriaController
    {
        public function verPapeleria()
        {
            $papeleria = Papeleria::verPapeleriaCompleta();
            include_once ('views/papeleria/verPapeleria.php');
        }
        
        public function formularioPapeleria()
        {
            $tipos = TipoPapeleria::verTipoPapeleria();
            $formatos = Formato::verFormato();
            include_once ('views/papeleria/formularioPapeleria.php');
        }

        public function crearPapeleria()
        {
            if (!isset($_POST['producto'], $_POST['stockMinimo'], $_POST['minimoSucursal'], $_POST['maximoSucursal'], $_POST['folio'], $_POST['formato'], $_POST['idTipoPapeleria']) )
                return call('acceso', 'error');

            $producto = new Papeleria(null, $_POST['producto'], $_POST['stockMinimo'], $_POST['minimoSucursal'], $_POST['maximoSucursal'], $_POST['folio'], $_POST['formato'], $_POST['idTipoPapeleria']);
            Papeleria::crearPapeleria($producto);

            $this->verPapeleria();
        }
        
        public function actualizarPapeleria()
        {
            $idPapeleria = $_GET['idPapeleria'];
            $producto = Papeleria::searchByIdPapeleria($idPapeleria);
            $formatos = Formato::verFormato();
            $tiposPapeleria = TipoPapeleria::verTipoPapeleria();
            require_once('views/papeleria/actualizarPapeleria.php');
        }

        public function actualizar()
        {
            $papeleria = new Papeleria($_POST['idPapeleria'], $_POST['producto'], $_POST['stockMinimo'], $_POST['minimoSucursal'], $_POST['maximoSucursal'], $_POST['folio'], $_POST['idFormato'], $_POST['idTipoPapeleria']);
            Papeleria::actualizarPapeleria($papeleria);
            $this->verPapeleria();
        }

        public function borrarPapeleria()
        {
            if (!isset($_GET['idPapeleria'])) 
               return call('acceso', 'error'); 
             
            $post = Papeleria::borrarPapeleria($_GET['idPapeleria']); 
            $this->verPapeleria(); 
        }

    }
?>