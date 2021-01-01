<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}
include 'models/PengunjungModel.php';
$db = new PengunjungModel();
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = $db->report();
$html = '<center><h3>Daftar Pengunjung</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tipe Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Tanggal Berkunjung</th>
            </tr>';
            $no = 1;
            while($row = mysqli_fetch_array($query)) {
                $html .= "<tr>
                <td>".$no."</td>
                <td>".$row['nama']."</td>
                <td>".$row['tipe_anggota']."</td>
                <td>".$row['jenis_kelamin']."</td>
                <td>".$row['umur']."</td>
                <td>".$row['alamat']."</td>
                <td>".$row['tanggal']."</td>
                </tr>";
                $no++;
            }
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_pengunjung '.date("Y-m-d H:i:s").'.pdf');
?>