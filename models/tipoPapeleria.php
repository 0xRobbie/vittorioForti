<?php
    class TipoPapeleria
    {
        private $idTipoPapeleria;
        private $tipoPapeleria;

        public function __construct($TipoPapeleria)
        {
            $this->tipoPapeleria = $TipoPapeleria;
        }

        public function getIdTipoPapeleria() { return $this->idTipoPapeleria;}
        public function setIdTipoPapeleria($idTipoPapeleria) {$this->idTipoPapeleria;}
        public function getTipoPapeleria() { return $this->tipoPapeleria;}
        public function setTipoPapeleria($tipoPapeleria) {$this->tipoPapeleria;}

        public static function verTipoPapeleria(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT * FROM tipoPapeleria;");

            foreach($req->fetchAll() as $papeleria) {
                $Tipo[] = $papeleria;
            }

            return $Tipo;
        }

    }
?>