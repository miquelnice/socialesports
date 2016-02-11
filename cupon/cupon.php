<?php
require('fpdf.php');

include "../descargados.php";

//Connect to your database
$conexion=mysql_connect('localhost','root','');
mysql_select_db('eventracker', $conexion);

//Select the Products you want to show in your PDF file
$q="SELECT cupon.*, empresa.* FROM cupon, empresa where cupon.id=".$_GET["id"];
$res=mysql_query($q, $conexion);
$row= mysql_fetch_object($res); 
$pdf=new FPDF();
		$pdf->Open();
   		$pdf->AddPage(); 
		$pdf->SetFillColor(74,157,202);//rgb
		$pdf->SetDrawColor(74,157,202);
		$pdf->SetAutoPageBreak(true);
		
		$pdf->SetXY(5,5);
		$pdf->Cell(200,90,null,1,0,'L',0);
		
    	$pdf->Image("img/".$row->img,10,10,60,60); //imagen
		
		//empresa
		$pdf->SetXY(80,10);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(20,6,'Empresa:',0,0,'L',1);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$nombre=utf8_decode($row->nombre);
		$pdf->Cell(0,6,$nombre,1,0,'L',0);
		
		//titulo
		$pdf->SetXY(80,20);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(25,6,'Promoción:',0,0,'L',1);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$titulo=utf8_decode($row->titulo);
		$pdf->Cell(0,6,$titulo,1,0,'L',0);
				
		//descripcio texto
		$pdf->SetXY(80,30);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(120,5,'Descripción:',0,2,'L',1);
		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(0,0,0);
		$texto=utf8_decode($row->texto);
		$pdf->MultiCell(120,5,$row->texto,1,'L',0);
		
		//empresa
		$pdf->SetXY(80,50);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(40,6,'Cupón válido hasta:',0,0,'L',1);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$nombre=utf8_decode($row->fecha_validacion);
		$pdf->Cell(0,6,$nombre,1,0,'L',0);
						
		//pie de pagina
		$pdf->SetXY(10, 280);
		$pdf->SetTextColor(74,157,202);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,5,'Cupón de descuento canjeable en tienda '.$row->nombre.' - Socialesports 2012 - http://www.socialesports.com/',0,0,'L',0);
	
		$pdf->Output();		   
?> 