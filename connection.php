<?php
    class Db 
    {
        private static $instance = NULL;
        private function __construct() {}
        private function __clone() {}

        public static function getInstance() {
            try {
                if (!isset(self::$instance)) {
                    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    self::$instance = new PDO("sqlsrv:server = tcp:vittoriobd.database.windows.net,1433; Database = controlBD", "Robbie", "AnnieColibri++");
                }
                return self::$instance;
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }
        }
    }
?>