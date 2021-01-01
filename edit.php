<?php 
include 'models/PengunjungModel.php';
$db = new PengunjungModel();
include 'includes/head.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
?>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Form Kunjungan</h6>
                        </div>
                        <div class="card-body">
                        <form action="controllers/PengunjungController.php?aksi=update" method="post">
                        <?php
                        foreach($db->edit($_GET['id']) as $d){
                        ?>
                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                            <div class="form-group">
                                <label for="exampleNama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $d['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleTipeAnggota">Tipe Keanggotaan</label>
                                <select class="form-control" name="tipeAnggota" id="tipeAnggota" required>
                                    <option value="">Pilih Tipe Keanggotaan</option>
                                    <option value="PNS/POLRI/TNI" <?php if($d['tipe_anggota'] == 'PNS/POLRI/TNI'){echo("selected");}?>>PNS/POLRI/TNI</option>
                                    <option value="TK/SD" <?php if($d['tipe_anggota'] == 'TK/SD'){echo("selected");}?>>TK/SD</option>
                                    <option value="SMP/MTS" <?php if($d['tipe_anggota'] == 'SMP/MTS'){echo("selected");}?>>SMP/MTS</option>
                                    <option value="SMA/SMK/MA" <?php if($d['tipe_anggota'] == 'SMA/SMK/MA'){echo("selected");}?>>SMA/SMK/MA</option>
                                    <option value="Mahasiswa" <?php if($d['tipe_anggota'] == 'Mahasiswa'){echo("selected");}?>>Mahasiswa</option>
                                    <option value="Masyarakat Umum" <?php if($d['tipe_anggota'] == 'Masyarakat Umum'){echo("selected");}?>>Masyarakat Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleJenisKelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenisKelamin" id="jenisKelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" <?php if($d['jenis_kelamin'] == 'Laki-laki'){echo("selected");}?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if($d['jenis_kelamin'] == 'Perempuan'){echo("selected");}?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleUmur">Umur</label>
                                <input type="number" class="form-control" name="umur" id="umur" value="<?= $d['umur'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleAalamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="2" required><?= $d['alamat'] ?></textarea>
                            </div>
                            <input type="hidden" name="tanggal" value="<?= date("Y-m-d H:i:s"); ?>">
                            <div class="d-flex justify-content-between">
                                <a href="tables.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        <?php
                        }
                        ?>
                        </form>
                        </div>
                    </div>
<?php 
include 'includes/footer.php'
?>