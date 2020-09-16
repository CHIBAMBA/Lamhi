<?php

require_once('../config/parametros.php');

class Database{
    private $_connection;
    private static $_instance;

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){
        $this->_connection = new mysqli(SERVIDOR,USUARIO,CONTRASENIA,BD);
        if(mysqli_connect_error()){
            trigger_error("Error de conexión: " . mysql_connect_error(),E_USER_ERROR);
        }
    }

    private function __clone() { }

    public function getConnection(){
        return $this->_connection;
    }

    public function Cerrar(){
        self::$_instance = null;
    }
}

?>
