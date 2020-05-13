<?php

require_once 'conexion.php';

class ModeloTests {
    /*=============================================
    GUARDAR PRUEBA
    =============================================*/
    static public function mdlGuardarPrueba($tabla, $datos){
        //var_dump($datos);
        //exit(0);
        $cnx = Conexion::conectar();
        try{
            
            $cnx->beginTransaction();
            
            $stmt = $cnx->prepare("INSERT INTO $tabla(fecha, usuario, "
                    . "pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, "
                    . "pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20, "
                    . "pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26, pregunta27, pregunta28, pregunta29, pregunta30, "
                    . "pregunta31, pregunta32, pregunta33, pregunta34, pregunta35, pregunta36, pregunta37, pregunta38, pregunta39, pregunta40, "
                    . "pregunta41, pregunta42, pregunta43, pregunta44, pregunta45, pregunta46, pregunta47, pregunta48, pregunta49, pregunta50, "
                    . "pregunta51, pregunta52, pregunta53, pregunta54, pregunta55, pregunta56, pregunta57, pregunta58, pregunta59, pregunta60) "
                    . "VALUES(NOW(), :usuario, "
                    . ":pregunta1, :pregunta2, :pregunta3, :pregunta4, :pregunta5, :pregunta6, :pregunta7, :pregunta8, :pregunta9, :pregunta10, "
                    . ":pregunta11, :pregunta12, :pregunta13, :pregunta14, :pregunta15, :pregunta16, :pregunta17, :pregunta18, :pregunta19, :pregunta20, "
                    . ":pregunta21, :pregunta22, :pregunta23, :pregunta24, :pregunta25, :pregunta26, :pregunta27, :pregunta28, :pregunta29, :pregunta30,"
                    . ":pregunta31, :pregunta32, :pregunta33, :pregunta34, :pregunta35, :pregunta36, :pregunta37, :pregunta38, :pregunta39, :pregunta40,"
                    . ":pregunta41, :pregunta42, :pregunta43, :pregunta44, :pregunta45, :pregunta46, :pregunta47, :pregunta48, :pregunta49, :pregunta50,"
                    . ":pregunta51, :pregunta52, :pregunta53, :pregunta54, :pregunta55, :pregunta56, :pregunta57, :pregunta58, :pregunta59, :pregunta60)");
            
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_INT);
            
            $stmt->bindParam(":pregunta1", $datos["pregunta1"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta2", $datos["pregunta2"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta3", $datos["pregunta3"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta4", $datos["pregunta4"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta5", $datos["pregunta5"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta6", $datos["pregunta6"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta7", $datos["pregunta7"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta8", $datos["pregunta8"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta9", $datos["pregunta9"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta10", $datos["pregunta10"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta11", $datos["pregunta11"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta12", $datos["pregunta12"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta13", $datos["pregunta13"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta14", $datos["pregunta14"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta15", $datos["pregunta15"], PDO::PARAM_INT);
            
            $stmt->bindParam(":pregunta16", $datos["pregunta16"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta17", $datos["pregunta17"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta18", $datos["pregunta18"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta19", $datos["pregunta19"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta20", $datos["pregunta20"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta21", $datos["pregunta21"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta22", $datos["pregunta22"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta23", $datos["pregunta23"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta24", $datos["pregunta24"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta25", $datos["pregunta25"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta26", $datos["pregunta26"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta27", $datos["pregunta27"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta28", $datos["pregunta28"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta29", $datos["pregunta29"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta30", $datos["pregunta30"], PDO::PARAM_INT);
            
            $stmt->bindParam(":pregunta31", $datos["pregunta31"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta32", $datos["pregunta32"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta33", $datos["pregunta33"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta34", $datos["pregunta34"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta35", $datos["pregunta35"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta36", $datos["pregunta36"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta37", $datos["pregunta37"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta38", $datos["pregunta38"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta39", $datos["pregunta39"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta40", $datos["pregunta40"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta41", $datos["pregunta41"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta42", $datos["pregunta42"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta43", $datos["pregunta43"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta44", $datos["pregunta44"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta45", $datos["pregunta45"], PDO::PARAM_INT);
            
            $stmt->bindParam(":pregunta46", $datos["pregunta46"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta47", $datos["pregunta47"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta48", $datos["pregunta48"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta49", $datos["pregunta49"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta50", $datos["pregunta50"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta51", $datos["pregunta51"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta52", $datos["pregunta52"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta53", $datos["pregunta53"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta54", $datos["pregunta54"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta55", $datos["pregunta55"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta56", $datos["pregunta56"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta57", $datos["pregunta57"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta58", $datos["pregunta58"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta59", $datos["pregunta59"], PDO::PARAM_INT);
            $stmt->bindParam(":pregunta60", $datos["pregunta60"], PDO::PARAM_INT);
            
            if($stmt->execute()){
                $procesado1 = true;
                $procesado2 = true;
                // Calcular suma para recomendacion de carreras
                $sumaCarrera[0] = $datos["pregunta1"]+$datos["pregunta13"]+$datos["pregunta25"]+$datos["pregunta37"]+$datos["pregunta49"];
                $sumaCarrera[1] = $datos["pregunta2"]+$datos["pregunta14"]+$datos["pregunta26"]+$datos["pregunta38"]+$datos["pregunta50"];
                $sumaCarrera[2] = $datos["pregunta3"]+$datos["pregunta15"]+$datos["pregunta27"]+$datos["pregunta39"]+$datos["pregunta51"];
                $sumaCarrera[3] = $datos["pregunta4"]+$datos["pregunta16"]+$datos["pregunta28"]+$datos["pregunta40"]+$datos["pregunta52"];
                $sumaCarrera[4] = $datos["pregunta5"]+$datos["pregunta17"]+$datos["pregunta29"]+$datos["pregunta41"]+$datos["pregunta53"];
                $sumaCarrera[5] = $datos["pregunta6"]+$datos["pregunta18"]+$datos["pregunta30"]+$datos["pregunta42"]+$datos["pregunta54"];
                $sumaCarrera[6] = $datos["pregunta7"]+$datos["pregunta19"]+$datos["pregunta31"]+$datos["pregunta43"]+$datos["pregunta55"];
                $sumaCarrera[7] = $datos["pregunta8"]+$datos["pregunta20"]+$datos["pregunta32"]+$datos["pregunta44"]+$datos["pregunta56"];
                $sumaCarrera[8] = $datos["pregunta9"]+$datos["pregunta21"]+$datos["pregunta33"]+$datos["pregunta45"]+$datos["pregunta57"];
                $sumaCarrera[9] = $datos["pregunta10"]+$datos["pregunta22"]+$datos["pregunta34"]+$datos["pregunta46"]+$datos["pregunta58"];
                $sumaCarrera[10] = $datos["pregunta11"]+$datos["pregunta23"]+$datos["pregunta35"]+$datos["pregunta47"]+$datos["pregunta59"];
                $sumaCarrera[11] = $datos["pregunta12"]+$datos["pregunta24"]+$datos["pregunta36"]+$datos["pregunta48"]+$datos["pregunta60"];
                
                // Calcular porcentaje para recomendacion de carreras
                $porCarrera[0] = 80*($sumaCarrera[0]/20);
                $porCarrera[1] = 80*($sumaCarrera[1]/20);
                $porCarrera[2] = 80*($sumaCarrera[2]/20);
                $porCarrera[3] = 80*($sumaCarrera[3]/20);
                $porCarrera[4] = 80*($sumaCarrera[4]/20);
                $porCarrera[5] = 80*($sumaCarrera[5]/20);
                $porCarrera[6] = 80*($sumaCarrera[6]/20);
                $porCarrera[7] = 80*($sumaCarrera[7]/20);
                $porCarrera[8] = 80*($sumaCarrera[8]/20);
                $porCarrera[9] = 80*($sumaCarrera[9]/20);
                $porCarrera[10] = 80*($sumaCarrera[10]/20);
                $porCarrera[11] = 80*($sumaCarrera[11]/20);
                
                // Calcular suma para recomendacion de aptitudes
                $sumaAptitud[0] = $datos["pregunta1"]+$datos["pregunta2"]+$datos["pregunta3"]+$datos["pregunta4"]+$datos["pregunta5"]+$datos["pregunta6"]+$datos["pregunta7"]+$datos["pregunta8"]+$datos["pregunta9"]+$datos["pregunta10"]+$datos["pregunta11"]+$datos["pregunta12"]; 
                $sumaAptitud[1] = $datos["pregunta13"]+$datos["pregunta14"]+$datos["pregunta15"]+$datos["pregunta16"]+$datos["pregunta17"]+$datos["pregunta18"]+$datos["pregunta19"]+$datos["pregunta20"]+$datos["pregunta21"]+$datos["pregunta22"]+$datos["pregunta23"]+$datos["pregunta24"]; 
                $sumaAptitud[2] = $datos["pregunta25"]+$datos["pregunta26"]+$datos["pregunta27"]+$datos["pregunta28"]+$datos["pregunta29"]+$datos["pregunta30"]+$datos["pregunta31"]+$datos["pregunta32"]+$datos["pregunta33"]+$datos["pregunta34"]+$datos["pregunta35"]+$datos["pregunta36"]; 
                $sumaAptitud[3] = $datos["pregunta37"]+$datos["pregunta38"]+$datos["pregunta39"]+$datos["pregunta40"]+$datos["pregunta41"]+$datos["pregunta42"]+$datos["pregunta43"]+$datos["pregunta44"]+$datos["pregunta45"]+$datos["pregunta46"]+$datos["pregunta47"]+$datos["pregunta48"]; 
                $sumaAptitud[4] = $datos["pregunta49"]+$datos["pregunta50"]+$datos["pregunta51"]+$datos["pregunta52"]+$datos["pregunta53"]+$datos["pregunta54"]+$datos["pregunta55"]+$datos["pregunta56"]+$datos["pregunta57"]+$datos["pregunta58"]+$datos["pregunta59"]+$datos["pregunta60"]; 
                                
                // Calcular porcentaje para recomendacion de aptitudes
                $porAptitud[0] = 90*($sumaAptitud[0]/48); 
                $porAptitud[1] = 90*($sumaAptitud[1]/48); 
                $porAptitud[2] = 90*($sumaAptitud[2]/48); 
                $porAptitud[3] = 90*($sumaAptitud[3]/48); 
                $porAptitud[4] = 90*($sumaAptitud[4]/48); 
                
                $aptitud[0] = "REALISTA";
                $aptitud[1] = "INVESTIGACIÓN"; 
                $aptitud[2] = "ARTISTICA"; 
                $aptitud[3] = "SOCIAL";
                $aptitud[4] = "EMPRENDEDOR";
                
                for($i=0;$i<12;$i++){
                    $numCarrera = $i+1;
                    $stmtCarrera = $cnx->prepare("INSERT recocarreras(usuario,carrera,suma,porcentaje) VALUES(:usuario,:carrera,:suma,:porcentaje)");
                    $stmtCarrera->bindParam(":usuario", $datos["usuario"], PDO::PARAM_INT);
                    $stmtCarrera->bindParam(":carrera", $numCarrera, PDO::PARAM_INT);
                    $stmtCarrera->bindParam(":suma", $sumaCarrera[$i], PDO::PARAM_INT);
                    $stmtCarrera->bindParam(":porcentaje", $porCarrera[$i], PDO::PARAM_STR);
                    if(!$stmtCarrera->execute()){ $procesado1 = false; break; }
                }
                
                for($j=0;$j<5;$j++){
                    $stmtAptitud = $cnx->prepare("INSERT INTO recoaptitudes(usuario,aptitud,suma,porcentaje) VALUES(:usuario,:aptitud,:suma,:porcentaje)");
                    $stmtAptitud->bindParam(":usuario", $datos["usuario"], PDO::PARAM_INT);
                    $stmtAptitud->bindParam(":aptitud", $aptitud[$j], PDO::PARAM_STR);
                    $stmtAptitud->bindParam(":suma", $sumaAptitud[$j], PDO::PARAM_INT);
                    $stmtAptitud->bindParam(":porcentaje", $porAptitud[$j], PDO::PARAM_STR);
                    if(!$stmtAptitud->execute()){ $procesado2 = false; break; }
                }
                
                if($procesado1 && $procesado2){
                    $cnx->commit();
                    return "ok";
                }else{
                    $cnx->rollBack();
                }
            }
                    
        } catch (PDOException $ex) {
            $cnx->rollBack();
        }
    }
    
    /*=============================================
    VERIFICAR PRUEBA
    =============================================*/
    static public function mdlVerificarPrueba($tabla, $item, $valor){
        if($item !== null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            
            $stmt -> execute();
            
            return $stmt ->fetch();
        }
        
        $stmt ->closeCursor();
        $stmt = null;
    }
    
    /*=============================================
    MOSTRAR CARRERAS RECOMENDADAS
    =============================================*/
    static public function mdlMostrarCarrerasRecomendadas($item,$valor){
        $stmt = Conexion::conectar()->prepare(
                "SELECT "
                . "     c.carrera AS carrera, rc.suma AS suma, rc.porcentaje AS porcentaje, c.link AS enlace "
                . "FROM "
                . "     carreras c, recocarreras rc "
                . "WHERE "
                . "     rc.usuario = :$item AND "
                . "     c.id = rc.carrera "
                . "ORDER BY "
                . "     rc.porcentaje DESC "
                . "LIMIT 3");
        
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /*=============================================
    MOSTRAR APTITUDES RECOMENDADAS
    =============================================*/
    static public function mdlMostrarAptitudesRecomendadas($item,$valor){
        $stmt = Conexion::conectar()->prepare(
                "SELECT "
                . "     ra.aptitud AS aptitud, ra.suma AS suma, ra.porcentaje AS porcentaje "
                . "FROM "
                . "     recoaptitudes ra "
                . "WHERE "
                . "     ra.usuario = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
        $stmt->execute();
        
        //var_dump($stmt);
        //exit(0);
        return $stmt->fetchAll();
    }
    
    /*=============================================
    CARGAR PREGUNTAS
    =============================================*/
    static public function mdlCargarPreguntas($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
