<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'models/PengunjungModel.php';
$db = new PengunjungModel();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->   
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <title>Perpustakaan Umum</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="#">Perpustakaan Umum</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    
        <div class="mt-4">
            <div class="row row-cols-2">
                <div class="col-8">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ml-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Tipe Anggota</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($db->tampil_data() as $x){
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $x['nama']; ?></td>
                                            <td><?= $x['tipe_anggota']; ?></td>
                                            <td><?= $x['jenis_kelamin']; ?></td>
                                            <td><?= $x['umur']; ?></td>
                                            <td><?= $x['alamat']; ?></td>
                                            <td><?= $x['tanggal']; ?></td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mr-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Kunjungan</h6>
                        </div>
                        <div class="card-body">
                        <form action="controllers/PengunjungController.php?aksi=tambahPengunjung" method="post">
                            <div class="form-group">
                                <label for="exampleNama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleTipeAnggota">Tipe Keanggotaan</label>
                                <select class="form-control" name="tipeAnggota" id="tipeAnggota" required>
                                    <option value="">Pilih Tipe Keanggotaan</option>
                                    <option value="PNS/POLRI/TNI">PNS/POLRI/TNI</option>
                                    <option value="TK/SD">TK/SD</option>
                                    <option value="SMP/MTS">SMP/MTS</option>
                                    <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Masyarakat Umum">Masyarakat Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleJenisKelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenisKelamin" id="jenisKelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleUmur">Umur</label>
                                <input type="number" class="form-control" name="umur" id="umur" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleAalamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="2" required></textarea>
                            </div>
                            <input type="hidden" name="tanggal" value="<?= date("Y-m-d H:i:s"); ?>">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

        <!-- datatables -->
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable( {
                    "order": [[ 6, "desc" ]]
                } );
            } );
        </script>
    </body>
</html>