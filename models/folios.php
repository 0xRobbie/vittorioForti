<?php 
    class Folios 
    { 
        private $idFolios; 
        private $folioInicial; 
        private $folioFinal; 
        private $idPapeleria; 
        private $idMovimientoConsumibles; 
 
        public function __construct ( $idFolios,  $folioInicial,  $folioFinal,  $idPapeleria,  $idMovimientoConsumibles)
        { 
            $this->idFolios = $idFolios; 
            $this->folioInicial = $folioInicial; 
            $this->folioFinal = $folioFinal; 
            $this->idPapeleria = $idPapeleria; 
            $this->idMovimientoConsumibles = $idMovimientoConsumibles; 
        } 
 
        public function getidFolios() { return $this->idFolios;} 
        public function setidFolios($idFolios) {$this->idFolios;} 
        public function getfolioInicial() { return $this->folioInicial;} 
        public function setfolioInicial($folioInicial) {$this->folioInicial;} 
        public function getfolioFinal() { return $this->folioFinal;} 
        public function setfolioFinal($folioFinal) {$this->folioFinal;} 
        public function getidPapeleria() { return $this->idPapeleria;} 
        public function setidPapeleria($idPapeleria) {$this->idPapeleria;} 
        public function getidMovimientoConsumibles() { return $this->idMovimientoConsumibles;} 
        public function setidMovimientoConsumibles($idMovimientoConsumibles) {$this->idMovimientoConsumibles;} 
 
        public static function verFolios() 
        { 
            $db = Db::getInstance(); 
            $folios = [];          
            $stmt = $db->prepare('  SELECT f.idFolios, f.folioInicial, f.folioFinal, p.producto, m.idMovimientoConsumibles
                                    FROM  folios AS f 
                                    LEFT JOIN papeleria AS p ON p.idPapeleria = f.idPapeleria
                                    LEFT JOIN movimientoConsumibles AS m ON m.idMovimientoConsumibles = f.idMovimientoConsumibles
                                    ORDER BY f.folioInicial  
                                '); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $folios[] = new Folios( $select['idFolios'], $select['folioInicial'], $select['folioFinal'], $select['producto'], $select['idMovimientoConsumibles']);
            } 
 
            return $folios; 
        } 
 
        public static function crearFolios($folios) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  folios (idFolios, folioInicial, folioFinal, idPapeleria, idMovimientoConsumibles)
                                  VALUES ( :idFolios, :folioInicial, :folioFinal, :idPapeleria, :idMovimientoConsumibles)');
            $insert->bindValue('idFolios', $folios->getidFolios()); 
            $insert->bindValue('folioInicial', $folios->getfolioInicial()); 
            $insert->bindValue('folioFinal', $folios->getfolioFinal()); 
            $insert->bindValue('idPapeleria', $folios->getidPapeleria()); 
            $insert->bindValue('idMovimientoConsumibles', $folios->getidMovimientoConsumibles()); 
            $insert->execute(); 
        } 
 
        public static function actualizarFolios($folios) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    folios  
                                    SET  
                                    idFolios=:idFolios, 
                                    folioInicial=:folioInicial, 
                                    folioFinal=:folioFinal, 
                                    idPapeleria=:idPapeleria, 
                                    idMovimientoConsumibles=:idMovimientoConsumibles 
                                    WHERE
                                    idFolios=:idFolios'); 
         
            $update->bindValue('idFolios', $folios->getidFolios()); 
            $update->bindValue('folioInicial', $folios->getfolioInicial()); 
            $update->bindValue('folioFinal', $folios->getfolioFinal()); 
            $update->bindValue('idPapeleria', $folios->getidPapeleria()); 
            $update->bindValue('idMovimientoConsumibles', $folios->getidMovimientoConsumibles()); 
            $update->execute(); 
        } 
 
        public static function searchByidFolios($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare('SELECT * FROM folios WHERE idFolios = $id'); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Folios( $select['idFolios'], $select['folioInicial'], $select['folioFinal'], $select['idPapeleria'], $select['idMovimientoConsumibles'] );
        } 
 
        public static function borrarFolios($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM folios WHERE idFolios = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
