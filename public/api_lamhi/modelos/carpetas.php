<?php
require_once('../modelos/iModel.php');

class Carpetas{

public function __construct(){
      $_listArchivos = array();
      $_deleteArchivo = array();
      $_addCarp = array();
      $_deleteCarpeta = array();
      $this->_modelo = new Model();
}

public function verArchivosCargados($cliente,$modo,$categoria){
    $_consult = "CALL verArchivos ($cliente,$modo,$categoria)";
    $_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
    $_listArchivos['Archivos'][] = $_row;
    }
    return $_listArchivos;
}

public function eliminarArchivo($archivo){
    $_consult = "DELETE FROM documentos WHERE Id_Documento = $archivo ";
    if($this->_modelo->functionCrud($_consult)){
      $_deleteArchivo['success'] = 1;
      $_deleteArchivo['message'] = 'Archivo eliminado correctamente';
      }else{
          $_deleteArchivo['success'] = 0;
          $_deleteArchivo['message'] = 'Error al eliminar archivo';
      }
    return $_deleteArchivo;
  }

  public function addCarpeta($carpeta){
    $_consult = "INSERT INTO categoria_doc (Nombre_Categoria_Doc) VALUES ('$carpeta')";
    if($this->checkCarp($carpeta)){
      $_addCarp['success'] = 0;
      $_addCarp['message'] = "Ya existe una carpeta con este nombre";
    }else{
          if($this->_modelo->functionCrud($_consult)){
                $_addCarp['success'] = 1;
                $_addCarp['message'] = "Carpeta agregada correctamente";
          }else{
                $_addCarp['success'] = 0;
                $_addCarp['message'] = "Error al agregar carpeta. Intentalo más tarde";
          }
    }
    return $_addCarp;
  }
  
  public function checkCarp($carpeta){
    $_consult = "SELECT * FROM categoria_doc WHERE Nombre_Categoria_Doc = '$carpeta' AND Estado_Categoria_Doc = 'AC'";
    $_result = $this->_modelo->totalValues($_consult);
    if($_result > 0){
        return true;
    }else{
      return false;
    }
}

public function deleteCarpeta($id){
  $_consult = "UPDATE categoria_doc SET Estado_Categoria_Doc = 'BA' WHERE Id_Categoria_Doc = '$id'";
    if($this->_modelo->functionCrud($_consult)){
        $_deleteCarpeta['success'] = 1;
        $_deleteCarpeta['message'] = "Carpeta eliminado correctamente";
    }else{
       $_deleteCarpeta['success'] = 0;
       $_deleteCarpeta['message'] = "Error al eliminar carpeta. Intentalo más tarde";
    }
  return $_deleteCarpeta;
}

}
?>
