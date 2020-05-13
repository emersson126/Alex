<?php

require_once "../controladores/tecnicos.controlador.php";
require_once "../modelos/tecnicos.modelo.php";

class AjaxTecnicos {
    
    /*=============================================
    CREAR TECNICO
    =============================================*/
    
    public function ajaxCrearTecnico(){
        $items = array("dni", "nombre", "tipo");
        $valores = array($_POST["dniTecnico"], $_POST["nomTecnico"], $_POST["tipTecnico"]);
        
        $respuesta = ControladorTecnicos::ctrCrearTecnico($items, $valores);
        echo json_encode($respuesta);
    }
    
    /*=============================================
    MOSTRAR TECNICOS
    =============================================*/
    
    public function ajaxMostrarTecnicos(){
        $respuesta = ControladorTecnicos::ctrMostrarTecnicos();
        echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR TECNICOS
    =============================================*/
    
    public function ajaxBuscarTecnicos(){
        $tabla = "tecnico";
        $item = null;
        $valor = null;
        
        $respuesta = ModeloTecnicos::mdlMostrarTecnicos($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    GUARDAR TECNICO
    =============================================*/
    
    public function ajaxGuardarTecnico(){
        $tabla = "tecnico";
        $datos = array(
            "dnitec" => $_POST["dnitec"],
            "nomtec" => $_POST["nomtec"],
            "dirtec" => $_POST["dirtec"],
            "teltec" => $_POST["teltec"],
            "tiptec" => $_POST["tiptec"],
        );
        
        $respuesta = ModeloTecnicos::mdlGuardarTecnico($tabla, $datos);
        
        echo json_encode($respuesta);
    }
    
    public $validarTecnico;
    
    public function ajaxValidarTecnico(){
        $tabla = "tecnico";
        $item = "dni";
        $valor = $this->validarTecnico;
        
        $respuesta = ModeloTecnicos::mdlMostrarTecnicos($tabla, $item, $valor);
        
        if($respuesta){
            echo json_encode(array("respuesta" => "ok"));
        }
        else{
            echo json_encode(array("respuesta" => "error"));
        }
    }
    
    public $buscarTecnico;
    
    public function ajaxBuscarTecnico(){
        $tabla = "tecnico";
        $item = "dni";
        $valor = $this->buscarTecnico;
        
        $respuesta = ModeloTecnicos::mdlMostrarTecnicos($tabla, $item, $valor);
        
        if($respuesta){
            echo json_encode(array("encontrado" => "si", "respuesta" => $respuesta));
        }
        else{
            echo json_encode(array("encontrado" => "no"));
        }
    }
}


/*=============================================
MOSTRAR TECNICOS
=============================================*/

if(isset($_POST['buscarTecnicos'])){
    $buscarTecnicos = new AjaxTecnicos();
    $buscarTecnicos->ajaxMostrarTecnicos();
}

if(isset($_POST["accion"])){
    if(isset($_POST["accion"]) && $_POST["accion"] === "guardartecnico1"){
        $guardarTecnico = new AjaxTecnicos();
        $guardarTecnico->ajaxGuardarTecnico();
    }
    if(isset($_POST["accion"]) && $_POST["accion"] === "guardartecnico-gastos"){
        $guardarTecnico = new AjaxTecnicos();
        $guardarTecnico->ajaxGuardarTecnico();
    }
    
    if($_POST["accion"] === "buscartecnicos1"){
        $buscarTecnicos = new AjaxTecnicos();
        $buscarTecnicos->ajaxBuscarTecnicos();
    }
    if($_POST["accion"] === "validartecnico"){
        $validarTecnico = new AjaxTecnicos();
        $validarTecnico->validarTecnico = $_POST["dnitec"];
        $validarTecnico->ajaxValidarTecnico();
    }
    if($_POST["accion"] === "buscartecnico"){
        $buscarTecnico = new AjaxTecnicos();
        $buscarTecnico->buscarTecnico = $_POST["dniTecnico"];
        $buscarTecnico->ajaxBuscarTecnico();
    }
}