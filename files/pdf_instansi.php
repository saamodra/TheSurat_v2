<?php
    include "fpdf/fpdf.php";
    class PDF extends FPDF
    {
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0 ,10,'Halaman '.$this->PageNo(),0,0,'C');
        }
        
    }
    session_start();
    $exe = mysqli_query($con, "SELECT * FROM identitas");
    $row = mysqli_fetch_object($exe);
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
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
    $pdf->SetTitle("Data Instansi");
    $pdf->Ln(10);//Ln = pindah baris
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(190,10,'Data Instansi',0,0,'C');
    $pdf->SetFont('Arial','B',10); 
    $pdf->Ln(15);//Ln = pindah baris


    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(10, 7,'NO','T','C');
    $pdf->SetXY($x + 10, $y);
    $pdf->MultiCell(30, 7,'NAMA INSTANSI','T','C');
    $pdf->SetXY($x + 40, $y);
    $pdf->MultiCell(40,7,'ALAMAT','T', 'C');
    $pdf->SetXY($x + 80, $y);
    $pdf->MultiCell(20,7,'KOTA','T', 'C');
    $pdf->SetXY($x + 100, $y);
    $pdf->MultiCell(30,7,'TELP','T', 'C');
    $pdf->SetXY($x + 130, $y);
    $pdf->MultiCell(30,7,'EMAIL','T', 'C');
    $pdf->SetXY($x + 160, $y);
    $pdf->MultiCell(30,7,'WEBSITE','T', 'C');
    
    //pindah baris
    $pdf->Ln(7);
    $no = 1;
    $sql = "SELECT * FROM instansi ORDER BY nama_instansi DESC";
    $query = mysqli_query($con, $sql) or die (mysqli_error());
    $pdf->SetFont('Arial','',10); 
    while($data = mysqli_fetch_array($query)){
      $x = $pdf->GetX();
      $y = $pdf->GetY();
      $pdf->SetXY($x, $pdf->GetY());
      $pdf->MultiCell(10,7, $no.".",  'T', 'C');
      $pdf->SetXY($x + 10, $y);
      $pdf->MultiCell(30,7, $data["nama_instansi"], 'T', 'C');
      $pdf->SetXY($x + 40, $y);
      $pdf->MultiCell(40,7, $data["alamat"], 'T', 'C');
      $pdf->SetXY($x + 80, $y);
      $pdf->MultiCell(20,7, $data["kota"], 'T', 'C');
      $pdf->SetXY($x + 100, $y);
      $pdf->MultiCell(30,7, $data["telp"], 'T', 'C');
      $pdf->SetXY($x + 130, $y);
      $pdf->MultiCell(30,7, $data["email"], 'T', 'C');
      $pdf->SetXY($x + 160, $y);
      $pdf->MultiCell(30,7, $data["website"], 'T', 'C');
      $pdf->Ln(7);
      $no++;
 
    }
    $pdf->SetAutoPageBreak(auto, 30);
    //cetak
    $pdf->Output("", "Data Instansi (".date("H-i-s")."_".date("d-m-Y").")");
    write_log('Export PDF Instansi ('.$_SESSION['user_id'].')');
    mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Instansi','$ip','Export PDF Instansi (".$_SESSION['user_id'].")')");
?>