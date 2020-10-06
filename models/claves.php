<?php 
    class Claves 
    { 
        private $idClaves; 
        private $usuario; 
        private $password; 
        private $idServicio; 
        private $idUsuarios; 
 
        public function __construct ($idClaves, $usuario, $password, $idServicio, $idUsuarios)
        { 
            $this->idClaves = $idClaves; 
            $this->usuario = $usuario; 
            $this->password = $password; 
            $this->idServicio = $idServicio; 
            $this->idUsuarios = $idUsuarios; 
        } 
 
        public function getidClaves() { return $this->idClaves;} 
        public function setidClaves($idClaves) {$this->idClaves;} 
        public function getusuario() { return $this->usuario;} 
        public function setusuario($usuario) {$this->usuario;} 
        public function getpassword() { return $this->password;} 
        public function setpassword($password) {$this->password;} 
        public function getidServicio() { return $this->idServicio;} 
        public function setidServicio($idServicio) {$this->idServicio;} 
        public function getidUsuarios() { return $this->idUsuarios;} 
        public function setidUsuarios($idUsuarios) {$this->idUsuarios;} 
 
        public static function verClaves() 
        { 
            $db = Db::getInstance(); 
            $claves = [];          
            $stmt = $db->prepare('  SELECT  c.idClaves, c.usuario, c.password, s.servicio, u.usuarios 
                                    FROM  claves as c
                                    LEFT JOIN servicio as s ON s.idServicio = c.idServicio
                                    LEFT JOIN usuarios as u ON u.idUsuarios = c.idUsuarios
                                    ORDER BY c.usuario'); 
            $stmt->execute(); 
            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
 
            foreach($stmt->fetchAll() as $select) { 
                $claves[] = new Claves( $select['idClaves'], $select['usuario'], $select['password'], $select['servicio'], $select['usuarios']);
            } 
 
            return $claves; 
        } 
 
        public static function crearClaves($claves) 
        { 
            $db = Db::getInstance(); 
            $insert=$db->prepare('INSERT INTO 
                                  claves (idClaves, usuario, password, idServicio, idUsuarios)
                                  VALUES ( :idClaves, :usuario, :password, :idServicio, :idUsuarios)');
            $insert->bindValue('idClaves', $claves->getidClaves()); 
            $insert->bindValue('usuario', $claves->getusuario()); 
            $insert->bindValue('password', $claves->getpassword()); 
            $insert->bindValue('idServicio', $claves->getidServicio()); 
            $insert->bindValue('idUsuarios', $claves->getidUsuarios()); 
            $insert->execute(); 
        } 
 
        public static function actualizarClaves($claves) 
        { 
            $db = Db::getInstance(); 
            $update = $db->prepare('UPDATE  
                                    claves  
                                    SET  
                                    idClaves=:idClaves, 
                                    usuario=:usuario, 
                                    password=:password, 
                                    idServicio=:idServicio, 
                                    idUsuarios=:idUsuarios 
                                    WHERE
                                    idClaves=:idClaves'); 
            $update->bindValue('idClaves', $claves->getidClaves()); 
            $update->bindValue('usuario', $claves->getusuario()); 
            $update->bindValue('password', $claves->getpassword()); 
            $update->bindValue('idServicio', $claves->getidServicio()); 
            $update->bindValue('idUsuarios', $claves->getidUsuarios()); 
            $update->execute(); 
        } 
 
        public static function searchByidClaves($id) 
        { 
            $db = Db::getInstance(); 
            $stmt = $db->prepare("SELECT * FROM claves WHERE idClaves = $id"); 
            $stmt->execute(); 
            $select = $stmt->fetch(); 
 
            return new Claves( $select['idClaves'], $select['usuario'], $select['password'], $select['idServicio'], $select['idUsuarios'] );
        } 
 
        public static function borrarClaves($id)  
        { 
            $db = Db::getInstance(); 
            $sql = ("DELETE FROM claves WHERE idClaves = $id"); 
            $db->exec($sql); 
        } 
 
    } 
?> 
