<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once('../modelos/suscriptores.php');
require_once('../modelos/usuarios.php');
require_once('../modelos/permisos.php');
require_once('../modelos/carpetas.php');
require_once('../modelos/categorias_doc.php');

require_once('../vendor/autoload.php');
$app = new \Slim\App;

/* FUNCIONES PARA LOS SUSCRIPTORES*/
$app->get('/suscriptores', function(Request $request, Response $response, array $args){ ////FUNCIONES DE ALUMNOS////
    $_suscriptor = new Suscriptores();
    $_resultSus = $_suscriptor->listarSuscriptores();
    echo json_encode($_resultSus);
});

$app->post('/suscriptores/guardar', function(Request $request, Response $response, array $args){ //// FUNCIONES PARA REGISTRAR SUSCRIPTORES ////
      $_suscriptor = new Suscriptores();
      $_resultadd = $_suscriptor->addSuscriptor($request->getParsedBody()['correo']);
    echo json_encode($_resultadd);
});

$app->delete('/suscriptores/eliminar', function(Request $request, Response $response, array $args){ //// FUNCIONES PARA ELIMINAR SUSCRIPTORES ////
      $_suscriptor = new Suscriptores();
      $_resultDelete = $_suscriptor->deleteSuscriptor($request->getParsedBody()['id']);
    echo json_encode($_resultDelete);
});

$app->get('/suscriptores/descarga', function(Request $request, Response $response, array $args){ 
    $_suscriptor = new Suscriptores();
    $_resultSus = $_suscriptor->descargarSuscriptores();
});


/*FUNCIONES PARA LOS USUARIOS*/

$app->get('/usuarios', function(Request $request, Response $response, array $args){ 
    $_usuario = new Usuarios();
    $_resultUsu = $_usuario->listarUsuarios();
    echo json_encode($_resultUsu);
});


$app->get('/usuario/{id}', function(Request $request, Response $response, array $args){
    $_id = $request->getAttribute('id');
    $_usuario = new Usuarios();
    $_resultGetU = $_usuario->busquedaUsuario($_id);
    echo json_encode($_resultGetU);
});

$app->delete('/usuario/eliminar', function(Request $request, Response $response, array $args){ 
    $_usuario = new Usuarios();
    $_resultEli = $_usuario->eliminarUsuario($request->getParsedBody()['id'],$request->getParsedBody()['operador']);
    echo json_encode($_resultEli);
});

$app->post('/usuarios/agregar', function(Request $request, Response $response, array $args){ 
    $_usuario = new Usuarios();
    $_resultadd = $_usuario->addUsuario($request->getParsedBody()['nombre'],
                                           $request->getParsedBody()['paterno'],
                                           $request->getParsedBody()['materno'],
                                           $request->getParsedBody()['correo'],
                                           $request->getParsedBody()['telefono'],
                                           $request->getParsedBody()['usuario'],
                                           $request->getParsedBody()['contrasena'],
                                           $request->getParsedBody()['nivel'],
                                           $request->getParsedBody()['operador']);
  echo json_encode($_resultadd);
});

$app->put('/usuario/editar', function(Request $request, Response $response, array $args){ 
    $_usuario = new Usuarios();
    $_resultedit = $_usuario->editUsuario($request->getParsedBody()['nombre'],
                                           $request->getParsedBody()['paterno'],
                                           $request->getParsedBody()['materno'],
                                           $request->getParsedBody()['correo'],
                                           $request->getParsedBody()['telefono'],
                                           $request->getParsedBody()['usuario'],
                                           $request->getParsedBody()['contrasena'],
                                           $request->getParsedBody()['empresa'],
                                           $request->getParsedBody()['razon'],
                                           $request->getParsedBody()['rfc'],
                                           $request->getParsedBody()['direccion'],
                                           $request->getParsedBody()['ciudad'],
                                           $request->getParsedBody()['estado'],
                                           $request->getParsedBody()['nivel'],
                                           $request->getParsedBody()['operador'],
                                           $request->getParsedBody()['id_usuario']);
  echo json_encode($_resultedit);
});

/*FUNCIION PARA EDITAR CONTRASEÑA */

$app->put('/usuario/editar/pwd', function(Request $request, Response $response, array $args){ 
    $_usuario = new Usuarios();
    $_resultedit = $_usuario->editPwd($request->getParsedBody()['usuario'],$request->getParsedBody()['contrasena']);
  echo json_encode($_resultedit);
});


/* FUNCIONES DE MODULOS */

$app->get('/modulos/{usuario}', function(Request $request, Response $response, array $args){
    $user = $request->getAttribute('usuario');
    $_permisos = new Permisos();
    $_resultModulo = $_permisos->listarModulos($user);
    echo json_encode($_resultModulo);
});

$app->get('/permisos/{usuario}', function(Request $request, Response $response, array $args){
    $user = $request->getAttribute('usuario');
    $_permisos = new Permisos();
    $_resultPermiso = $_permisos->listarPermisos($user);
    echo json_encode($_resultPermiso);
});

$app->get('/permiso/usuario/{usuario}', function(Request $request, Response $response, array $args){
    $user = $request->getAttribute('usuario');
    $_permisos = new Permisos();
    $_resultNombre = $_permisos->nombrePermiso($user);
    echo json_encode($_resultNombre);
});

$app->delete('/permiso/eliminar', function(Request $request, Response $response, array $args){ 
    $_permisos = new Permisos();
    $_resultEli = $_permisos->eliminarPermiso($request->getParsedBody()['usuario'],$request->getParsedBody()['modulo']);
    echo json_encode($_resultEli);
});

$app->post('/permiso/agregar', function(Request $request, Response $response, array $args){ 
    $_permisos = new Permisos();
    $_resultAdd = $_permisos->agregarPermiso($request->getParsedBody()['usuario'],$request->getParsedBody()['modulo']);
    echo json_encode($_resultAdd);
});

/* INICIAR SESIÓN DE USUARIO */
$app->post('/usuario/login', function(Request $request, Response $response, array $args){ 
    $_usuario = new Usuarios();
    $_loginUsuario = $_usuario->loginUsuario($request->getParsedBody()['usuario'],$request->getParsedBody()['password']);
    echo json_encode($_loginUsuario);
});

$app->get('/categorias', function(Request $request, Response $response, array $args){ // OBTENER CATEGORIAS DE DOCUMENTOS
    $_categoria = new CategoriasDoc();
    $_resultCat = $_categoria->listarCategorias();
    echo json_encode($_resultCat);
});

$app->post('/verArchivos', function(Request $request, Response $response, array $args){ // OBTENER LISTA DE ARCHIVOS
    $_carpeta = new Carpetas();
    $_resultCarp = $_carpeta->verArchivosCargados($request->getParsedBody()['cliente'],
                                                  $request->getParsedBody()['modo'],
                                                  $request->getParsedBody()['categoria']);
    echo json_encode($_resultCarp);
});

$app->delete('/eliminarArchivo', function(Request $request, Response $response, array $args){ // OBTENER LISTA DE ARCHIVOS
    $_carpeta = new Carpetas();
    $_deleteArchivo = $_carpeta->eliminarArchivo($request->getParsedBody()['archivo']);
    echo json_encode($_deleteArchivo);
});

$app->post('/carpeta/agregar', function(Request $request, Response $response, array $args){ // OBTENER LISTA DE ARCHIVOS
    $_carpeta = new Carpetas();
    $_resultCarp = $_carpeta->addCarpeta($request->getParsedBody()['carpeta']);
    echo json_encode($_resultCarp);
});

$app->delete('/carpeta/eliminar', function(Request $request, Response $response, array $args){ // OBTENER LISTA DE ARCHIVOS
    $_carpeta = new Carpetas();
    $_deleteCarpeta = $_carpeta->deleteCarpeta($request->getParsedBody()['carpeta']);
    echo json_encode($_deleteCarpeta);
});

$app->run();

?>
