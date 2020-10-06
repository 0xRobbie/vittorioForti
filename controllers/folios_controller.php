<?php 
    class FoliosController 
    { 
        public function verFolios() 
        { 
            $folios = Folios::verFolios(); 
            include_once ('views/folios/verFolios.php'); 
        } 
 
        public function formularioFolios() 
        { 
            include_once ('views/folios/formularioFolios.php'); 
        } 
 
        public function crearFolios() 
        { 
            if (!isset( $_POST['idFolios'], $_POST['folioInicial'], $_POST['folioFinal'], $_POST['idPapeleria'], $_POST['idMovimientoConsumibles']))
                return call('acceso', 'error'); 
 
            $folios = new Folios( $_POST['idFolios'], $_POST['folioInicial'], $_POST['folioFinal'], $_POST['idPapeleria'], $_POST['idMovimientoConsumibles']);
            Folios::crearFolios($folios); 
            $this->verFolios(); 
        } 
 
        public function actualizarFolios() 
        { 
            $id = $_GET['idFolios']; 
            $folios = Folios::searchByIdFolios($id); 
            require_once('views/folios/actualizarFolios.php'); 
        } 
 
        public function actualizar() 
        { 
            $folios = new Folios( $_POST['idFolios'], $_POST['folioInicial'], $_POST['folioFinal'], $_POST['idPapeleria'], $_POST['idMovimientoConsumibles']);
            Folios::actualizarFolios($folios); 
            $this->verFolios(); 
        } 
 
        public function borrarFolios() 
        { 
            if (!isset($_GET['idFolios'])) 
               return call('acceso', 'error'); 
             
            $post = Folios::borrarFolios($_GET['idFolios']); 
            $this->verFolios(); 
        } 
    } 
?> 
