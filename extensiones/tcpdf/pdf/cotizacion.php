<?php

require_once "../../../controladores/cotizaciones.controlador.php";
require_once "../../../modelos/cotizaciones.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

/*require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";*/

class imprimirCotizacion{

public $codigo;

public function traerImpresionCotizacion(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemCotizacion = "numcot";
$valorCotizacion = $this->codigo;

$respuestaCotizacion = ControladorCotizaciones::ctrMostrarCotizaciones($itemCotizacion, $valorCotizacion);
if($respuestaCotizacion["moneda"] === "soles"){
$moneda = "S/";
}
else{
$moneda = "$";    
}

//$fecha = substr($respuestaCotizacion["feccot"],0,-8);
$numtic = $respuestaCotizacion["numtic"];
$agencia = $respuestaCotizacion["agencia"];

// TRAER LOS SERVICIOS
$item = "cotcab";
$valor = $respuestaCotizacion["id"];
$servicios = ControladorCotizaciones::ctrBuscarServicios($item, $valor);

$atendido = $respuestaCotizacion["atencion"];
//$productos = json_decode($respuestaCotizacion["productos"], true);
//$neto = number_format($respuestaVenta["neto"],2);
//$impuesto = number_format($respuestaVenta["impuesto"],2);
//$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "idcli";
$valorCliente = $respuestaCotizacion["cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

/*$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);*/

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

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

			<td style="background-color:white; width:120px; text-align:center; color:red"><br><br>COTIZACIÓN<br> Nº. $valorCotizacion</td>

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
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $respuestaCliente[nomcli]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $respuestaCotizacion[feccot]

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">
                            Atención: $atendido
                        </td>
                        
                        <td style="border: 1px solid #666; background-color:white; width:150px; text-align: right">
                            Nº Ticket: $numtic
                        </td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:330px; text-align:left"><b><i>Servicio</i></b></td>
                <td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($servicios as $key => $item) {

//$itemProducto = "descripcion";
//$valorProducto = $item["descripcion"];
//$orden = null;

//$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);
$total = $item["preuni"] * $item["cantida"]; 

$valorUnitario = number_format($item["preuni"], 2);

$precioTotal = number_format($total, 2);

$bloque4 = <<<EOF

	<table style="padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:330px; text-align:left;">
				<label style="font-size: 10px;"><b>$item[nomser]</b></label> <br/>
                                <label style="font-size: 7px;"><i><u>DESCRIPCI&Oacute;N</u></i></label>
                                <label style="font-size: 7px; margin-top: 2px;">$item[desser]</label>
                                <label style="font-size: 7px;"><i><u>TRABAJO A REALIZAR</u></i></label>
                                <label style="font-size: 7px; margin-top: 2px;">$item[traser]</label>                                
			</td>
                        
                        <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center; font-size: 10px;"> 
				$item[cantida]
			</td>
        
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center; font-size: 10px;">$moneda 
				$valorUnitario
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center; font-size: 10px;">$moneda 
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

			<td style="color:#333; background-color:white; width:370px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:370px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center; font-size: 7px">
				COSTO DIRECTO DE VENTA SIN IGV:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:right">
				$moneda $respuestaCotizacion[monsigv]
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:370px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center; font-size: 7px;">
				IMPUESTO GENERAL A LAS VENTAS - IGV:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:right">
				$moneda $respuestaCotizacion[igv]
			</td>

		</tr>
                <tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:370px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center; font-size: 7px;">
				DESCUENTO:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:right">
				$moneda $respuestaCotizacion[mondes]
			</td>

		</tr>
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:370px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center; font-size: 7px;">
				PRECIO DE VENTA CON IGV:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:right">
				$moneda $respuestaCotizacion[moncigv]
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');



// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('cotizacion-'.$this->codigo.'.pdf', 'I');

}

}

$cotizacion = new imprimirCotizacion();
$cotizacion -> codigo = $_GET["codigo"];
$cotizacion -> traerImpresionCotizacion();

?>