<?php

require_once "../controladores/gastos.controlador.php";
require_once "../controladores/clientes.controlador.php";
require_once "../controladores/cotizaciones.controlador.php";
require_once "../controladores/tecnicos.controlador.php";
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/gastos.modelo.php";
require_once "../modelos/clientes.modelo.php";
require_once "../modelos/cotizaciones.modelo.php";
require_once "../modelos/tecnicos.modelo.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxGastos {
    
    /*=============================================
    BUSCAR LAS AGENCIAS QUE LE PERTENECEN
    =============================================*/	
    
    public $buscarAgencia;
    
    public function ajaxBuscarAgencia(){
        $item = "idcli";
        $valor = $this->buscarAgencia;
        $respuesta = ControladorClientes::ctrBuscarAgencia($item, $valor);
        echo json_encode($respuesta);
    }
    
    /*=============================================
        VERIFICAR SI EXISTE GASTO 
    =============================================*/	
    
    public $buscarGasto;
    
    public function ajaxBuscarGasto(){
        $item = "numgas";
        $valor = $this->buscarGasto;
        $respuesta = ControladorGastos::ctrMostrarGastos($item, $valor);
        if($respuesta){
            echo json_encode(array("existe" => "si"));
        }
        else{
            echo json_encode(array("existe" => "no"));
        }
    }
    
    /*=============================================
        BUSCAR GASTO 
    =============================================*/	
    
    public function ajaxBuscarGasto2(){
        $item = "numgas";
        $valor = $this->buscarGasto;
        $respuesta = ControladorGastos::ctrMostrarGastos($item, $valor);
        
        $tabla = "cotizacioncab";
        $item = "id";
        $valor = $respuesta["numcot"];
        $cotizacion = ModeloCotizaciones::mdlMostrarCotizaciones($tabla, $item, $valor);
        
        $tabla = "usuarios";
        $item = "id";
        $valor = $respuesta["tecnico"];
        
        $registro = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        
        $tecnico = array("id" => $registro["id"], "dni" => $registro["dni"], "nombre" => $registro["nombre"]);
        
        $tabla = "cliente";
        $item = "idcli";
        $valor = $respuesta["cliente"];
        
        $cliente = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        
        
        $respuesta["pag02"] = number_format(($respuesta["pagtec"] - $respuesta["pag01"]), 2);
        
        
        echo json_encode(array("gastos" => $respuesta, "cotizacion" => $cotizacion, "tecnico" => $tecnico, "cliente" => $cliente));
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
            
            
            $tabla2 = "cotizaciondet";
            $item2 = "cotcab";
            $idcotizacion = $cotizacion["id"];
            
            $detalle = ModeloCotizaciones::mdlBuscarDetalleCotizacion($tabla2, $item2, $idcotizacion);
            
            $cliente = ModeloClientes::mdlMostrarClientes("cliente", "idcli", $cotizacion["cliente"]);
            
            echo json_encode(array("cotizacion" => $cotizacion, "detalle" => $detalle, "cliente" => $cliente));
        }
       
}

/*=============================================
    BUSCAR LAS AGENCIAS QUE LE PERTENECEN
=============================================*/	

if(isset($_POST['bcliente'])){
    $buAgencia = new AjaxGastos();
    $buAgencia->buscarAgencia = $_POST['bcliente'];
    $buAgencia->ajaxBuscarAgencia();
}

/*=============================================
    VERIFICAR SI EXISTE GASTO
=============================================*/	

if(isset($_POST['bnumgas'])){
    $buNumGasto = new AjaxGastos();
    $buNumGasto->buscarGasto = $_POST['bnumgas'];
    $buNumGasto->ajaxBuscarGasto();
}

/*=============================================
    BUSCAR GASTO
=============================================*/	

if(isset($_POST['numgasto'])){
    $buNumGasto = new AjaxGastos();
    $buNumGasto->buscarGasto = $_POST['numgasto'];
    $buNumGasto->ajaxBuscarGasto2();
}


if(isset($_POST["accion"])){
    if($_POST["accion"] === "buscarcotizacion"){
        $buscarCotizacion = new AjaxCotizaciones();
        $buscarCotizacion->buscarCotizacion = $_POST["idCotizacion"];
        $buscarCotizacion->ajaxBuscarCotizacion();
    }
}
