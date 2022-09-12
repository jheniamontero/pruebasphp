<?php

 //Vigencia actual
$complementoFuncion = substr($_POST['vigencia'], 0, 4)<=2011?'':substr($_POST['vigencia'], 0, 4);
require_once('../../config/lang/eng.php');
require_once('../../tcpdf.php');
require_once('../../../Config.php');
require_once('../../../../remoting/services/DefinitivaEstudiante_'.$complementoFuncion.'.php');
require_once('../../../../remoting/services/InformacionGeneral_.php');
	// Extend the TCPDF class to create custom Header and Footer
	class mypdf_meci extends TCPDF {
		// Page footer
		public function Footer() {
			// Position at 15 mm from bottom
			$this->SetY(-10);
			// Set font
			$this->SetFont('helvetica', 'I', 8);
			$fechaHora = '	Fecha y hora de impresión '.date('d/m/Y').' - '.date('H:i:s');
			$pagina = '	www.colpegasus.com';
			// Page number
			if (empty($this->pagegroups)) {
				$pagenumtxt = ' Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages();
			} else {
				$pagenumtxt = ' Página '.$this->getPageNumGroupAlias().' de '.$this->getPageGroupAlias();
			}
			
			$this->Cell(88, 0, $fechaHora, 'T', $ln=0, 'C', 0, '', 0, false, 'T', 'C');
			$this->Cell(87, 0, $pagenumtxt, 'T', $ln=0, 'C', 0, '', 0, false, 'T', 'C');
			$this->Cell(87, 0, $pagina, 'T', $ln=0, 'C', 0, '', 0, false, 'T', 'C');
		}
		
		public function Header() {
			global  $colegio;
			$encabezado = cabecera();
			///Establecer el estilo para las tablas del reporte.
			$styleTable = "<style>
				table.stlTabla{
					border: 1px solid black;
				}
						
				td {
					font-size: 7pt;
				}
			</style>";
			$mini_escudo = "../../../../colegios/".$colegio."/imagenes/mini_escudo.jpg";
			$mini_villavicencio = "../../../../colegios/".$colegio."/imagenes/mini_villavicencio.jpg";	
		
			if (empty($this->pagegroups)) {
				$total_paginas = "           Página ".$this->getAliasNumPage()." de ".$this->getAliasNbPages();
			} else {
				$total_paginas = "           Página ".$this->getPageNumGroupAlias()." de ".$this->getPageGroupAlias();
			}
			$tblCabecera = $styleTable."
					<table class=\"stlTabla\" cellpadding=\"3\" border=\"1\">
					    <tr>
					            <td align=\"center\" colspan=\"2\" rowspan=\"3\"><img src=\"$mini_villavicencio\" width=\"60\" height=\"65\"/></td>
					        <td align=\"center\" colspan=\"8\"><b>".$encabezado['titulo1']."</b></td>
					        <td align=\"center\" colspan=\"3\">".$encabezado['codigo']."</td>
					     <td align=\"center\" colspan=\"2\" rowspan=\"3\"><img src=\"$mini_escudo\" width=\"60\" height=\"65\"/></td>
					    </tr>
					    <tr>
					        <td align=\"center\" colspan=\"8\">".$encabezado['titulo2']."</td>
					        <td align=\"center\" colspan=\"3\">".$encabezado['vigencia']."</td>
					    </tr>
					    <tr>
					        <td align=\"center\" colspan=\"8\">".$encabezado['titulo3']."</td>
					        <td align=\"center\" colspan=\"3\">Documento<br>Controlado<br>".$total_paginas."</td>
					    </tr>
					</table>";
			$path = "../../../../colegios/".$colegio."/imagenes/encabezado.jpg";
	/*
			if(file_exists($mini_escudo) && file_exists($mini_villavicencio)){ 
           		$this->writeHTML($tblCabecera, true, false, false, false, '');
			}
			else*/
			if(file_exists($path)){
				$html="<img width=\"520\" height=\"56\" src=\"$path\"/>"; 
				$this->writeHTML($html, true, false, false, false, 'C');
			}
				
		}
	}
	// create new PDF document
	$pdf = new mypdf_meci('L', PDF_UNIT, 'LETTER', true, 'UTF-8', false);
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Pegasus Software');
	$pdf->SetTitle('Histórico de valoración académica por estudiantes');
	$pdf->SetSubject('Histórico de valoración académica por estudiantes');
	$pdf->SetKeywords('Web Académica, Pegasus, Histórico de notas');
	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetFooterMargin(1);
	//set margins
	$pdf->setPrintHeader(true);
	$pdf->SetMargins(6, 20, 6);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	set_time_limit(0);
	$pdf->setPageOrientation('L', true, 15);
	
	//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, 10);
	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	//set some language-dependent strings
	$pdf->setLanguageArray($l);
	// -----------------------------------------------------------------------------
	// VARIABLES RECIBIDAS POR POST DESDE LA APLICACIÓN
	// -----------------------------------------------------------------------------
	$colegio 		= $_POST['colegio'];
	$periodo		= $_POST['periodo'];
	$sede			= $_POST['sede'];
	$jornada		= $_POST['jornada'];
	$grado_ini		= $_POST['grado_ini'];
	$grupo_ini		= $_POST['grupo_ini'];
	$grado_fin		= $_POST['grado_fin'];
	$grupo_fin		= $_POST['grupo_fin'];
	$modalidad		= $_POST['modalidad'];
	$exportar		= $_POST['exportar'];
	$ordenar        = $_POST['ordenar'];
	//echo $exportar;
	if($exportar=='1'){
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
		header ("Cache-Control: no-cache, must-revalidate");  
		header ("Pragma: no-cache");  
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=\"Definitivas Acumuladas.csv\"" );
	}
	 
	// -----------------------------------------------------------------------------
	//	CONFIGURACIÓN BD
	// -----------------------------------------------------------------------------
 	$BD = $prefijo.$colegio;
 	$enlace=mysql_connect($servidor,$db_usuario,$db_pass)or die('Error: '.mysql_error());
	mysql_select_db($BD)or die('Error: '.mysql_error());

	$informacionGeneral 	= new InformacionGeneral_($colegio);
	$definitivaEstudiante 	= new DefinitivaEstudiante_($colegio);
	$nombre_sede 			= $informacionGeneral->getNombreSede($sede);
	$nombre_jornada			= $informacionGeneral->getNombreJornada($jornada);
	$configuracion 			= $informacionGeneral->getConfiguracionGeneral();
	$notaMaximaPerdida 		= $informacionGeneral->getNotaMaximaPerdida();
	$notaMaxima     		= $informacionGeneral->getNotaMaxima();
	///Establecer el estilo para las tablas del reporte.
	$styleTitulo = "<style>
				table.stlTabla{
					border: 1px solid black;
				}
						
				td {
					font-size: 7pt;
				}
			</style>";
	$stylePlanilla = "<style>
					table.stlTabla{border: 1px solid black;}
					th {font-size: 7pt;}
					td {font-size: 8pt;}
				</style>";
	// -----------------------------------------------------------------------------
	//?	CUERPO DE REPORTE
	// -----------------------------------------------------------------------------
	//////////////////////////////////////////////
	///////////////////////////////////////////////
	$pdf->SetFillColor(224, 235, 255);
	$altocelda = 4.4;
	$fill=false;
	$parametros['sede'] 		= $sede;
	$parametros['jornada'] 		= $jornada;
	$parametros['grado_ini'] 	= $grado_ini;
	$parametros['grado_fin'] 	= $grado_fin;
	$parametros['grupo_ini'] 	= $grupo_ini;
	$parametros['grupo_fin'] 	= $grupo_fin;
	$parametros['modalidad'] 	= $modalidad;
	$cursos 					= $informacionGeneral->getCursos($parametros); 
	for($i=0;$i<count($cursos);$i++)
	{  	
		$j=0;		
		unset($parametros);
		$parametros['sede'] 				= $cursos[$i]['sede'];
		$parametros['jornada'] 				= $cursos[$i]['jornada'];
		$parametros['grado'] 				= $cursos[$i]['grado'];
		$parametros['grupo'] 				= $cursos[$i]['grupo'];
		$parametros['modalidad'] 			= $modalidad;
		$parametros['usa_comportamiento']   = $configuracion['usa_comportamiento'];
		unset($carga);
		$carga		 = $informacionGeneral->getCargaCurso($parametros);
		$parametros['acumulado'] = 1;
		$parametros['periodo']   = $periodo;
		$parametros['puesto_metodo']   = $configuracion['puesto_metodo'];
		$parametros['puesto_def']      = $configuracion['puesto_def'];
		$parametros['repetir_puesto']  = $configuracion['repetir_puesto'];
		$parametros['carga']           = $carga;
		$parametros['nota_maxima']     = $notaMaxima;
		$parametros['cantidad_decimales']= $configuracion['cantidad_decimales'];
		$parametros['trunca_aproxima']   = $configuracion['trunca_aproxima'];
		$parametros['sin_nota_supera']   = $configuracion['sin_nota_supera'];
		$parametros['calcula_promedio']  = $configuracion['calcula_promedio'];
		$parametros['colegio'] 	         = $colegio;
		$parametros['ordenar'] 	         = $ordenar;
        
        if(count($carga) == 0){ continue 1; }
        
        $pdf->startPageGroup();
		$pdf->AddPage();
		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->Write($h=0, $p.'PROMEDIO DE DEFINITIVAS DE MATERIA POR PERIODO', $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
		$pdf->SetFont('helvetica', '', 9);
		$tblEstudiante = $styleTitulo."
					<table class=\"stlTabla\"  cellpadding=\"3\" >
					   <tr>		
					   					<th width=\"260\"> <b>SEDE:</b> ".$nombre_sede."</th>
					        			<th width=\"180\"> <b>JORNADA:</b> ".$nombre_jornada." </th>
					        			<th width=\"220\"> <b>GRADO:</b> ".utf8_encode($cursos[$i]['nombre_grado']."-".$cursos[$i]['grupo'])." </th>
										<th width=\"165\"> <b>PERIODO:</b> ".$periodo."  </th>
										<th width=\"100\"> <b>VIGENCIA:</b> ".$_POST['vigencia']."  </th>
						</tr>			
					</table>";
		$pdf->writeHTML($tblEstudiante, true, false, false, false, '');
		$datosExportar[$i]['encabezado']	= 'SEDE:'.$nombre_sede.'       JORNADA:'. $nombre_jornada.'      GRADO: '.$cursos[$i]['nombre_grado'].'-'.$cursos[$i]['grupo'].'      PERIODO: '.$periodo;
		
		$pdf->SetFont('helvetica', '', 7);
				
		$puestos     = $definitivaEstudiante->calcularPuestos($parametros);
    	$pdf->MultiCell(6, 4, 'No', 1, 'C',  $fill,0,'','',true,0,false,true,6,'T',false);
		$pdf->MultiCell(60, 4, 'NOMBRE', 1, 'C',  $fill,0,'','',true,0,false,true,6,'T',false);
        
		$anchocelda = 180/count($carga);
		for($materia=0;$materia<count($carga);$materia++)
		{   
			$pdf->MultiCell($anchocelda, 4, $carga[$materia]['m_abrev'], 1, 'C',  $fill,0,'','',true,0,false,true,6,'T',false);
			$datosExportar[$i]['m_abrev'] .= $carga[$materia]['m_abrev'].";";
		}
    	$pdf->MultiCell(6, 4, 'P', 1, 'C',  $fill,0,'','',true,0,false,true,6,'T',false);
		$pdf->MultiCell(10, 4, 'PRO', 1, 'C',  $fill,0,'','',true,0,false,true,6,'T',false);
		$pdf->Ln();
		$alumno=1;
		foreach($puestos as $indice => $valor)
		{
			$pdf->Cell(6, $altocelda, ($alumno), 'LR', 0, 'L',  $fill);
			$pdf->Cell(60, $altocelda, $puestos[$indice]['nombre'], 'LR', 0, 'L',  $fill);
			$x='';
			
			 $datosExportar[$i][$j]['no']	 = $alumno;
			 $datosExportar[$i][$j]['alumno'] = $puestos[$indice]['nombre'];	
			 for($materia=0;$materia<count($carga);$materia++)
	 		 {
	 			
	 			$nota=$informacionGeneral->formato_numero($puestos[$indice][$carga[$materia]['id_area']][$carga[$materia]['id_materia']]['NF'],$configuracion['cantidad_decimales'],$configuracion['trunca_aproxima']);
	 			$pdf->Cell($anchocelda, $altocelda, ($nota), 'LR', 0, 'L',  $fill);
	 			$x='';
	 			$datosExportar[$i][$j]['nota'] .= $nota.';';		
	 		 }
			 			$pdf->Cell(6, $altocelda, $puestos[$indice]['perdidas'], 'LR', 0, 'L',  $fill);
			 			$pdf->Cell(10, $altocelda, $informacionGeneral->formato_numero($puestos[$indice]['promedio'],$configuracion['cantidad_decimales'],$configuracion['trunca_aproxima']), 'LR', 1, 'L',  $fill);

			$fill=!$fill; 
			$datosExportar[$i][$j]['perdidas']	 = $puestos[$indice]['perdidas'];
			$datosExportar[$i][$j]['promedio']	 = $informacionGeneral->formato_numero($puestos[$indice]['promedio'],$configuracion['cantidad_decimales'],$configuracion['trunca_aproxima']);
			$alumno++;
			$j++;
		} 	 
		$pdf->Cell(262, 0, '', 'T');
		$texto  = ("CONVENCIONES:<br>");
		$texto  .=("P	: Cantidad de materias perdidas por el estudiante de acuerdo al promedio de cada materia.<br>");
		$texto  .=("SUM	: Suma acumulada de los promedios de las definitivas de materia.<br>");
		//$texto .=("Nota	: El reporte está ordenado por la suma de las definitivas del estudiante y podría estar configurado para que tenga en cuenta materias perdidas. Acérquese a coordinación académica para conocer la configuración del reporte en el colegio.<br>");
		$pdf->writeHTML($texto, true, false, false, false, '');
	}	
		
	// -----------------------------------------------------------------------------
	
	//Elegir si exportar o generar en pdf
	//echo $exportar;
	if($exportar == '1'){
			ExportarExcel($datosExportar);
	}
	else{
		//Close and output PDF document
		 $pdf->Output('Definitiva por periodo.pdf', 'I');
	}
	
	/*	datos:		Elementos de entrada sobre el GRADO.
	*	Dibula:		Dibuja el archivo separado por punto y coma para generar csv a excel.
	 */
	function ExportarExcel($datos) { 
		echo utf8_decode(";;;DEFINITIVAS ACUMULADAS DE MATERIA");
		echo "\n\n\n";

		for($i=0;$i<sizeof($datos);$i++){  
			echo utf8_decode($datos[$i]['encabezado']).";\n\n";
			echo 'No;NOMBRE;'.utf8_decode($datos[$i]['m_abrev']).'PERDIDAS;PROMEDIO';
			echo "\n";
		    for($j=0;$j<sizeof($datos[$i]);$j++){
				echo	$datos[$i][$j]['no'].";".
						utf8_decode($datos[$i][$j]["alumno"]).";".
						$datos[$i][$j]['nota'].
						$datos[$i][$j]['perdidas'].";".
						str_replace(".", ",", $datos[$i][$j]['promedio']);
				echo "\n";		
			}
		}
		echo "\n";
		echo "\n";
	}
	
	/*	cabecera:	Retorna los datos de cabecera del reporte a partir de la tabla reportes.
	*	Retorna:	un vector asociativo de nombre $encabezado que contiene los datos propios del reporte.
	 */
	function cabecera(){
		$encabezado['titulo1'] 	= '';
		$encabezado['titulo2']	= '';
		$encabezado['titulo3']	= '';
		$encabezado['codigo']	= '';
		$encabezado['vigencia'] = '';
		$sentencia = "SELECT titulo1, titulo2, titulo3, codigo, vigencia
						FROM reportes WHERE id_categoria = 45;";
		$Result =  mysql_query($sentencia)or die('Error: '.mysql_error());
		
		while($datos = mysql_fetch_row($Result)){
			$encabezado['titulo1'] 	= utf8_encode($datos[0]);
			$encabezado['titulo2']	= utf8_encode($datos[1]);
			$encabezado['titulo3']	= utf8_encode($datos[2]);
			$encabezado['codigo']	= utf8_encode($datos[3]);
			$encabezado['vigencia'] = utf8_encode($datos[4]);
		}
				
		return $encabezado;
	}
	


	
//============================================================+
// END OF FILE                                                
//============================================================+