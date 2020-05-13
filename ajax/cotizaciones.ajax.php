<?php

require_once "../controladores/cotizaciones.controlador.php";
require_once "../controladores/servicios.controlador.php";
require_once "../controladores/sedes.controlador.php";
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";
require_once "../modelos/servicios.modelo.php";
require_once "../modelos/sedes.modelo.php";
require_once "../modelos/clientes.modelo.php";

class AjaxCotizaciones{
	
	/*=============================================
	VALIDAR NO REPETIR COTIZACION
	=============================================*/	

	public $validarCotizacion;

	public function ajaxValidarCotizacion(){

		$item = "numcot";
		$valor = $this->validarCotizacion;

		$respuesta = ControladorCotizaciones::ctrMostrarCotizaciones($item, $valor);

                if($respuesta){
                    echo json_encode(array("existe" => "si", "datos" => $respuesta));
                }
                else{
                    echo json_encode(array("existe" => "no"));
                }
		

	}

	/*=============================================
	REGISTRAR UNA COTIZACIÓN
	=============================================*/	
	
	public function ajaxCrearCotizacion(){ 
              $tabla = "cotizacioncab";
              $datos = array(
                   "numcot" => $_POST["numcot"],
                   "feccot" => $_POST["feccot"],
                   "cliente" => $_POST["cliente"],
                  "agencia" => $_POST["agencia"],
                   "numtic" => $_POST["numtic"],
                   //"codigos" => $_POST["codigos"],
                   "nombres" => $_POST["nombres"],
                  "cantidades" => $_POST["cantidades"],
                   "precios" => $_POST["precios"],
                  "descripciones" => $_POST["descripciones"],
                  "trabajos" => $_POST["trabajos"],
                  "moneda" => $_POST["moneda"],
                   "subtotal" => $_POST["subtotal"],
                   "igv" => $_POST["igv"],
                   "total" => $_POST["total"],
                   "descuento" => $_POST["descuento"],
                  "atencion" => $_POST["atencion"]
              );
              
              $respuesta = ModeloCotizaciones::mdlCrearCotizacion($tabla, $datos);
              
              
              
              echo json_encode($respuesta);
        }
        
        /*=============================================
        BUSCAR UNA COTIZACIÓN
        =============================================*/
        
        public $buscarCotizacion;


        public function ajaxBuscarCotizacion(){
            $item = "numcot";
            $valor = $this->buscarCotizacion;
            $tabla = "cotizacioncab";
            
            $cotizacion = ModeloCotizaciones::mdlMostrarCotizaciones($tabla, $item, $valor);
            
            if($cotizacion){
                $tabla2 = "cotizaciondet";
                $item2 = "cotcab";
                $idcotizacion = $cotizacion["id"];

                $detalle = ModeloCotizaciones::mdlBuscarDetalleCotizacion($tabla2, $item2, $idcotizacion);

                $cliente = ModeloClientes::mdlMostrarClientes("cliente", "idcli", $cotizacion["cliente"]);

                echo json_encode(array("respuesta" => "ok", "cotizacion" => $cotizacion, "detalle" => $detalle, "cliente" => $cliente));
            }
            else{
                echo json_encode(array("respuesta" => "error"));
            }
        }
        
        public function ajaxBuscarCotizacion2(){
            $item = "numcot";
            $valor = $this->buscarCotizacion;
            $tabla = "cotizacioncab";
            
            $cotizacion = ModeloCotizaciones::mdlBuscarCotizacion($tabla, $item, $valor);
            
            
            $tabla2 = "cotizaciondet";
            $item2 = "cotcab";
            $idcotizacion = $cotizacion["id"];
            
            $detalle = ModeloCotizaciones::mdlBuscarDetalleCotizacion($tabla2, $item2, $idcotizacion);
            
            echo json_encode(array("cotizacion" => $cotizacion, "detalle" => $detalle));
        }
        


        /*=============================================
        EDITAR UNA COTIZACIÓN
        =============================================*/
        
        public function ajaxActualizarCotizacion(){
            $tabla = "cotizacioncab";
            $datos = array(
                   "numcot" => $_POST["enumcot"],
                   "feccot" => $_POST["efeccot"],
                   "cliente" => $_POST["ecliente"],
                    "agencia" => $_POST["eagencia"],
                   "numtic" => $_POST["enumtic"],
                   "codigos" => $_POST["codigos"],
                   "codigose" => $_POST["codigose"],
                   "nombres" => $_POST["nombres"],
                   "precios" => $_POST["precios"],
                    "cantidades" => $_POST["cantidades"],
                    "descripciones" => $_POST["descripciones"],
                    "trabajos" => $_POST["trabajos"],
                    "nuevos" => $_POST["nuevos"],
                   "subtotal" => $_POST["esubtotal"],
                   "igv" => $_POST["eigv"],
                   "total" => $_POST["etotal"],
                   "descuento" => $_POST["edescuento"],
                    "moneda"   => $_POST["moneda"]
              );
            
            $respuesta = ModeloCotizaciones::mdlActualizarCotizacion($tabla, $datos);
            
            echo json_encode($respuesta);
        }
        
        /*=============================================
        ELIMINAR SERVICIO
        =============================================*/
        
        public $idservicio;
        
        public function ajaxEliminarServicio(){
            $tabla = "cotizaciondet";
            $datos = $this->idServicio;
            
            $respuesta = ModeloCotizaciones::mdlBorrarServicio($tabla, $datos);
            
            echo json_encode($respuesta);
        }
        
        /*=============================================
        BUSCAR SERVICIO
        =============================================*/
        
        public function ajaxBuscarServicio(){
            $tabla = "cotizaciondet";
            $item = "id";
            $valor = $this->idservicio;
            
            $respuesta = ModeloCotizaciones::mdlBuscarServicio($tabla, $item, $valor);
            
            echo json_encode($respuesta);
        }
        
        /*=============================================
        ACTUALIZAR SERVICIO
        =============================================*/
        
        public $actualizarServicio;
        
        public function ajaxActualizarServicio(){
            $tabla = "cotizaciondet";
            
            $datos = array(
                "idser" => $this->actualizarServicio,
                "preuni" => $_POST["preser"],
                "nomser" => $_POST["nomser"],
                "desser" => $_POST["desser"],
                "traser" => $_POST["traser"]
            );
            
            $respuesta = ModeloCotizaciones::mdlActualizarServicio($tabla, $datos);
            
            echo json_encode($respuesta);
        }
        
        /*=============================================
        ACTUALIZAR SERVICIO
        =============================================*/
        
        public $actualizarEServicio;
        
        public function ajaxActualizarEServicio(){
            $tabla = "cotizaciondet";
            
            $datos = array(
                "idser" => $this->actualizarEServicio,
                "canser" => $_POST["canser"],
                "preuni" => $_POST["preser"],
                "nomser" => $_POST["nomser"],
                "desser" => $_POST["desser"],
                "traser" => $_POST["traser"]
            );
            
            $respuesta = ModeloCotizaciones::mdlActualizarServicio($tabla, $datos);
            
            echo json_encode($respuesta);
        }
        
        /*=============================================
        ANULAR SERVICIO
        =============================================*/
        
        public $idcotizacion;
        
        public function ajaxAnularCotizacion(){
            $tabla = "cotizacioncab";
            $dato = $this->idcotizacion;
            
            $respuesta = ModeloCotizaciones::mdlAnularCotizacion($tabla, $dato);
            
            echo json_encode($respuesta);
        }
}


/*=============================================
VALIDAR NO REPETIR COTIZACION
=============================================*/

if(isset($_POST["bnumcot"])){

	$valCotizacion = new AjaxCotizaciones();
	$valCotizacion -> validarCotizacion = $_POST["bnumcot"];
	$valCotizacion -> ajaxValidarCotizacion();

}

/*=============================================
REGISTRAR UNA COTIZACIÓN
=============================================*/

if(isset($_POST['numcot'])){
    $crearCotizacion = new AjaxCotizaciones();
    $crearCotizacion->ajaxCrearCotizacion();
}


/*=============================================
ACTUALIZAR UNA COTIZACIÓN
=============================================*/

if(isset($_POST['enumcot'])){
    $actualizarCotizacion = new AjaxCotizaciones();
    $actualizarCotizacion->ajaxActualizarCotizacion();
}

if(isset($_POST["accion"])){
    
    /*=============================================
        BUSCAR UNA COTIZACIÓN
    =============================================*/
    if($_POST["accion"] === "buscarcotizacion"){
        $buscarCotizacion = new AjaxCotizaciones();
        $buscarCotizacion->buscarCotizacion = $_POST["idCotizacion"];
        $buscarCotizacion->ajaxBuscarCotizacion();
        //echo json_encode(array("mensaje"=>"hola"));
    }
    
    /*=============================================
        BUSCAR UNA COTIZACIÓN GASTOS
    =============================================*/
    if($_POST["accion"] === "buscarcotizaciongastos"){
        $buscarCotizacion = new AjaxCotizaciones();
        $buscarCotizacion->buscarCotizacion = $_POST["idCotizacion"];
        $buscarCotizacion->ajaxBuscarCotizacion();
        //echo json_encode(array("mensaje"=>"hola"));
    }
    
    /*=============================================
        EDITAR UNA COTIZACIÓN
    =============================================*/
    if($_POST["accion"] === "editarcotizacion"){
        
        
    }
    if($_POST["accion"] === "eliminarcotizacion"){
        
    }
    
    if($_POST["accion"] === "eliminarservicio"){
        $eliminarServicio = new AjaxCotizaciones();
        $eliminarServicio->idServicio = $_POST["idServicio"];
        $eliminarServicio->ajaxEliminarServicio();
    }
    
    if($_POST["accion"] === "buscarservicio"){
        $buscarServicio = new AjaxCotizaciones();
        $buscarServicio->idservicio = $_POST["idSer"];
        $buscarServicio->ajaxBuscarServicio();
    }
    
    if($_POST["accion"] === "actualizarservicio"){
        $actualizarServicio = new AjaxCotizaciones();
        $actualizarServicio->actualizarServicio = $_POST["idser"];
        $actualizarServicio->ajaxActualizarServicio();
    }
    
    if($_POST["accion"] === "actualizarEservicio"){
        $actualizarServicio = new AjaxCotizaciones();
        $actualizarServicio->actualizarEServicio = $_POST["idser"];
        $actualizarServicio->ajaxActualizarEServicio();
    }
    
    if($_POST["accion"] === "anularcotizacion"){
        $anularCotizacion = new AjaxCotizaciones();
        $anularCotizacion->idcotizacion = $_POST["idCotizacion"];
        $anularCotizacion->ajaxAnularCotizacion();
    }
}
