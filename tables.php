<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$page = "pengunjung";
include 'models/PengunjungModel.php';
$db = new PengunjungModel();
include 'includes/head.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                                <a href="tambah.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah</a>
                                <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                            </div>
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
                                            <th>Tanggal Berkunjung</th>
                                            <th>Aksi</th>
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
                                            <td>
                                                <a href="edit.php?id=<?= $x['id']; ?>&aksi=edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="controllers/PengunjungController.php?id=<?= $x['id']; ?>&aksi=hapus" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php 
            include 'includes/footer.php'
            ?>

            <script>
            $(document).ready(function() {
                $('#datatable').DataTable( {
                    "order": [[ 6, "desc" ]]
                } );
            } ); 
            </script>