<?php

class ControladorTests {
    /*=============================================
    GUARDAR PRUEBA
    =============================================*/
    static public function ctrGuardarPrueba($tabla,$datos){
        $respuesta = ModeloTests::mdlGuardarPrueba($tabla, $datos);
        return $respuesta;
    }
    
    /*=============================================
    VERIFICAR PRUEBA
    =============================================*/
    static public function ctrVerificarPrueba($item,$valor){
        $tabla = "prueba";
        $respuesta = ModeloTests::mdlVerificarPrueba($tabla, $item, $valor);
        return $respuesta;                
    }
    
    /*=============================================
    MOSTRAR CARRERAS RECOMENDADAS
    =============================================*/
    static public function ctrMostrarCarrerasRecomendadas($item, $valor){
        $respuesta = ModeloTests::mdlMostrarCarrerasRecomendadas($item, $valor);
        return $respuesta;
    }
    
    /*=============================================
    MOSTRAR APTITUDES
    =============================================*/
    static public function ctrMostrarAptitudesRecomendadas($item, $valor){
        $respuesta = ModeloTests::mdlMostrarAptitudesRecomendadas($item, $valor);
        return $respuesta;
    }
    
    /*=============================================
    CARGAR PREGUNTAS
    =============================================*/
    static public function ctrCargarPreguntas(){
        $tabla = "preguntas";
        $respuesta = ModeloTests::mdlCargarPreguntas($tabla);
        return $respuesta;
    }
}
