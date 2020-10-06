<?php
    class Papeleria
    {
        private $idPapeleria;
        private $producto;
        private $stockMinimo;
        private $minimisucursal;
        private $maximosucursal;
        private $folio;
        private $idFormato;
        private $idTipoPapeleria;

        public function __construct($idPapeleria, $producto, $stockMinimo, $minimisucursal , $maximosucursal, $folio, $idFormato, $idTipoPapeleria)
        {
            $this->idPapeleria = $idPapeleria;
            $this->producto = $producto;
            $this->stockMinimo = $stockMinimo;
            $this->minimisucursal = $minimisucursal;
            $this->maximosucursal = $maximosucursal;
            $this->folio = $folio;
            $this->idFormato = $idFormato;
            $this->idTipoPapeleria = $idTipoPapeleria;
        }

        public function getIdPapeleria() { return $this->idPapeleria;}
        public function setIdPapeleria($idPapeleria) {$this->idPapeleria;}
        public function getProducto() { return $this->producto;}
        public function setProducto($producto) {$this->producto;}
        public function getStockMinimo() { return $this->stockMinimo;}
        public function setStockMinimo($stockMinimo) {$this->stockMinimo;}
        public function getMinimoSucursal() { return $this->minimisucursal;}
        public function setMinimoSucursal($minimisucursal) {$this->minimisucursal;}
        public function getMaximoSucursal() { return $this->maximosucursal;}
        public function setMaximoSucursal($maximosucursal) {$this->maximosucursal;}
        public function getFolio() { return $this->folio;}
        public function setFolio($folio) {$this->folio;}
        public function getIdFormato() { return $this->idFormato;}
        public function setIdFormato($idFormato) {$this->idFormato;}
        public function getIdTipoPapeleria() { return $this->idTipoPapeleria;}
        public function setIdTipoPapeleria($idTipoPapeleria) {$this->idTipoPapeleria;}

        public static function verPapeleriaCompleta(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT  papeleria.idPapeleria, 
                                        papeleria.producto, 
                                        papeleria.stockMinimo, 
                                        papeleria.minimoSucursal, 
                                        papeleria.maximoSucursal, 
                                        papeleria.folio, 
                                        formato.formato, 
                                        tipoPapeleria.tipoPapeleria 
                                FROM papeleria
                                LEFT JOIN formato ON formato.idFormato = papeleria.idFormato
                                LEFT JOIN tipoPapeleria ON tipoPapeleria.idTipoPapeleria = papeleria.idTipoPapeleria
                                ORDER BY Papeleria.idPapeleria;");

            foreach($req->fetchAll() as $producto) {
                $papeleria[] = $producto;
            }

            if (empty($papeleria)) {
                $papeleria = '0';
            }

            return $papeleria;
        }

        public static function verPapeleria($tipoPapeleria){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT  papeleria.idPapeleria, 
                                        papeleria.producto, 
                                        papeleria.stockMinimo, 
                                        papeleria.minimoSucursal, 
                                        papeleria.maximoSucursal, 
                                        papeleria.folio, 
                                        formato.formato, 
                                        tipoPapeleria.tipoPapeleria 
                                FROM papeleria
                                LEFT JOIN formato ON formato.idFormato = papeleria.idFormato
                                LEFT JOIN tipoPapeleria ON tipoPapeleria.idTipoPapeleria = papeleria.idTipoPapeleria
                                WHERE papeleria.idTipoPapeleria = $tipoPapeleria
                                ORDER BY Papeleria.idPapeleria;");

            foreach($req->fetchAll() as $producto) {
                $papeleria[] = $producto;
            }

            return $papeleria;
        }

        public static function actualizarPapeleria($producto){
            $db = Db::getInstance();
            $update = $db->prepare('UPDATE papeleria 
                                    SET producto=:producto,
                                        stockMinimo=:stockMinimo,
                                        minimoSucursal=:minimoSucursal,
                                        maximoSucursal=:maximoSucursal,
                                        folio=:folio,
                                        idFormato=:idFormato,
                                        idTipoPapeleria=:idTipoPapeleria WHERE idPapeleria=:idPapeleria');
            $update->bindValue('idPapeleria', $producto->getIdPapeleria());
            $update->bindValue('producto', $producto->getproducto());
            $update->bindValue('stockMinimo', $producto->getstockMinimo());
            $update->bindValue('minimoSucursal', $producto->getMinimoSucursal());
            $update->bindValue('maximoSucursal', $producto->getMaximoSucursal());
            $update->bindValue('folio', $producto->getFolio());
            $update->bindValue('idFormato', $producto->getIdFormato());
            $update->bindValue('idTipoPapeleria', $producto->getIdTipoPapeleria());
            $update->execute();
          }

          public static function searchByIdPapeleria($id) {
            $db = Db::getInstance();

            $stmt = $db->prepare("SELECT * FROM papeleria WHERE idPapeleria = $id");
            $stmt->execute();
            $producto = $stmt->fetch();

            return new Papeleria($producto['idPapeleria'], $producto['producto'], $producto['stockMinimo'], $producto['minimoSucursal'], $producto['maximoSucursal'], $producto['folio'], $producto['idFormato'], $producto['idTipoPapeleria']);
          }

        public static function crearPapeleria($producto){
            $db = Db::getInstance();
            $insert=$db->prepare('INSERT INTO papeleria (idPapeleria, producto, stockMinimo, minimoSucursal, maximoSucursal, folio, idFormato, idTipoPapeleria) VALUES (:idPapeleria, :producto, :stockMinimo, :minimoSucursal, :maximoSucursal, :folio, :idFormato, :idTipoPapeleria)');
            $insert->bindValue('idPapeleria', $producto->getIdPapeleria());
            $insert->bindValue('producto', $producto->getProducto());
            $insert->bindValue('stockMinimo', $producto->getStockMinimo());
            $insert->bindValue('minimoSucursal', $producto->getMinimoSucursal());
            $insert->bindValue('maximoSucursal', $producto->getMaximoSucursal());
            $insert->bindValue('folio', $producto->getFolio());
            $insert->bindValue('idFormato', $producto->getIdFormato());
            $insert->bindValue('idTipoPapeleria', $producto->getIdTipoPapeleria());
            $insert->execute();
        }

        public static function borrarPapeleria($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM papeleria WHERE idPapeleria = $id"); 
            $db->exec($sql); 
        } 

    }
?>