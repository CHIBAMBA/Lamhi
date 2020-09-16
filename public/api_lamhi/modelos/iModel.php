<?php
require_once('../config/conexion.php');
class Model{
     private $_db;
     private $_conexion;

     public function __construct(){
          $this->_db = Database::getInstance();
          $this->_conexion = $this->_db->getConnection();
     }

     public function totalValues($_sql){
        $_result = $this->_conexion->query($_sql);
        $_total=$_result->num_rows;
		    return $_total;
    }

     public function getValues($_sql){
        $_datos=null;
        $_result = $this->_conexion->query($_sql);
    		while($_fila=mysqli_fetch_assoc($_result)){
    			   $_datos=$_fila;
    		  }
          return $_datos;
        }

    public function selectValues($_sql){
        $_datos=array();
        $_result = $this->_conexion->query($_sql);
        while ($_datos[]=$_result->fetch_assoc());
        return $_datos;
    }

    public function functionCrud($_sql){
        $_result = $this->_conexion->query($_sql);
        if($_result){
            return true;
        }else{
            return false;
        }
    }

}
?>
