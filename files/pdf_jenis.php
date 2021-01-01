<?php
    include "fpdf/fpdf.php";
    class PDF extends FPDF
    {
        function Footer()
        {
            // Go to 1.5 cm from bottom
            $this->SetY(-15);
            // Select Arial italic 8
            $this->SetFont('Arial','I',8);
            // Print centered page number
            $this->Cell(0 ,10,'Halaman '.$this->PageNo(),0,0,'C');
        }
        
    }
    session_start();
    $exe = mysqli_query($con, "SELECT * FROM identitas");
    $row = mysqli_fetch_object($exe);
    $pdf = new PDF('P','mm','A4');//P atau L = orientasi kertas, mm = ukuran, A4 = jenis kertas
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    //Arial = jenis huruf, B = format huruf, 10 = ukuran

    //$pdf->Cell(40,10,'',1);//40 = panjang, 10 = tinggi, 1 = tingkat ketebalan garis
    $pdf->Line(200, 40, 10, 40);

    // Header
    $pdf->Image('images/'.$row->logo_kiri,10, 10, 20, 20);
    $pdf->Image('images/'.$row->logo_kanan,180, 10, 20, 20);
    $pdf->Ln(2);//Ln = pindah baris
    $pdf->Cell(190,10,$row->nama_identitas,0,0,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(190,10,$row->alamat,0,0,'C');
    $pdf->Ln(25);//Ln = pindah baris
    $pdf->SetTitle("Data Jenis");
    $pdf->Ln(10);//Ln = pindah baris
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(190,10,'Data Jenis',0,0,'C');
    $pdf->SetFont('Arial','B',10); 
    $pdf->Ln(15);//Ln = pindah baris


    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->MultiCell(10, 5,'NO','T','C');
    $pdf->SetXY($x + 10, $y);
    $pdf->MultiCell(90, 5,'JENIS','T','C');
    $pdf->SetXY($x + 100, $y);
    $pdf->MultiCell(90,5,'KETERANGAN','T', 'C');
    
    //pindah baris
    $pdf->Ln(5);
 
    $no = 1;
 
    $sql = "SELECT * FROM jenis ORDER BY jenis DESC";
    $query = mysqli_query($con, $sql) or die (mysqli_error());
    $pdf->SetFont('Arial','',10); 
    while($data = mysqli_fetch_array($query)){
      $x = $pdf->GetX();
      $y = $pdf->GetY();
      $pdf->SetXY($x, $pdf->GetY());
      $pdf->MultiCell(10,5, $no.".",  'T', 'C');
      $pdf->SetXY($x + 10, $y);
      $pdf->MultiCell(90,5, $data["jenis"], 'T', 'C');
      $pdf->SetXY($x + 100, $y);
      $pdf->MultiCell(90,5, $data["keterangan"], 'T', 'C');
 
      $pdf->Ln(5);
      $no++;
 
    }
    $pdf->SetAutoPageBreak(auto, 30);
    //cetak
    $pdf->Output("", "Data Jenis (".date("H-i-s")."_".date("d-m-Y").")");
    write_log('Export PDF Jenis Surat ('.$_SESSION['user_id'].')');
    mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Jenis Surat','$ip','Export PDF Jenis Surat (".$_SESSION['user_id'].")')");
?>