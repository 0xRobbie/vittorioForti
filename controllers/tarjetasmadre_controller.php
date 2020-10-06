<?php 
    class TarjetasMadreController 
    { 
        public function verTarjetasMadre() 
        { 
            $tarjetasmadre = TarjetasMadre::verTarjetasMadre(); 
            include_once ('views/tarjetasmadre/verTarjetasMadre.php'); 
        } 
 
        public function formularioTarjetasMadre() 
        { 
            include_once ('views/tarjetasmadre/formularioTarjetasMadre.php'); 
        } 
 
        public function crearTarjetasMadre() 
        { 
            if (!isset(
                $_POST['idTarjetasMadre'],
                $_POST['tarjeta'],
                $_POST['procesador'],
               ))
                return call('acceso', 'error'); 
 
                $tarjetasmadre = new TarjetasMadre(
                    $_POST['idTarjetasMadre'],     
                    $_POST['tarjeta'],
                    $_POST['procesador'],
  );
            TarjetasMadre::crearTarjetasMadre($tarjetasmadre); 
            $this->verTarjetasMadre(); 
        } 
 
        public function actualizarTarjetasMadre() 
        { 
            $id = $_GET['idTarjetasMadre']; 
            $tarjetasmadre = TarjetasMadre::searchByIdTarjetasMadre($id); 
            require_once('views/tarjetasmadre/actualizarTarjetasMadre.php'); 
        } 
 
        public function actualizar() 
        { 
            $tarjetasmadre = new TarjetasMadre(
                $_POST['idTarjetasMadre'],     
                $_POST['tarjeta'],
                $_POST['procesador'],
);
            TarjetasMadre::actualizarTarjetasMadre($tarjetasmadre); 
            $this->verTarjetasMadre(); 
        } 
 
        public function borrarTarjetasMadre() 
        { 
            if (!isset($_GET['idTarjetasMadre'])) 
               return call('acceso', 'error'); 
             
            $post = TarjetasMadre::borrarTarjetasMadre($_GET['idTarjetasMadre']); 
            $this->verTarjetasMadre(); 
        } 
    } 
?> 
