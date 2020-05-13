<?php

require_once "../controladores/clientes.controlador.php";
require_once "../controladores/cotizaciones.controlador.php";
require_once "../controladores/controles.controlador.php";
require_once "../controladores/sedes.controlador.php";
require_once "../controladores/usuarios.controlador.php";

require_once "../modelos/clientes.modelo.php";
require_once "../modelos/cotizaciones.modelo.php";
require_once "../modelos/controles.modelo.php";
require_once "../modelos/sedes.modelo.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxControles {
    
    /*=============================================
    BUSCAR LAS AGENCIAS
    =============================================*/	
    
    public $buscarAgencia;
    
    public function ajaxBuscarAgencia(){
        $item = "idcli";
        $valor = $this->buscarAgencia;
        $respuesta = ControladorClientes::ctrBuscarAgencia($item, $valor);
        echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR COTIZACION
    =============================================*/	
    
    public $buscarCotizacion;
    
    public function ajaxBuscarCotizacion(){
        $item = "numcot";
        $valor = $this->buscarCotizacion;
        $respuesta = ControladorCotizaciones::ctrMostrarCotizaciones($item, $valor);
        
        if($respuesta){
            echo json_encode(array("existe" => "si"));
        }
        else{
            echo json_encode(array("existe" => "no"));
        }
        
    }
    
    /*=============================================
    BUSCAR CONTROL
    =============================================*/	
    
    public $buscarControl;
    
    public function ajaxBuscarControl(){
        
        $tabla = "control";
        $item = "idcon";
        $valor = $this->buscarControl;
        $respuesta = ModeloControles::mdlMostrarControles($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR CONTROL 2
    =============================================*/	
    
    public $buscarNumFactura;
    
    public function ajaxBuscarControl2(){
        
        $tabla = "control";
        $item = "idcon";
        $valor = $this->buscarNumFactura;
        $respuesta = ModeloControles::mdlBuscarNumFactura($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR CONTROLES POR FILTRO (POR APROBAR)
    =============================================*/	
    
    public $filtro;
    
    public function ajaxBuscarPorFiltro(){
        $tabla = "control";
        $item = "estcon";
        $valor = $this->filtro;
        
        $respuesta = ModeloControles::mdlBuscarPorFiltro($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    APROBAR CONTROL
    =============================================*/	
    
    public $idControlAprobar;
    
    public function ajaxAprobarControl(){
        $tabla = "control";
        $valor = $this->idControlAprobar;
        $respuesta = ModeloControles::mdlAprobarControl($tabla, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    PROCESAR CONTROL
    =============================================*/	
    
    public $idControlProcesar;
    
    public function ajaxProcesarControl(){
        $tabla = "control";
        $datos = array(
            "idcon" => $this->idControlProcesar,
            "visbue" => $_POST["visbue"],
            "superv" => $_POST["superv"],
            "obssed" => $_POST["obssed"]
        );
        
        $respuesta = ModeloControles::mdlProcesarControl($tabla, $datos);
        echo json_encode($respuesta);
        
    }

    /*=============================================
    FINALIZAR CONTROL
    =============================================*/	
    
    public $idControlFinalizar;
    
    public function ajaxFinalizarControl(){
        $tabla = "control";
        $datos = array(
            "idcon" => $this->idControlFinalizar,
            
            "numord" => $_POST["numord"],
            "confor" => $_POST["confor"],
            "numfac" => $_POST["numfac"]
            //"observ" => $_POST["observ"]
        );
        
        $respuesta = ModeloControles::mdlFinalizarControl($tabla, $datos);
        
        echo json_encode($respuesta);
    }
    
    public $agregarNumFac;
    
    public function ajaxAgregarNumFac(){
        $tabla = "control";
        $datos = array(
            "idcon" => $this->agregarNumFac,
            "numfac" => $_POST["numfac"]
        );
        
        $respuesta = ModeloControles::mdlAgregarNumFac($tabla, $datos);
        
        echo json_encode($respuesta);
    }
    
    public $buscarDetalleControl;
    
    public function ajaxBuscarDetalleControl(){
        $tabla = "control";
        $item = "idcon";
        $valor = $this->buscarDetalleControl;
        $control = ModeloControles::mdlMostrarControles($tabla, $item, $valor);
        
        $tabla = "usuarios";
        $item = "id";
        $valor = $control["tecnic"];
        $tecnico = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        
        $tabla = "cliente";
        $item = "idcli";
        $valor = $control["idcli"];
        $cliente = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        
        echo json_encode(array("control" => $control, "tecnico" => $tecnico, "cliente" => $cliente));
    }
}


/*=============================================
BUSCAR LAS AGENCIAS
=============================================*/	

if(isset($_POST["bcliente"])){
    $buscarAgencia = new AjaxControles();
    $buscarAgencia->buscarAgencia = $_POST["bcliente"];
    $buscarAgencia->ajaxBuscarAgencia();
}

/*=============================================
BUSCAR COTIZACION
=============================================*/	

if(isset($_POST["bnumcot"])){
    $buscarCotizacion = new AjaxControles();
    $buscarCotizacion->buscarCotizacion = $_POST["bnumcot"];
    $buscarCotizacion->ajaxBuscarCotizacion();
}

/*=============================================
BUSCAR CONTROL
=============================================*/	

if(isset($_POST["idControl"])){
    $buscarControl = new AjaxControles();
    $buscarControl->buscarControl = $_POST["idControl"];
    $buscarControl->ajaxBuscarControl();
}

/*=============================================
BUSCAR CONTROLES POR FILTRO (POR APROBAR)
=============================================*/	

if(isset($_POST["filtro"])){
    $buscarPorFiltro = new AjaxControles();
    $buscarPorFiltro->filtro = $_POST["filtro"];
    $buscarPorFiltro->ajaxBuscarPorFiltro();
}

/*=============================================
APROBAR CONTROL
=============================================*/	

if(isset($_POST["idControlAprobar"])){
    $aprobarControl = new AjaxControles();
    $aprobarControl->idControlAprobar = $_POST["idControlAprobar"];
    $aprobarControl->ajaxAprobarControl();
}

/*=============================================
PROCESAR CONTROL
=============================================*/	

if(isset($_POST["idControlProcesar"])){
    $procesarControl = new AjaxControles();
    $procesarControl->idControlProcesar = $_POST["idControlProcesar"];
    $procesarControl->ajaxProcesarControl();
}


/*=============================================
FINALIZAR CONTROL
=============================================*/	

if(isset($_POST["idControlFinalizar"])){
    $finalizarControl = new AjaxControles();
    $finalizarControl->idControlFinalizar = $_POST["idControlFinalizar"];
    $finalizarControl->ajaxFinalizarControl();
}

if(isset($_POST["accion"])){
    if($_POST["accion"] === "agregarnumfac"){
        $agregarNumFac = new AjaxControles();
        $agregarNumFac->agregarNumFac = $_POST["control"];
        $agregarNumFac->ajaxAgregarNumFac();
    }
    if($_POST["accion"] === "buscardetallecontrol"){
        $buscarDetalleControl = new AjaxControles();
        $buscarDetalleControl->buscarDetalleControl = $_POST["control"];
        $buscarDetalleControl->ajaxBuscarDetalleControl();
    }
    if($_POST["accion"] === "buscarnumfactura"){
        $buscarNumFactura = new AjaxControles();
        $buscarNumFactura->buscarNumFactura = $_POST["control"];
        $buscarNumFactura->ajaxBuscarControl2();
    }
}