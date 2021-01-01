<?php 
include 'models/PengunjungModel.php';
$db = new PengunjungModel();
include 'includes/head.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
?>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Kunjungan</h6>
                        </div>
                        <div class="card-body">
                        <form action="controllers/PengunjungController.php?aksi=tambah" method="post">
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
                            <div class="d-flex justify-content-between">
                                <a href="tables.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
<?php 
include 'includes/footer.php'
?>