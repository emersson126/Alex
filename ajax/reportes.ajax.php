<?php
require_once "../controladores/reportes.controlador.php";
require_once "../controladores/tecnicos.controlador.php";
require_once "../modelos/reportes.modelo.php";
require_once "../modelos/tecnicos.modelo.php";

class AjaxReportes {
    /*=============================================
    CREAR REPORTE FORM 01
    =============================================*/	
    public function ajaxCrearReporte01(){
        $tabla = "reportecab";
        $datos = array(
            // CABECERA
            "clienter"      =>  $_POST["clienter"],
            "agenciar"      =>  $_POST["agenciar"],
            "tecnicor"      =>  $_POST["tecnicor"],
            "referenciar"   =>  $_POST["referenciar"],
            "periodor"      =>  $_POST["periodor"],
            
            // DETALLES
            "condenmarcas"         =>  $_POST["condenmarcas"],
            "condenmodelos"         =>  $_POST["condenmodelos"],
            "evapormarcas"        =>  $_POST["evapormarcas"],
            "evapormodelos"       =>  $_POST["evapormodelos"],
            "condenseries"        =>  $_POST["condenseries"],
            "condencapacidades"         =>  $_POST["condencapacidades"],
            "condenubicaciones"    =>  $_POST["condenubicaciones"],
            "condenantiguedades"     =>  $_POST["condenantiguedades"],
            "condenoperatividades"        =>  $_POST["condenoperatividades"],
            "condenampcoml1s"       =>  $_POST["condenampcoml1s"],
            "condenampcoml2s"       =>  $_POST["condenampcoml2s"],
            "condenampcoml3s"       =>  $_POST["condenampcoml3s"],
            "condenmotl1s"       =>  $_POST["condenmotl1s"],
            "condenmotl2s"       =>  $_POST["condenmotl2s"],
            "condenprealtas"     =>  $_POST["condenprealtas"],
            "condenprebajas"     =>  $_POST["condenprebajas"],
            "condenrefrigereantes"     =>  $_POST["condenrefrigereantes"],
            "condenvoltajes"     =>  $_POST["condenvoltajes"],
            "condenfases"      =>  $_POST["condenfases"],
            
            "evaportipos"      =>  $_POST["evaportipos"],
            "evaporcapacidades"   =>  $_POST["evaporcapacidades"],
            "evaporubicaciones"   =>  $_POST["evaporubicaciones"],
            "evaporantiguedades"   =>  $_POST["evaporantiguedades"],
            "evaporoperatividades"   =>  $_POST["evaporoperatividades"],
            
            "evapormotl1s"   =>  $_POST["evapormotl1s"],
            "evapormotl2s"      =>  $_POST["evapormotl2s"],
            
            "evaportipcontrols"   =>  $_POST["evaportipcontrols"],
            "evaporequiaterrados"   =>  $_POST["evaporequiaterrados"],
            "otrodistanciaucues"   =>  $_POST["otrodistanciaucues"],
            "otrocaprequeridads"   =>  $_POST["otrocaprequeridads"],
            "exdobservaciones"   =>  $_POST["exdobservaciones"],
                        
            "usuarior"       =>  $_POST["usuarior"]
        );
        
        $respuesta = ModeloReportes::mdlCrearReporte01($tabla, $datos);
        
        if($respuesta === "ok"){
            echo json_encode(array("respuesta" => "ok"));
        }
        else{
            echo json_encode(array("respuesta" => "error"));
        }
    }
    
    /*=============================================
    CREAR REPORTE FORM 02
    =============================================*/	
    public function ajaxCrearReporte02(){
        $tabla = "reportecab";
        $datos = array(
            // CABECERA
            "clienter"      =>  $_POST["clienter"],
            "agenciar"      =>  $_POST["agenciar"],
            "tecnicor"      =>  $_POST["tecnicor"],
            "referenciar"   =>  $_POST["referenciar"],
            "periodor"      =>  $_POST["periodor"],
            "usuarior"       =>  $_POST["usuarior"],
            
            // DETALLES
            "marcas"         =>  $_POST["marcas"],
            "modelos"         =>  $_POST["modelos"],
            "series"        =>  $_POST["series"],
            "tipos"         =>  $_POST["tipos"],
            "areas"         =>  $_POST["areas"],
            "antiguedades"     =>  $_POST["antiguedades"],
            "operatividades"        =>  $_POST["operatividades"],
            "volhzs"       =>  $_POST["volhzs"],
            "hlps"       =>  $_POST["hlps"],
            "ampmots"       =>  $_POST["ampmots"],
            "tempsums"       =>  $_POST["tempsums"],
            "tipcontrols"       =>  $_POST["tipcontrols"],
            "equiaterrados"     =>  $_POST["equiaterrados"],
            "observaciones"     =>  $_POST["observaciones"]
        );
        
        $respuesta = ModeloReportes::mdlCrearReporte02($tabla, $datos);
        
        if($respuesta === "ok"){
            echo json_encode(array("respuesta" => "ok"));
        }
        else{
            echo json_encode(array("respuesta" => "error"));
        }
    }
    
    /*=============================================
    CREAR REPORTE FORM 03
    =============================================*/	
    public function ajaxCrearReporte03(){
        $tabla = "reportecab";
        $datos = array(
            // CABECERA
            "clienter"      =>  $_POST["clienter"],
            "agenciar"      =>  $_POST["agenciar"],
            "tecnicor"      =>  $_POST["tecnicor"],
            "referenciar"   =>  $_POST["referenciar"],
            "periodor"      =>  $_POST["periodor"],
            "usuarior"       =>  $_POST["usuarior"],
            
            // DETALLES
            "marcas"         =>  $_POST["marcas"],
            "modelos"         =>  $_POST["modelos"],
            "series"        =>  $_POST["series"],
            "hps"           => $_POST["hps"],
            "ubicaciones"   =>  $_POST["ubicaciones"],
            "antiguedades"     =>  $_POST["antiguedades"],
            "operatividades"        =>  $_POST["operatividades"],
            "ampmotl1s"       =>  $_POST["ampmotl1s"],
            "ampmotl2s"       =>  $_POST["ampmotl2s"],
            "ampmotl3s"       =>  $_POST["ampmotl3s"],
            "voltajes"       =>  $_POST["voltajes"],
            "fases"       =>  $_POST["fases"],
            "tipcontrols"       =>  $_POST["tipcontrols"],
            "equiaterrados"     =>  $_POST["equiaterrados"],
            "caprequeridas"     =>  $_POST["caprequeridas"],
            "observaciones"     =>  $_POST["observaciones"]
        );
        
        $respuesta = ModeloReportes::mdlCrearReporte03($tabla, $datos);
        
        if($respuesta === "ok"){
            echo json_encode(array("respuesta" => "ok"));
        }
        else{
            echo json_encode(array("respuesta" => "error"));
        }
    }
    
    /*=============================================
    CREAR REPORTE FORM 04
    =============================================*/	
    public function ajaxCrearReporte04(){
        $tabla = "reportecab";
        $datos = array(
            // CABECERA
            "clienter"          =>  $_POST["clienter"],
            "agenciar"          =>  $_POST["agenciar"],
            "tecnicor"          =>  $_POST["tecnicor"],
            "referenciar"       =>  $_POST["referenciar"],
            "periodor"          =>  $_POST["periodor"],
            "usuarior"          =>  $_POST["usuarior"],
            
            // DETALLES
            "tipos"             => $_POST["tipos"],
            "marcas"            =>  $_POST["marcas"],
            "modelos"           =>  $_POST["modelos"],
            "series"            =>  $_POST["series"],
            "capacidades"       => $_POST["capacidades"],
            "corrientecomps"    =>  $_POST["corrientecomps"],
            "presiones"         =>  $_POST["presiones"],
            "refvols"           =>  $_POST["refvols"],
            "observaciones"     =>  $_POST["observaciones"]
        );
        
        $respuesta = ModeloReportes::mdlCrearReporte04($tabla, $datos);
        
        if($respuesta === "ok"){
            echo json_encode(array("respuesta" => "ok"));
        }
        else{
            echo json_encode(array("respuesta" => "error"));
        }
    }
    
    /*=============================================
    CREAR REPORTE FORM 05
    =============================================*/	
    public function ajaxCrearReporte05(){
        $tabla = "reportecab";
        $datos = array(
            // CABECERA
            "clienter"          =>  $_POST["clienter"],
            "agenciar"          =>  $_POST["agenciar"],
            "tecnicor"          =>  $_POST["tecnicor"],
            "referenciar"       =>  $_POST["referenciar"],
            "periodor"          =>  $_POST["periodor"],
            "usuarior"          =>  $_POST["usuarior"],
            
            // DETALLES
            "tipos"             => $_POST["tipos"],
            "marcas"            =>  $_POST["marcas"],
            "modelos"           =>  $_POST["modelos"],
            "series"            =>  $_POST["series"],
            "capacidades"       => $_POST["capacidades"],
            "corrientecomps"    =>  $_POST["corrientecomps"],
            "presiones"         =>  $_POST["presiones"],
            "refvols"           =>  $_POST["refvols"],
            "observaciones"     =>  $_POST["observaciones"]
        );
        
        $respuesta = ModeloReportes::mdlCrearReporte05($tabla, $datos);
        
        if($respuesta === "ok"){
            echo json_encode(array("respuesta" => "ok"));
        }
        else{
            echo json_encode(array("respuesta" => "error"));
        }
    }
    
    /*=============================================
    ACTUALIZAR REPORTE
    =============================================*/	
    
    public $actualizarReporte;
    
    public function ajaxActualizarReporte(){
        $tabla1 = "reportecab";
        $tabla2 = "reportedet";
        $item1 = "idrep";
        $item2 = "idrepdet";
        
        $datos = array(
            "reporteid" => $this->actualizarReporte,
            "clientem"      =>  $_POST["clientem"],
            "agenciam"      =>  $_POST["agenciam"],
            "tecnicom"      =>  $_POST["tecnicom"],
            "referenciam"   =>  $_POST["referenciam"],
            "periodom"      =>  $_POST["periodom"],
            "aread"         =>  $_POST["aread"],
            "tipod"         =>  $_POST["tipod"],
            "marcad"        =>  $_POST["marcad"],
            "modelod"       =>  $_POST["modelod"],
            "seried"        =>  $_POST["seried"],
            "pisod"         =>  $_POST["pisod"],
            "capacidadd"    =>  $_POST["capacidadd"],
            "voltajesd"     =>  $_POST["voltajesd"],
            "fasesd"        =>  $_POST["fasesd"],
            "refrigeranted" =>  $_POST["refrigeranted"],
            "siscond"       =>  $_POST["siscond"],
            "compl1d"       =>  $_POST["compl1d"],
            "compl2d"       =>  $_POST["compl2d"],
            "compl3d"       =>  $_POST["compl3d"],
            "motconl1d"     =>  $_POST["motconl1d"],
            "motconl2d"     =>  $_POST["motconl2d"],
            "moteval1d"     =>  $_POST["moteval1d"],
            "moteval2d"     =>  $_POST["moteval2d"],
            "prealtad"      =>  $_POST["prealtad"],
            "prebajad"      =>  $_POST["prebajad"],
            "anticondend"   =>  $_POST["anticondend"],
            "antievapord"   =>  $_POST["antievapord"],
            "opercondend"   =>  $_POST["opercondend"],
            "operevapord"   =>  $_POST["operevapord"],
            "obsersugerd"   =>  $_POST["obsersugerd"],
            "operaciones"   =>  $_POST["operaciones"],
            "codigos"       =>  $_POST["codigos"],
            "usuariom"      =>  $_POST["usuariom"],
            "eliminados"    =>  $_POST["codigoseli"]
        );
        
        $respuesta = ModeloReportes::mdlActualizarReporte($tabla1, $tabla2, $item1, $item2, $datos);
         echo json_encode($respuesta);
    }
    
    /*=============================================
    BUSCAR REPORTE
    =============================================*/	
    
    public $buscarReporte;
    
    public function ajaxBuscarReporte(){
        $tabla = "reportecab";
        $item = "idrep";
        $valor = $this->buscarReporte;
        
        $reporte = ModeloReportes::mdlMostrarReportes($tabla, $item, $valor);
        
        $tabla = "reportedet";
        $item = "idrep";
        $valor = $reporte["idrep"];
        
        $detalle = ModeloReportes::mdlMostrarDetallesReporte($tabla, $item, $valor);
        
        $tabla = "tecnico";
        $item = "dni";
        $valor = $reporte["tecnico"];
        
        $tecnico = ModeloTecnicos::mdlMostrarTecnicos($tabla, $item, $valor);
                
        echo json_encode(array("reporte" => $reporte, "detalle" => $detalle, "tecnico" => $tecnico));
    }
    
    /*=============================================
    BUSCAR REPORTE
    =============================================*/	
    
    public $buscarReporte2;
    
    public function ajaxBuscarReporte2(){
        $tabla = "reportecab";
        $item = "idrep";
        $valor = $this->buscarReporte2;
        
        $reporte = ModeloReportes::mdlMostrarReportes($tabla, $item, $valor);
        
        echo json_encode($reporte);
    }
    
    /*=============================================
    BUSCAR REPORTE
    =============================================*/	
    
    public $buscarDetalleDiagnostico;
    
    public function ajaxBuscarDetalleDiagnostico(){
        $tabla = "reportedet";
        $item = "idrepdet";
        $valor = $this->buscarDetalleDiagnostico;
        
        $detalle = ModeloReportes::mdlMostrarDetallesReporte($tabla, $item, $valor);
        
        echo json_encode(array("detalle" => $detalle));
    }
    
    /*=============================================
    ELIMINAR REPORTE
    =============================================*/	
    
    public $eliminarReporte;
    
    public function ajaxEliminarReporte(){
        $tabla = "reportecab";
        $item = "idrep";
        $valor = $this->eliminarReporte;
        
        $respuesta = ModeloReportes::mdlEliminarReporte($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    ELIMINAR DIAGNOSTICO
    =============================================*/	
    
    public $eliminarDiagnostico;
    
    public function ajaxEliminarDiagnostico(){
        $tabla = "reportedet";
        $item = "idrepdet";
        $datos = $this->eliminarDiagnostico;
        
        $respuesta = ModeloReportes::mdlEliminarDiagnostico($tabla, $item, $valor);
        
        echo json_encode($respuesta);
    }
    
    /*=============================================
    ACTUALIZAR REPORTE
    =============================================*/	
    
    public function ajaxSubirInformes(){
        $tabla = "reportecab";
        
        $ruta1 = "";
        if(isset($_FILES["informe1"]["tmp_name"])){
            /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
            =============================================*/
            $fechaUnix = strtotime("now");        
            $directorio1 = "vistas/img/reportes/informes";
            if(!file_exists($directorio1)){
                mkdir($directorio1, 0755, true);
            }
            
            if($_FILES["informe1"]["type"] === "application/pdf"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta1 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".pdf";
                        
                move_uploaded_file($_FILES["informe1"]["tmp_name"], $ruta1);                        
            }
            
            if($_FILES["informe1"]["type"] === "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta1 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".docx";
                        
                move_uploaded_file($_FILES["informe1"]["tmp_name"], $ruta1);                        
            }
            
            if($_FILES["informe1"]["type"] === "application/msword"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta1 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".doc";
                        
                move_uploaded_file($_FILES["informe1"]["tmp_name"], $ruta1);                        
            }
        }
        
        $ruta2 = "";
        if(isset($_FILES["informe2"]["tmp_name"])){
            /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
            =============================================*/
            $fechaUnix = strtotime("now");        
            $directorio2 = "vistas/img/reportes/informes";
            if(!file_exists($directorio2)){
                mkdir($directorio2, 0755, true);
            }
            
            if($_FILES["informe2"]["type"] === "application/pdf"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta2 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".pdf";
                        
                move_uploaded_file($_FILES["informe2"]["tmp_name"], $ruta2);                        
            }
            
            if($_FILES["informe2"]["type"] === "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta2 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".docx";
                        
                move_uploaded_file($_FILES["informe2"]["tmp_name"], $ruta2);                        
            }
            
            if($_FILES["informe2"]["type"] === "application/msword"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta2 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".doc";
                        
                move_uploaded_file($_FILES["informe2"]["tmp_name"], $ruta2);                        
            }
        }
        
        $ruta3 = "";
        if(isset($_FILES["informe3"]["tmp_name"])){
            /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
            =============================================*/
            $fechaUnix = strtotime("now");        
            $directorio3 = "vistas/img/reportes/informes";
            if(!file_exists($directorio3)){
                mkdir($directorio3, 0755, true);
            }
            
            if($_FILES["informe3"]["type"] === "application/pdf"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta3 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".pdf";
                        
                move_uploaded_file($_FILES["informe3"]["tmp_name"], $ruta3);                        
            }
            
            if($_FILES["informe3"]["type"] === "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta3 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".docx";
                        
                move_uploaded_file($_FILES["informe3"]["tmp_name"], $ruta3);                        
            }
            
            if($_FILES["informe3"]["type"] === "application/msword"){
                $fecha = date("dmYHis");
                        
                $aleatorio = mt_rand(10, 99);
                $ruta3 = "vistas/img/reportes/informes/informe-".$fechaUnix."-".$aleatorio.".doc";
                        
                move_uploaded_file($_FILES["informe3"]["tmp_name"], $ruta3);                        
            }
        }
        
        $datos = array(
            "informe1" => $ruta1,
            "informe2" => $ruta2,
            "informe3" => $ruta3,
            "idrep"    => $_POST["idrepinforme"]
        );
        
        $respuesta = ModeloReportes::mdlSubirInformes($tabla, $datos);
        
        echo json_encode($respuesta);
            
        
    }
    
}

if(isset($_POST["accion"])){
    if($_POST["accion"] === "crearreporte01"){
        $crearReporte = new AjaxReportes();
        $crearReporte->ajaxCrearReporte01();
    }
    if($_POST["accion"] === "crearreporte02"){
        $crearReporte = new AjaxReportes();
        $crearReporte->ajaxCrearReporte02();
    }
    if($_POST["accion"] === "crearreporte03"){
        $crearReporte = new AjaxReportes();
        $crearReporte->ajaxCrearReporte03();
    }
    if($_POST["accion"] === "crearreporte04"){
        $crearReporte = new AjaxReportes();
        $crearReporte->ajaxCrearReporte04();
    }
    if($_POST["accion"] === "crearreporte05"){
        $crearReporte = new AjaxReportes();
        $crearReporte->ajaxCrearReporte05();
    }
    if($_POST["accion"] === "actualizarreporte"){
        $actualizarReporte = new AjaxReportes();
        $actualizarReporte->actualizarReporte = $_POST["reporteid"];
        $actualizarReporte->ajaxActualizarReporte();
    }
    if($_POST["accion"] === "buscarreporte"){
        $buscarReporte = new AjaxReportes();
        $buscarReporte->buscarReporte = $_POST["idReporte"];
        $buscarReporte->ajaxBuscarReporte();
    }
    
    if($_POST["accion"] === "buscarreporte2"){
        $buscarReporte = new AjaxReportes();
        $buscarReporte->buscarReporte2 = $_POST["idrep"];
        $buscarReporte->ajaxBuscarReporte2();
    }
    
    if($_POST["accion"] === "buscardetallediagnostico"){
        $buscarDetalleDiagnostico = new AjaxReportes();
        $buscarDetalleDiagnostico->buscarDetalleDiagnostico = $_POST["idrepdet"];
        $buscarDetalleDiagnostico->ajaxBuscarDetalleDiagnostico();
    }
    if($_POST["accion"] === "eliminarreporte"){
        $eliminarReporte = new AjaxReportes();
        $eliminarReporte->eliminarReporte = $_POST["idReporte"];
        $eliminarReporte->ajaxEliminarReporte();
    }
    if($_POST["accion"] === "eliminardiagnostico"){
        $eliminarDiagnostico = new AjaxReportes();
        $eliminarDiagnostico->eliminarDiagnostico = $_POST["idrepd"];
        $eliminarDiagnostico->ajaxEliminarDiagnostico();
    }
    
    
    
}

/*if(isset($_POST["informe1"]) || isset($_POST["informe2"]) || isset($_POST["informe3"])){
    echo $_POST["informe1"];
    exit(0);
}*/


