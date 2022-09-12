<?php

// Include the main TCPDF library (search for installation path).
require_once("../libreria/tcpdf.php");
//incluir conexion para generar consultas
require_once("../models/usuariosModels.php");



// create herencia padre document
class PDF extends TCPDF{

#cabecera del pdf
    function Header(){

        $this->Image('assets/img/img1.png',10,8,33);
        $this->SetFont('','B',19);  
        $this->Cell(50);
        $this->Cell(70,10,utf8_decode('Reporte de usuarios'));  
}
#pie de pagina
    function Footer(){
        $this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); //para mostrar el numero de paginas
        $this->SetHeaderMargin(PDF_MARGIN_HEADER); //margen encabezado
        $this->SetFooterMargin(PDF_MARGIN_FOOTER);
       // $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
 
    }

}

    //empezamos a crear el pdf
//require_once('../config/conexionPHP.php');
    $consulta = "SELECT * FROM glpi_users WHERE id <= 50;";
    $result=$mysqli->query($consulta);

    $pdf= new PDF(); //creamos el objeto y llamamos a la clase
    $pdf->getAliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('','',16);
    //$pdf->Cell(40,10,"hola aqui empezara el reporte");

    //mostraremos la consulta de la base de datos
    while($row = $result->fetch_assoc()){
        $pdf->cell(30,10,$row['id'], 1,0,'C',0);
        $pdf->cell(45,10,$row['name'], 1,1,'C',0);
        $pdf->celL(65,30,$row['realname'], 1, 0,'C',0);
    }
    $pdf->Output();
#mostrar tabla de informacion
?>