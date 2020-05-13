<?php

require_once "../../../controladores/reportes.controlador.php";
require_once "../../../modelos/reportes.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

/*require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";*/

class imprimirReporte{

public $codigo;

public function traerImpresionReporte(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemReporte = "idrep";
$valorReporte = str_pad($this->codigo, 4, "0", STR_PAD_LEFT);
$numReporte = $this->codigo;

$respuestaReporte = ControladorReportes::ctrMostrarReportes($itemReporte, $numReporte);

$fecha = substr($respuestaReporte["fecrep"],0,-8);
$agencia = $respuestaReporte["agencia"];
$referencia = $respuestaReporte["referencia"];


// TRAER EL TECNICO
$item = "id";
$valor = $respuestaReporte["tecnico"];
$tecnico = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

// TRAER LOS DETALLES
$item = "idrep";
$valor = $respuestaReporte["idrep"];
$detalles = ControladorReportes::ctrBuscarDetalleReporte($item, $valor);

$titulo = "";
foreach($detalles as $key => $value){
if($value["formulario"] == 1){
$titulo = "Expansión Directa";
break;
}
else if($value["formulario"] == 2){
$titulo = "Agua Helada";
break;
}
else if($value["formulario"] == 3){
$titulo = "Formato";    
break;
}
else if($value["formulario"] == 4){
$titulo = "Refrigeración Comercial";    
break;
}
else if($value["formulario"] == 5){
$titulo = "Camaras Frigorificas";    
break;
}
}
//TRAEMOS LA INFORMACIÓN DEL CLIENTE
$itemCliente = "idcli";
$valorCliente = $respuestaReporte["cliente"];
$cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

// DETERMINAMOS EL PERIODO
switch ($respuestaReporte["periodo"]){
    case "MEN": $periodo = "Mensual";  break;
    case "BIM": $periodo = "Bimestral";  break;
    case "TRI": $periodo = "Trimestral";  break;
    case "SEM": $periodo = "Semestral";  break;
    case "ANU": $periodo = "Anual";  break;
}

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------
//$numreporte = str_pad($periodo, $pad_length, $itemCliente)
$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><br/><img src="images/logo-jjd.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					RUC: 997 865 836

					<br>
					Dirección: Callao

				</div>

			</td>

			<td style="background-color:white; width:130px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono:  (01)500-5827
					
					<br>
					nnunez@jjdclimatizaciones.com

				</div>
				
			</td>

			<td style="background-color:white; width:120px; text-align:center; color:red"><br><br>REPORTE<br> Nº.$valorReporte</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="background-color:white; width:540px; text-align: center;">
                            <b>REPORTE T&Eacute;CNICO DE MANTENIMIENTO</b>
			</td>

		</tr>
                
	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="background-color:white; width:390px">

				Cliente: $cliente[nomcli]

			</td>

			<td style="background-color:white; width:150px; text-align:right">
			
				Agencia: $agencia
			</td>

		</tr>

		<tr>
		
			<td style="background-color:white; width:390px">
                            Atención: $tecnico[nombre]
                        </td>
                        
                        <td style="background-color:white; width:150px; text-align: right">
                            Fecha: $fecha
                        </td>

		</tr>

	</table><br/><br/>
        <table>
		<tr>
			<td style="width:540px;color:#80E15B;font-size:12px;text-align:center;"><label>$titulo</label></td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$equipo = 1;
foreach($detalles as $key => $value){
if($value["formulario"] == 1){ // Expansión Directa
$bloque4 = <<<EOF
        <table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

        <table style="font-size:10px; padding:5px 10px;">
            <tr>
                <td style="border: 1px solid #666; background-color:#80E15B; color: white; width:540px; font-size: 12px"><b>Equipo #$equipo</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid #666; background-color:white; color:#80E15B; width:540px; font-size: 10px"><b>Condensador</b></td>
            </tr>
            
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Marca</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenmarca]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Modelo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenmodelo]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Serie</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenserie]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Capacidad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondencapacidad]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Ubicación</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[exdcondenubicacion]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Antiguedad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenantiguedad]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Operatividad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenoperatividad]</td>
            </tr>
            
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:120px;">Amp de Compresor</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L1</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdcondenampcoml1]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L2</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdcondenampcoml2]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L3</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdcondenampcoml3]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:120px;">Amp de Motor</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L1</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdcondenampmotl1]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L2</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdcondenampmotl2]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;"></td>
                <td style="border: 1px solid #666; background-color:white; width:70px;"></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Presión Alta</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenprealta]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Presión Baja</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdcondenprebaja]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:90px;">Refrigeración</td>
                <td style="border: 1px solid #666; background-color:white; width:90px;">$value[exdcondenrefrigerante]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:90px;">Voltaje</td>
                <td style="border: 1px solid #666; background-color:white; width:90px;">$value[exdcondenvoltaje]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:90px;">Fases</td>
                <td style="border: 1px solid #666; background-color:white; width:90px;">$value[exdcondenfases]</td>
            </tr>
            <tr>
                <td style="border: 1px solid #666; background-color:white; color:#80E15B; width:540px; font-size: 10px"><b>Evaporador</b></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevaportipo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Capacidad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevaporcapacidad]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Marca</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevapormarca]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Modelo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevapormodelo]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Ubicación</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[exdevaporubicacion]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Antiguedad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevaporantiguedad]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Operatividad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevaporoperatividad]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:120px;">Amp de Motor</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L1</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdevaporampmotl1]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L2</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[exdevaporampmotl2]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;"></td>
                <td style="border: 1px solid #666; background-color:white; width:70px;"></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo de Control</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevaportipcontrol]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Equipo Aterrado</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdevaporequiaterrado]</td>
            </tr>
            <tr>
                <td style="border: 1px solid #666; background-color:white; color: #80E15B; width:540px; font-size: 10px"><b>Otros Datos</b></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Distancia entre UC y UE (Promedio)</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdotrodistanciaucue]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Capacidad Requerida</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[exdotrocaprequerida]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Observaciones</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[exdobservaciones]</td>
            </tr>
       </table><br/>
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
else if($value["formulario"] == 2){ // Agua Helada
$bloque4 = <<<EOF
        <table>
            <tr>
                <td style="width:540px"><img src="images/back.jpg"></td>
            </tr>
	</table>
        <table style="font-size:10px; padding:5px 10px;">
            
            <tr>
                <td style="border: 1px solid #666; background-color:#80E15B; color: white; width:540px; font-size: 12px"><b>Equipo #$equipo</b></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghtipo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Marca</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghmarca]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Modelo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghmodelo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Serie</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghserie]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Área</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[agharea]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Antiguedad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghantiguedad]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Operatividad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghoperatividad]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Volts/Hz</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghvolhz]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">HLP</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghhlp]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Amp de Motor</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghampmot]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Temp. de Suministro</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghtempsuministro]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo de Control</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghtipcontrol]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Equipo Aterrado</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[aghequiaterrado]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Observaciones</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[aghobservaciones]</td>
            </tr>
       </table><br/><br/>
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
else if($value["formulario"] == 3){ // Formato
$bloque4 = <<<EOF
        <table>
            <tr>
                <td style="width:540px"><img src="images/back.jpg"></td>
            </tr>
        </table>

        <table style="font-size:10px; padding:5px 10px;">
            <tr>
                <td style="border: 1px solid #666; background-color:#80E15B; color: white; width:540px; font-size: 12px"><b>Equipo #$equipo</b></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Marca</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[formarca]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Modelo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[formodelo]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Serie</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forserie]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">HP</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forhp]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Ubicación</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[forubicacion]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Antiguedad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forantiguedad]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Operatividad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[foroperatividad]</td>
            </tr>
            
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:120px;">Amp de Motor</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L1</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[forampmotl1]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L2</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[forampmotl2]</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">L3</td>
                <td style="border: 1px solid #666; background-color:white; width:70px;">$value[forampmotl3]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Voltajes</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forvoltajes]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Fases</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forfases]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo de Control</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[fortipcontrol]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Equipo Aterrado</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forequiaterrado]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Distancia entre UC y UE (Promedio)</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[fordistanciaucue]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Capacidad Requerida</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[forcaprequerida]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Observaciones</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[forobservaciones]</td>
            </tr>
       </table><br/>
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
else if($value["formulario"] == 4){
$bloque4 = <<<EOF
        <table>
            <tr>
                <td style="width:540px"><img src="images/back.jpg"></td>
            </tr>
        </table>

        <table style="font-size:10px; padding:5px 10px;">
            <tr>
                <td style="border: 1px solid #666; background-color:#80E15B; color: white; width:540px; font-size: 12px"><b>Equipo #$equipo</b></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[rectipo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Capacidad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[reccapacidad]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Marca</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[recmarca]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Corriente Compresor</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[recampcompresor]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Modelo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[recmodelo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Presiones</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[recpresiones]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Serie</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[recserie]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Refrigerante/Voltaje</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[recrefrivolt]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Observaciones</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[recobservaciones]</td>
            </tr>
       </table><br/>
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');    
}
else if($value["formulario"] == 5){
$bloque4 = <<<EOF
        <table>
            <tr>
                <td style="width:540px"><img src="images/back.jpg"></td>
            </tr>
        </table>

        <table style="font-size:10px; padding:5px 10px;">
            <tr>
                <td style="border: 1px solid #666; background-color:#80E15B; color: white; width:540px; font-size: 12px"><b>Equipo #$equipo</b></td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Tipo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[caftipo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Capacidad</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafcapacidad]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Marca</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafmarca]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Corriente Compresor</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafampcompresor]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Modelo</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafmodelo]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Presiones</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafpresiones]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Serie</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafserie]</td>
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Refrigerante/Voltaje</td>
                <td style="border: 1px solid #666; background-color:white; width:135px;">$value[cafrefrivolt]</td>
            </tr>
            <tr style="font-size: 7px;">
                <td style="border: 1px solid #666; background-color:#E9E2CF; width:135px;">Observaciones</td>
                <td style="border: 1px solid #666; background-color:white; width:405px;">$value[cafobservaciones]</td>
            </tr>
       </table><br/>
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');        
}
$equipo = $equipo + 1;
}

// ---------------------------------------------------------
/*
foreach ($servicios as $key => $item) {

//$itemProducto = "descripcion";
//$valorProducto = $item["descripcion"];
//$orden = null;

//$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($item["preuni"], 2);

$precioTotal = number_format($item["preuni"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:340px; text-align:left">
				$item[nomser] <br/>
                                <b><i><u>DESCRIPCIÓN</u></i></b><br/>
                                $item[desser] <br/>
                                <b><i><u>TRABAJO A REALIZAR</u></i></b><br/>
                                $item[traser]                                
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">S/ 
				$valorUnitario
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">S/ 
				$precioTotal
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center; font-size: 8px">
				COSTO DIRECTO DE VENTA SIN IGV:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				S/ $respuestaCotizacion[monsigv]
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center; font-size: 8px;">
				IMPUESTO GENERAL A LAS VENTAS - IGV:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				S/ $respuestaCotizacion[igv]
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center; font-size: 8px;">
				PRECIO DE VENTA CON IGV:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				S/ $respuestaCotizacion[moncigv]
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

*/

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('reporte-'.$this->codigo.'.pdf', 'I');

}

}

$reporte = new imprimirReporte();
$reporte -> codigo = $_GET["codigo"];
$reporte -> traerImpresionReporte();

?>