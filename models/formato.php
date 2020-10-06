<?php
    class Formato
    {
        private $idFormato;
        private $formato;

        public function __construct($formato)
        {
            $this->formato = $formato;
        }

        public function getIdFormato() { return $this->idFormato;}
        public function setIdFormato($idFormato) {$this->idFormato;}
        public function getFormato() { return $this->formato;}
        public function setFormato($formato) {$this->formato;}

        public static function verFormato(){
            $db = Db::getInstance();          
            $req = $db->query("SELECT * FROM formato;");

            foreach($req->fetchAll() as $formato) {
                $formatos[] = $formato;
            }

            return $formatos;
        }

    }
?>