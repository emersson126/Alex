<?php

require_once "../controladores/clientes.controlador.php";
require_once "../controladores/sedes.controlador.php";
require_once "../modelos/clientes.modelo.php";
require_once "../modelos/sedes.modelo.php";

class AjaxClientes {
    
    /*=============================================
	BUSCAR CLIENTES
    =============================================*/
    
    public function ajaxBuscarClientes(){
        $item = null;
        $valor = null;
        
        $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR AGENCIA(S) POR CLIENTE
    =============================================*/
    
    public $buscarAgencia;
    
    public function ajaxBuscarAgencia(){
        $item = "idcli";
        $valor = $this->buscarAgencia;
        
        $respuesta = ControladorClientes::ctrBuscarAgencia2($item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    CREAR CLIENTE (CON CONTROLADOR)
    =============================================*/
    
    public $crearCliente;
    
    public function ajaxCrearCliente(){
        
    }
    
    /*=============================================
	CREAR CLIENTE (SIN CONTROLADOR)
    =============================================*/
    
    public function ajaxCrearCliente2(){
        
        $tabla = "cliente";
        
        $datos = array(
            "agencias" => $_POST["datos"]["agencias"],
            "nomcli" => $_POST["datos"]["nombre"],
            "telcli" => $_POST["datos"]["telefo"],
            "dircli" => $_POST["datos"]["direcc"],
            "correo" => $_POST["datos"]["correo"],
            "nomcon" => $_POST["datos"]["nomcon"],
            "telcon" => $_POST["datos"]["telcon"]
         );  
        
        $respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

        echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR CLIENTE Y AGENCIA
    =============================================*/
    
    public $buscarClienteAgencia;
    
    public function ajaxBuscarClienteAgencia(){
        $tabla1 = "cliente";
        $tabla2 = "sede";
        $item = "idsed";
        $valor = $this->buscarClienteAgencia;
        
       
        $clienteAgencia = ModeloSedes::mdlBuscarClienteAgencia($tabla1, $tabla2, $item, $valor);
        
        echo json_encode(array("cliente" => $clienteAgencia["cliente"], "agencia" => $clienteAgencia["agencia"]));
        
    }
    
    /*=============================================
    BUSCAR CLIENTE
    =============================================*/
    
    public $buscarCliente;
    
    public function ajaxBuscarCliente(){
        $tabla = "cliente";
        $item = "idcli";
        $valor = $this->buscarCliente;
        
       
        $cliente = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        
        echo json_encode($cliente);
        
    }
    
    public function ajaxBuscarTodos(){
        $tabla = "cliente";
        $item = null;
        $valor = null;
        
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
}

/*=============================================
CREAR CLIENTE
=============================================*/

if(isset($_POST["datos"])){
    $crearCliente = new AjaxClientes();
    $crearCliente->datos = $_POST["datos"];
    $crearCliente->ajaxCrearCliente();
}

/*=============================================
CREAR CLIENTE (SIN CONTROLADOR)
=============================================*/

if(isset($_POST["accion"])){
    
    if($_POST["accion"] === "ajaxguardar"){
        $crearCliente = new AjaxClientes();
        $crearCliente->ajaxCrearCliente2();
    }
    
    if($_POST["accion"] === "buscarclienteagencia"){
        $buscarCliente = new AjaxClientes();
        $buscarCliente->buscarClienteAgencia = $_POST["agencia"];
        $buscarCliente->ajaxBuscarClienteAgencia();
    }
    
    if($_POST["accion"] === "buscarcliente"){
        $buscarCliente = new AjaxClientes();
        $buscarCliente->buscarCliente = $_POST["cliente"];
        $buscarCliente->ajaxBuscarCliente();
    }
    if($_POST["accion"] === "traertodos"){
        $buscarTodos = new AjaxClientes();
        $buscarTodos->ajaxBuscarTodos();
    }
}

/*=============================================
MOSTRAR CLIENTES
=============================================*/

if(isset($_POST["idCli"])){
    $buscarClientes = new AjaxClientes();
    $buscarClientes->ajaxBuscarClientes();
}

/*=============================================
BUSCAR AGENCIA(S) POR CLIENTES
=============================================*/

if(isset($_POST["idcliente"])){
    $buscarAgencia = new AjaxClientes();
    $buscarAgencia->buscarAgencia = $_POST["idcliente"];
    $buscarAgencia->ajaxBuscarAgencia();
}