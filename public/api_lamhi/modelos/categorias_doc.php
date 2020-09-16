<?php
require_once('../modelos/iModel.php');

class CategoriasDoc{

public function __construct(){
      $_listCategorias = array();
      //$_deleteCategoria = array();
      //$_addCategoria = array();
      $this->_modelo = new Model();
  }

public function listarCategorias(){
		$_consult = "SELECT * FROM categoria_doc WHERE Estado_Categoria_Doc = 'AC' ORDER BY Nombre_Categoria_Doc ";
		$_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
			 $_listCategorias['Categorias'][] = $_row;
    }
		return $_listCategorias;
  }


}
?>
