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
    $pdf->SetTitle("Data Surat Masuk");
    $pdf->Ln(10);//Ln = pindah baris
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(190,10,'Data Surat Masuk',0,0,'C');
    $pdf->SetFont('Arial','B',10); 
    $pdf->Ln(15);//Ln = pindah baris

    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->MultiCell(10, 5,'NO','T','C');
    $pdf->SetXY($x + 10, $y);
    $pdf->MultiCell(20, 5,'NO. SURAT','T','C');
    $pdf->SetXY($x + 30, $y);
    $pdf->MultiCell(25,5,'PENERIMA','T', 'C');
    $pdf->SetXY($x + 55, $y);
    $pdf->MultiCell(30,5,'PRIHAL','T', 'C');
    $pdf->SetXY($x + 85, $y);
    $pdf->MultiCell(25,5,'TGL. SURAT','T', 'C');
    $pdf->SetXY($x + 110, $y);
    $pdf->MultiCell(25,5,'TGL. TERIMA','T', 'C');
    $pdf->SetXY($x + 135, $y);
    $pdf->MultiCell(30,5,'PENGIRIM','T', 'C');
    $pdf->SetXY($x + 165, $y);
    $pdf->MultiCell(25,5,'LOKASI','T', 'C');
    
    //pindah baris
    $pdf->Ln(5);
    $no = 1;
    $sql = "SELECT s.surat_masuk_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_terima, s.tanggal_expired, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, s.tindak_lanjut, l.lokasi, l.keterangan FROM surat_masuk s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id";
    $query = mysqli_query($con, $sql) or die (mysqli_error());
    $pdf->SetFont('Arial','',10); 
    while($data = mysqli_fetch_array($query)){
      $x = $pdf->GetX();
      $y = $pdf->GetY();
      $pdf->MultiCell(10, 5, $no,'T','C');
      $pdf->SetXY($x + 10, $y);
      $pdf->MultiCell(20, 5, $data['nomor_surat'],'T','C');
      $pdf->SetXY($x + 30, $y);
      $pdf->MultiCell(25,5, $data['bagian'],'T', 'C');
      $pdf->SetXY($x + 55, $y);
      $pdf->MultiCell(30,5, $data['perihal'],'T', 'C');
      $pdf->SetXY($x + 85, $y);
      $pdf->MultiCell(25,5, $data['tanggal_surat'],'T', 'C');
      $pdf->SetXY($x + 110, $y);
      $pdf->MultiCell(25,5, $data['tanggal_terima'],'T', 'C');
      $pdf->SetXY($x + 135, $y);
      $pdf->MultiCell(30,5, $data['nama_instansi'],'T', 'C');
      $pdf->SetXY($x + 165, $y);
      $pdf->MultiCell(25,5, $data['lokasi'],'T', 'C');
      $pdf->Ln(5);
      $no++;
    }
    $pdf->SetAutoPageBreak(auto, 30);
    //cetak
    $pdf->Output("", "Data Surat Masuk (".date("H-i-s")."_".date("d-m-Y").")");
    write_log('Export PDF Surat Masuk ('.$_SESSION['user_id'].')');
    mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Surat Masuk','$ip','Export PDF Surat Masuk (".$_SESSION['user_id'].")')");
?>