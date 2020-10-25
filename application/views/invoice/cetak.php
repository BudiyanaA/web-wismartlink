<?php
require('assets/fpdf/pdf.php');

$pdf=new PDF('P','mm','A4');

$pdf->setMargins(10,6,10); 
$pdf->AddPage(); 
$pdf->Image('assets/img/icon/wismart logo 2.png',10,6,25);
$pdf->Ln(5); 
$pdf->SetFont('Arial','B',20); 
$pdf->Cell(0,5,"#" . $nomor_invoice . " / " . date("d M Y"),0,1,'R'); 
// $pdf->SetFont('Arial','B',12); 
// $pdf->Cell(0,5,'Sukses Selalu Logistik',0,1,'C'); 
// $pdf->SetFont('Arial','',12); 
// $pdf->Cell(0,5,'"Solusi terbaik pengiriman anda"',0,1,'C'); 

$pdf->SetLineWidth(0.5);
$pdf->Line(10,28,200,28);
$pdf->Ln(20); 

$pdf->SetFont('Arial','B',16); 
$pdf->Cell(0,5,'Kepada:',0,1,'L');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12); 
$pdf->Cell(0,5,$nama_user,0,1,'L');
$pdf->Cell(0,5,$nama_unit . ", Lantai " . $lantai . ", Nomor " . $nomor,0,1,'L');
$pdf->Cell(0,5,$nama_apartemen . ", " . $nama_gedung,0,1,'L');
$pdf->Cell(0,5,$alamat,0,1,'L');
$pdf->Cell(0,5,$kota,0,1,'L');

$pdf->SetLineWidth(0.5);
$pdf->Line(10,78,200,78);
$pdf->Ln(20);

$pdf->SetFont('Arial','B',16); 
$pdf->Cell(0,5,'Sewa Apartemen:',0,1,'L');
$pdf->Ln(5);

$cellWidth=140;
$cellHeight=10;
$pdf->SetLineWidth(0.1);

$xPos=$pdf->GetX();
$yPos=$pdf->GetY();
$pdf->SetFont('Arial','B',12); 
$pdf->MultiCell(10,$cellHeight,"#",1);
$pdf->SetXY($xPos + 10 , $yPos);
$pdf->MultiCell(60,$cellHeight,"Item",1);
$pdf->SetXY($xPos + 70 , $yPos);
$pdf->MultiCell(70,$cellHeight,"Description",1);
$pdf->SetXY($xPos + 140 , $yPos);
$pdf->MultiCell(50,$cellHeight,"Total",1);

$xPos=$pdf->GetX();
$yPos=$pdf->GetY();
$pdf->SetFont('Arial','',12); 
$pdf->MultiCell(10,$cellHeight,1,1);
$pdf->SetXY($xPos + 10 , $yPos);
$pdf->MultiCell(60,$cellHeight,"Biaya sewa apartemen",1);
$pdf->SetXY($xPos + 70 , $yPos);
$pdf->MultiCell(70,$cellHeight,"Biaya sewa apartemen per bulan",1);
$pdf->SetXY($xPos + 140 , $yPos);
$pdf->MultiCell(50,$cellHeight,"Rp. " . number_format($tagihan_apartemen, 2),1);

$pdf->SetLineWidth(0.5);
$pdf->Line(10,138,200,138);
$pdf->Ln(25);

$pdf->SetFont('Arial','B',16); 
$pdf->Cell(0,5,'Maintenance Charge:',0,1,'L');
$pdf->Ln(5);

$cellWidth=140;
$cellHeight=10;
$pdf->SetLineWidth(0.1);

$xPos=$pdf->GetX();
$yPos=$pdf->GetY();
$pdf->SetFont('Arial','B',12); 
$pdf->MultiCell(10,$cellHeight,"#",1);
$pdf->SetXY($xPos + 10 , $yPos);
$pdf->MultiCell(60,$cellHeight,"Item",1);
$pdf->SetXY($xPos + 70 , $yPos);
$pdf->MultiCell(70,$cellHeight,"Description",1);
$pdf->SetXY($xPos + 140 , $yPos);
$pdf->MultiCell(50,$cellHeight,"Total",1);

$xPos=$pdf->GetX();
$yPos=$pdf->GetY();
$pdf->SetFont('Arial','',12); 
$pdf->MultiCell(10,$cellHeight,1,1);
$pdf->SetXY($xPos + 10 , $yPos);
$pdf->MultiCell(60,$cellHeight,"Biaya sewa apartemen",1);
$pdf->SetXY($xPos + 70 , $yPos);
$pdf->MultiCell(70,$cellHeight,"Biaya sewa apartemen per bulan",1);
$pdf->SetXY($xPos + 140 , $yPos);
$pdf->MultiCell(50,$cellHeight,"Rp. " . number_format($tagihan_apartemen, 2),1);


// Data
// foreach($tagihan_apartemen as $row)
// {
//     foreach($row as $col)
        // $pdf->Cell(40,6,$tagihan_apartemen,1);
//     $pdf->Ln();
// }

// $hasil['pesan'] = "Lorem ipsum dolor sit amet, \nconsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

// $cellWidth=140;
// $cellHeight=10;

// $pdf->Ln(4);
// $pdf->SetLineWidth(0.4); 
// $pdf->SetFont("Times", "B", "12");
// $pdf->Cell(140, 10, "A. FROM (SHIPPER)", 1, 0, "L");
// $pdf->Cell(140, 10, "D. SHIPMENT INFORMATION", 1, 1, "L");

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();

// $pdf->SetFont("Times", "", "11");
// $pdf->MultiCell(70,$cellHeight,"Shipper's Account No."."\n".$tracking[0]->nama_agen,1);
// $pdf->SetXY($xPos + 70 , $yPos);
// $pdf->MultiCell(70,$cellHeight,"Shipper's Ref. "."\n"."---",1);
// $pdf->SetXY($xPos + 140 , $yPos);
// $pdf->MultiCell(30,$cellHeight,"No. of Pieces"."\n"."1",1);
// $pdf->SetXY($xPos + 170 , $yPos);
// $pdf->MultiCell(30,$cellHeight,"Actual Weight"."\n".$tracking[0]->BERAT_PENGIRIMAN,1);
// $pdf->SetXY($xPos + 200 , $yPos);
// $pdf->MultiCell(40,$cellHeight,"Chargeable Weight"."\n"."---",1);
// $pdf->SetXY($xPos + 240 , $yPos);
// $pdf->MultiCell(40,$cellHeight,"Country of Manufacture"."\n"."---",1);

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();

// $pdf->Cell(70, 10, "From : ".$tracking[0]->NAMA_CUST, 1, 0, "L");
// $pdf->Cell(70, 10, "Phone Number : ".$tracking[0]->NO_TELP_CUST, 1, 0, "L");
// $pdf->MultiCell(80,$cellHeight,"Description of Goods / Harmonized Code"."\n".$barang[0]->NAMA_BARANG,1);
// $pdf->SetXY($xPos + 220 , $yPos);
// $pdf->MultiCell(30,$cellHeight,"Customs Value"."\n"."0",1);
// $pdf->SetXY($xPos + 250 , $yPos);
// $pdf->MultiCell(30,$cellHeight,"Currency "."\n"."IDR",1);

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();
// $pdf->SetXY($xPos, $yPos - 10);
// $pdf->MultiCell(140,$cellHeight,"Street Address"."\n".$tracking[0]->ALAMAT_CUST,1);
// $pdf->SetXY($xPos + 140, $yPos);
// $pdf->MultiCell(140,$cellHeight,"Resi Number"."\n".$tracking[0]->NO_RESI,1);

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();
// $pdf->SetXY($xPos, $yPos);
// $pdf->Cell(70, 10, "City : ".$tracking[0]->KOTA_CUST, 1, 0, "L");
// $pdf->Cell(70, 10, "State / Province : ", 1, 1, "L");

// $pdf->SetFont("Times", "B", "12");
// $pdf->Cell(140, 10, "B. TO (RECEIVER)", 1, 1, "L");
// $pdf->SetFont("Times", "", "12");
// $pdf->SetXY($xPos + 140, $yPos);
// $pdf->MultiCell(140,$cellHeight,"Release Date :"."\n".$tracking[0]->TGL_PENGIRIMAN."\n"."___________",1);

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();
// $pdf->SetXY($xPos, $yPos - 10);
// $pdf->MultiCell(70,$cellHeight,"To (ReceiverName) "."\n".$tracking[0]->NAMA_PENERIMA,1);
// $pdf->SetXY($xPos + 70 , $yPos - 10);
// $pdf->MultiCell(70,$cellHeight,"Phone Number(s)"."\n".$tracking[0]->NO_TELP_PENERIMA,1);

// $pdf->SetXY($xPos + 140, $yPos);
// $pdf->SetFont("Times", "B", "12");
// $pdf->Cell(140, 10, "C. SHIPPER'S SIGNATURE & AUTHORIZATION", 1, 1, "L");

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();
// $pdf->SetFont("Times", "", "12");
// $pdf->SetXY($xPos + 140, $yPos);
// $pdf->Cell(70, 20, "Shipper's Signature(*Required)", 1, 0, "L");
// $pdf->Cell(70, 20, "Date / Time", 1, 1, "L");
// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();
// $pdf->SetXY($xPos + 140, $yPos);
// $pdf->Cell(70, 20, "Received Signature(*Required)", 1, 0, "L");
// $pdf->Cell(70, 20, "Date / Time", 1, 1, "L");

// $xPos=$pdf->GetX();
// $yPos=$pdf->GetY();
// $pdf->SetXY($xPos, $yPos - 40);
// $pdf->MultiCell(140,$cellHeight,"Street Address"."\n".$tracking[0]->ALAMAT_PENERIMA,1);

// $pdf->Cell(70, 10, "City : ".$tracking[0]->NAMA_KOTA, 1, 0, "L");
// $pdf->Cell(70, 10, "State / Province : " .$tracking[0]->NAMA_PROVINSI, 1, 1, "L");
// $pdf->Cell(80, 10, "Country : ".$tracking[0]->NAMA_NEGARA, 1, 0, "L");
// $pdf->Cell(60, 10, "Zip / Postal Code : ".$pengiriman[0]->KODE_POS, 1, 1, "L");

$pdf->Output();
?>