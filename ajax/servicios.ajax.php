<?php

require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";

class AjaxServicios{

	/*=============================================
	BUSCAR SERVICIO
	=============================================*/	
        
        public $idServicio;
        
        public function ajaxBuscarServicio(){
            $item = "idser";
            $valor = $this->idServicio;
            
            $respuesta = ControladorServicios::ctrMostrarServicios($item, $valor);
            
            echo json_encode($respuesta);
            
        }
        
        public function ajaxBuscarServicio2(){
            $tabla = "servicio";
            $item = "idser";
            $valor = $this->idServicio;
            
            $respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
            
            $datos = array("exito" => "si", "data" => $respuesta);
            
            echo json_encode($datos);
            
        }
        
        /*=============================================
	EDITAR SERVICIO
	=============================================*/	

	//public $idServicio2;

	public function ajaxEditarServicio(){

		$item = "idser";
		$valor = $this->idServicio;

		$respuesta = ControladorServicios::ctrMostrarServicios($item, $valor);

		echo json_encode($respuesta);

	}
        
        /*=============================================
        BORRAR SERVICIO
	=============================================*/	
        
        public function ajaxBorrarServicio(){
            
            $item = "idser";
            $valor = $this->idServicio;
            
            $respuesta = ControladorServicios::ctrBorrarServicio($item, $valor);
            
            echo json_encode($respuesta);
            
        }
        

}

/*=============================================
BUSCAR SERVICIO 
=============================================*/
/*if(isset($_POST['idser'])){
    $buscar = new AjaxServicios();
    $buscar->idServicio = $_POST['idser'];
    $buscar->ajaxBuscarServicio();
}*/

/*=============================================
EDITAR SERVICIO 
=============================================*/

if(isset($_POST["idServicio"])){
    $editar = new AjaxServicios();
    $editar -> idServicio = $_POST["idServicio"];
    $editar -> ajaxEditarServicio();
    
}

/*=============================================
BORRAR SERVICIO 
=============================================*/

/*if(isset($_GET["idServicio"])){
    $borrar = new AjaxServicios();
    
}*/

/*=============================================
CREAR SERVICIO (AJAX) 
=============================================*/

/*if(isset($_POST["nombre"])){
    $tabla = "servicio";
    $datos = array(
        "nomser" => $_POST["nombre"],
        "desser" => $_POST["descri"],
        "traser" => $_POST["trabaj"],
        "precio" => $_POST["precio"],
        "stsser" => 'Activo',
    );
    
    $respuesta = ModeloServicios::mdlCrearServicio($tabla, $datos);
    
    
    echo json_encode($respuesta);
}*/

/*=============================================
TRAER TODO 
=============================================*/

if(isset($_POST["idServi"])){
    $tabla = "servicio";
    $item = null;
    $valor = null;
    
    $respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
    
    echo json_encode($respuesta);
}

/*=============================================
BUSCAR SERVICIO 
=============================================*/

/*if(isset($_POST["idSer"])){
    $buscarServicio = new AjaxServicios();
    $buscar->idServicio = $_POST["idSer"];
    $buscar->ajaxBuscarServicio2();
}*/

if(isset($_POST["accion"])){
    if($_POST["accion"] === "guardarservicio"){
        
        $tabla = "servicio";
        $datos = array(
            "nomser" => $_POST["nuevonombre"],
            "desser" => $_POST["nuevodescri"],
            "traser" => $_POST["nuevotrabaj"],
            "conser"  => $_POST["nuevocondi"],
            "precio" => $_POST["nuevoprecio"],
            "stsser" => "Activo",
        );

        $respuesta = ModeloServicios::mdlCrearServicio($tabla, $datos);
        
        echo json_encode($respuesta);
    }
    
    if($_POST["accion"] === "buscarservicio"){
        $tabla = "servicio";
        $item = "idser";
        $valor = $_POST["idSer"];
        
        $respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    if($_POST["accion"] === "buscarservicio2"){
        $tabla = "servicio";
        $item = null;
        $valor = null;
        
        $respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    if($_POST["accion"] === "actualizarservicio"){
        $tabla = "servicio";
        $datos = array(
            "idser" => $_POST["idser"],
            "nomser" => $_POST["nomser"],
            "preser" => $_POST["preser"],
            "desser" => $_POST["desser"] != "" ? $_POST["desser"] : "",
            "traser" => $_POST["traser"] != "" ? $_POST["traser"] : ""
        );
        
        $respuesta = ModeloServicios::mdlEditarServicio($tabla, $datos);
        
        echo json_encode($respuesta);
    }
	
    if($_POST["accion"] === "eliminarservicio"){
        $tabla = "servicio";
	$datos = $_POST["idSer"];
		
	$respuesta = ModeloServicios::mdlBorrarServicio($tabla, $datos);
		
	echo json_encode($respuesta);
    }
    
    if($_POST["accion"] === "eeliminarservicio"){
        $tabla = "servicio";
        $datos = $_POST["idSer"];
        
        $respuesta = ModeloServicios::mdlBorrarServicio($tabla, $datos);
        
        echo json_encode($respuesta);
    }
}