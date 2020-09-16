<?php
require_once('../modelos/iModel.php');

class Usuarios{

  public function __construct(){
      $_listUsuarios = array();
      $_listUsuario = array();
      $_addUsuario = array();
      $_editUsuario = array();
      $_editPwd = array();
      $_deleteUsuario = array();
      $_loginEmpleado = array();
      $this->_modelo = new Model();
  }

  public function listarUsuarios(){
		$_consult = "SELECT * FROM usuarios WHERE Estado_Usuario = 'AC'";
		$_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
			 $_listUsuarios['Usuarios'][] = $_row;
    }
		return $_listUsuarios;
  }
  

  public function busquedaUsuario($id){
		$_consult = "SELECT *, IFNULL((SELECT Us.User_Usuario FROM usuarios Us WHERE Us.Id_Usuario = U.Alta_Usuario),'---') as Operador_Alta,
    IFNULL((SELECT Us.User_Usuario FROM usuarios Us WHERE Us.Id_Usuario = U.Baja_Usuario),'---') as Operador_Baja,
    IFNULL((SELECT Us.User_Usuario FROM usuarios Us WHERE Us.Id_Usuario = U.Modif_Usuario),'---') as Operador_Modif
       FROM usuarios U WHERE U.Estado_Usuario = 'AC' AND U.Id_Usuario = '$id'";
		$_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
			 $_listUsuario['Usuario'][] = $_row;
    }
		return $_listUsuario;
	}

  public function addUsuario($nombre,$paterno,$materno,$correo,$telefono,$usuario,$contrasena,$nivel,$operador){
    $_consult = "INSERT INTO usuarios (Nombre_Usuario,Paterno_Usuario,Materno_Usuario,Correo_Usuario,Telefono_Usuario,User_Usuario,Contra_Usuario,Nivel_Usuario,Alta_Usuario,Empresa_Usuario,Alta_Fecha)
                 VALUES ('$nombre','$paterno','$materno','$correo','$telefono','$usuario','$contrasena','$nivel','$operador','',CURRENT_TIMESTAMP)";
    if($this->checkUsuario($nombre,$paterno,$materno,$correo)){
      $_addUsuario['success'] = 0;
      $_addUsuario['message'] = "Ya existe un usuario con estos datos";
    }else{
          if($this->_modelo->functionCrud($_consult)){
                $_addUsuario['success'] = 1;
                $_addUsuario['message'] = "Usuario agregado correctamente";
          }else{
                $_addUsuario['success'] = 0;
                $_addUsuario['message'] = "Error al agregar usuario. Intentalo más tarde";
          }
    }
    return $_addUsuario;
  }

 

  public function editUsuario($nombre,$paterno,$materno,$correo,$telefono,$usuario,$contrasena,$empresa,$razon,$rfc,$direccion,$ciudad,$estado,$nivel,$operador,$id_usuario){

    $_consult = "UPDATE usuarios SET Nombre_Usuario = '$nombre',
                                     Paterno_Usuario = '$paterno',
                                     Materno_Usuario = '$materno',
                                     Correo_Usuario = '$correo',
                                     Telefono_Usuario = '$telefono',
                                     User_Usuario = '$usuario',
                                     Contra_Usuario = '$contrasena',
                                     Empresa_Usuario = '$empresa',
                                     Nivel_Usuario = '$nivel',
                                     Razon_Usuario = '$razon',
                                     Rfc_Usuario = '$rfc',
                                     Direccion_Usuario = '$direccion',
                                     Ciudad_Usuario = '$ciudad',
                                     Estado_Lu_Usuario = '$estado',
                                     Modif_Usuario = '$operador',
                                     Modif_Fecha = CURRENT_TIMESTAMP
                                     WHERE Id_Usuario = '$id_usuario' ";

    if($this->checkUsuarioUpdate($nombre,$paterno,$materno,$correo,$id_usuario)){
      $_editUsuario['success'] = 0;
      $_editUsuario['message'] = "Ya existe un usuario con estos datos";
    }else{
          if($this->_modelo->functionCrud($_consult)){
                $_editUsuario['success'] = 1;
                $_editUsuario['message'] = "Usuario editado correctamente";
          }else{
                $_editUsuario['success'] = 0;
                $_editUsuario['message'] = "Error al editar usuario. Intentalo más tarde";
          }
    }
    return $_editUsuario;
  }


  public function editPwd($usuario,$contrasena){
    $_consult = "UPDATE usuarios SET Contra_Usuario = '$contrasena' WHERE Id_Usuario = '$usuario' ";

    if($this->_modelo->functionCrud($_consult)){
      $_editPwd['success'] = 1;
      $_editPwd['message'] = "Contraseña actualizado correctamente";
    }else{
      $_editPwd['success'] = 0;
      $_editPwd['message'] = "Error al editar contraseña. Intentalo más tarde";
    }
    return $_editPwd;
  }


  public function checkUsuario($nombre,$paterno,$materno,$correo){
    $_consult = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$nombre' AND Paterno_Usuario = '$paterno' AND Materno_Usuario = '$materno' AND Correo_Usuario = '$correo' AND Estado_Usuario = 'AC' ";
    $_result = $this->_modelo->totalValues($_consult);
    if($_result > 0){
        return true;
    }else{
      return false;
    }
}

public function checkUsuarioUpdate($nombre,$paterno,$materno,$correo,$id_usuario){
  $_consult = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$nombre' AND Paterno_Usuario = '$paterno' AND Materno_Usuario = '$materno' AND Correo_Usuario = '$correo' AND Estado_Usuario = 'AC' AND Id_Usuario != '$id_usuario' ";
  $_result = $this->_modelo->totalValues($_consult);
  if($_result > 0){
      return true;
  }else{
    return false;
  }
}

public function eliminarUsuario($id,$operador){
  $_consult = "UPDATE usuarios SET Estado_Usuario = 'BA', Baja_Usuario = '$operador', Baja_Fecha = CURRENT_TIMESTAMP WHERE Id_Usuario = '$id'";
    if($this->_modelo->functionCrud($_consult)){
        $_deleteUsuario['success'] = 1;
        $_deleteUsuario['message'] = "Usuario eliminado correctamente";
    }else{
       $_deleteUsuario['success'] = 0;
       $_deleteUsuario['message'] = "Error al eliminar al usuario. Intentalo más tarde";
    }
  return $_deleteUsuario;
}

public function loginUsuario($usuario,$password){
    $consulta="SELECT Id_Usuario, Nombre_Usuario, Paterno_Usuario, Materno_Usuario, User_Usuario, Nivel_Usuario, Contra_Usuario FROM usuarios WHERE User_Usuario = '$usuario' AND Contra_Usuario = '$password' AND Estado_Usuario = 'AC' ";
      $result = $this->_modelo->totalValues($consulta);
        if($result == 1){
          $result_empleado = $this->_modelo->getValues($consulta);
          if($result_empleado['Contra_Usuario'] === $password){
              $loginEmpleado['Login']['success'] = 1;
              $loginEmpleado['Login']['message'] = "Acceso correcto!";
              $loginEmpleado['Login']['Id'] = $result_empleado['Id_Usuario'];
              $loginEmpleado['Login']['Usuario'] = $result_empleado['User_Usuario'];
              $loginEmpleado['Login']['Nombre'] = $result_empleado['Nombre_Usuario']." ".$result_empleado['Paterno_Usuario']." ".$result_empleado['Materno_Usuario'];
              $loginEmpleado['Login']['Perfil'] = $result_empleado['Nivel_Usuario'];
              $loginEmpleado['Login']['Pass'] = $result_empleado['Contra_Usuario'];
          }else{
              $loginEmpleado['Login']['success'] = 0;
              $loginEmpleado['Login']['message'] = "Acceso Incorrecto!";
            }

        }else{
          $loginEmpleado['Login']['success'] = 0;
          $loginEmpleado['Login']['message'] = "Acceso Incorrecto!";
        }
  

  return $loginEmpleado;
}





}
?>
