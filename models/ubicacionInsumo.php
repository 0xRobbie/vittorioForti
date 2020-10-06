<?php
    class UbicacionInsumo
    {
        private $idUbicacionInsumo;
        private $ubicacion;

        public function __construct($ubicacion)
        {
            $this->ubicacion = $ubicacion;
        }

        public function getIdUbicacionInsumo() { return $this->idUbicacionInsumo;}
        public function setIdUbicacionInsumo($idUbicacionInsumo) {$this->idUbicacionInsumo;}
        public function getUbicacion() { return $this->ubicacion;}
        public function setUbicacion($ubicacion) {$this->ubicacion;}

        public static function verUbicacionInsumo(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT * FROM ubicacionInsumo;");

            foreach($req->fetchAll() as $insumo) {
                $insumos[] = $insumo;
            }

            return $insumos;
        }

    }
?>