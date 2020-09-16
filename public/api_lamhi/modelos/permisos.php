<?php
require_once('../modelos/iModel.php');

class Permisos{

public function __construct(){
      $_listModulos = array();
      $_listPermiso = array();
      $_deletePermiso = array();
      $_addPermiso = array();
      $this->_modelo = new Model();
  }

public function listarModulos($usuario){
		$_consult = "SELECT 
                    M.Id_Menu as ID_MENU,
                    M.Nombre_Menu as NOMBRE_MENU,
                    M.Url_Menu as URL_MENU,
                    M.Url_Menu as Url_MENU
                    FROM menu M 
                    WHERE M.Id_Menu NOT IN (SELECT UM.Id_Menu FROM usuario_menu UM WHERE UM.Id_Usuario = '$usuario')";
		$_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
			 $_listModulos['Modulos'][] = $_row;
    }
		return $_listModulos;
  }

public function listarPermisos($usuario){
    $_consult = "SELECT 
                    UM.Id_Menu_Usuario AS MENU_USUARIO,
                    UM.Id_Menu AS ID_MENU,
                    UM.Id_Usuario AS USUARIO,
                    M.Nombre_Menu AS NOMBRE_MENU,
                    M.Url_Menu AS URL_MENU
                FROM usuario_menu UM
                    INNER JOIN menu M ON UM.Id_Menu = M.Id_Menu
                WHERE UM.Id_Usuario = '$usuario' ORDER BY UM.Id_Usuario, M.Id_Menu ";
    $_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
            $_listPermiso['Permisos'][] = $_row;
    }
    return $_listPermiso;
}

public function nombrePermiso($usuario){
    $_consult = "SELECT CONCAT(Nombre_Usuario,' ',Paterno_Usuario,' ',Materno_Usuario) as Nombre_Usuario, Id_Usuario FROM usuarios WHERE Id_Usuario = '$usuario' ";
    $_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
            $_listPermiso['Usuario_Permiso'][] = $_row;
    }
    return $_listPermiso;
}

public function agregarPermiso($usuario,$modulo){
  $_consult = "INSERT INTO usuario_menu (Id_Usuario, Id_Menu) VALUES ('$usuario','$modulo')";
  if($this->_modelo->functionCrud($_consult)){
    $_addPermiso['success'] = 1;
    $_addPermiso['message'] = 'Permiso añadido correctamente';
    }else{
        $_addPermiso['success'] = 0;
        $_addPermiso['message'] = 'Error al añadir permiso';
    }
  return $_addPermiso;
}

public function eliminarPermiso($usuario,$modulo){
  $_consult = "DELETE FROM usuario_menu WHERE Id_Usuario = '$usuario' AND Id_Menu = '$modulo' ";
  if($this->_modelo->functionCrud($_consult)){
    $_deletePermiso['success'] = 1;
    $_deletePermiso['message'] = 'Permiso eliminado correctamente';
    }else{
        $_deletePermiso['success'] = 0;
        $_deletePermiso['message'] = 'Error al eliminar permiso';
    }
  return $_deletePermiso;
}
  


}
?>
