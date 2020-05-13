<?php
session_start();

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                
                if($respuesta){
                    echo json_encode(array("existe" => "si"));
                }
                else{
                    echo json_encode(array("existe" => "no"));
                }
		
	}

	/*=============================================
	BUSCAR USUARIO
	=============================================*/	
        
        public $buscarUsuario;
        
	public function ajaxBuscarUsuario(){
            $tabla = "usuarios";
            $item = "usuario";
            $valor = $this->buscarUsuario;
            
            $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
            
            echo json_encode($respuesta);
        }
        
        
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}

if(isset($_POST["usuario"])){
    $buscarUsuario = new AjaxUsuarios();
    $buscarUsuario->buscarUsuario = $_POST["usuario"];
    $buscarUsuario->ajaxBuscarUsuario();
}

if(isset($_POST["accion"])){
    if($_POST["accion"] === "cargarusuario"){
        $buscarUsuario = new AjaxUsuarios();
        $buscarUsuario->buscarUsuario = $_SESSION["usuario"];
        $buscarUsuario->ajaxBuscarUsuario();
    }
}
