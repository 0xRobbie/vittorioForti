<?php
    class Rastreo
    {
        private $idRastreo;
        private $rastreo;

        public function __construct($rastreo)
        {
            $this->rastreo = $rastreo;
        }

        public function getIdRastreo() { return $this->idRastreo;}
        public function setIdRastreo($idRastreo) {$this->idRastreo;}
        public function getRastreo() { return $this->rastreo;}
        public function setRastreo($rastreo) {$this->rastreo;}

        public static function verRastreo(){
            $db = Db::getInstance();          
            $req = $db->query(" SELECT * FROM Rastreo;");

            foreach($req->fetchAll() as $rastreo) {
                $rastreos[] = $rastreo;
            }

            return $rastreos;
        }

    }
?>