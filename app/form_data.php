<?php
include '../config/connection.php';

$nama = '';
$npm = '';
$fakultas = '';
$jurusan = '';
$nama_bank = '';
$jumlah_dibayarkan = '';
$jumlah_dikembalikan = '';
$transfer_bank = '';
$no_rekening = '';
$nama_pemilik_rekening = '';
$keterangan = '';

if (isset($_GET['ubah'])) {
    $id_peserta = $_GET['ubah'];

    $query = "SELECT * FROM `peserta` WHERE id_peserta = '$id_peserta';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $npm = $result['npm'];
    $fakultas = $result['fakultas'];
    $jurusan = $result['jurusan'];
    $nama_bank = $result['nama_bank'];
    $jumlah_dibayarkan = $result['jumlah_dibayarkan'];
    $jumlah_dikembalikan = $result['jumlah_dikembalikan'];
    $transfer_bank = $result['transfer_bank'];
    $no_rekening = $result['no_rekening'];
    $nama_pemilik_rekening = $result['nama_pemilik_rekening'];
    $keterangan = $result['keterangan'];
}
?>
<!-- Modal Form -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel"><strong>Form Data</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../controllers/proses.php">
                    <input type="hidden" value="<?php echo $id_peserta ?>" name="id_peserta">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan nama" value="<?php echo $nama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input required type="number" class="form-control" name="npm" placeholder="Masukkan NPM"
                            value="<?php echo $result['npm']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <select class="form-control" name="fakultas" id="fakultas" ">
                            <?php
                            $fakultas = array(
                                "FEB" => "Fakultas Ekonomi dan Bisnis",
                                "FH" => "Fakultas Hukum",
                                "FKIP" => "Fakultas Keguruan dan Ilmu Pendidikan",
                                "FT" => "Fakultas Teknik",
                                "FP" => "Fakultas Pertanian",
                                "FK" => "Fakultas Kedokteran",
                                "FMIPA" => "Fakultas Matematika dan Ilmu Pengetahuan Alam"
                            );

                            foreach ($fakultas as $key => $value) {
                                $selected = "";
                                if (isset($_POST['fakultas']) && $_POST['fakultas'] === $key) {
                                    $selected = "selected";
                                }
                                echo "<option value=\"$key\" $selected>$value</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class=" form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <?php
                                $jurusanUnila = array(
                                    "Sosiologi",
                                    "Hubungan Internasional",
                                    "Ilmu Komunikasi",
                                    "Ilmu Administrasi Bisnis",
                                    "Ilmu Administrasi Negara",
                                    "Ilmu Pemerintahan",
                                    "Ilmu Perpustakaan",
                                    "Teknik Mesin",
                                    "Ilmu Teknik",
                                    "Teknik Kimia",
                                    "Teknik Elektro",
                                    "Teknik Industri",
                                    "Teknik Pertambangan",
                                    "Teknik Geomatika",
                                    "Teknik Geodesi",
                                    "Teknik Sipil",
                                    "Teknik Informatika",
                                    "Teknik Geofisika",
                                    "Arsitektur",
                                    "Teknik Geografi",
                                    "Ilmu Tanah",
                                    "Agribisnis",
                                    "Teknik Pertanian",
                                    "Kehutanan",
                                    "Penyuluhan dan Komunikasi Pertanian",
                                    "Agroteknologi",
                                    "Peternakan",
                                    "Budidaya Perairan",
                                    "Manajemen Sumber Daya Perairan",
                                    "Proteksi Tanaman",
                                    "Teknologi Industri Pertanian",
                                    "Kelautan",
                                    "Kedokteran",
                                    "Farmasi",
                                    "PGSD",
                                    "Pendidikan Bahasa dan Sastra Indonesia",
                                    "Pendidikan Kimia",
                                    "Pendidikan Fisika",
                                    "Pendidikan Matematika",
                                    "Pendidikan Bahasa Inggris",
                                    "Pendidikan Anak Usia Dini",
                                    "Pendidikan Jasmani dan Kesehatan",
                                    "Pendidikan Teknologi Informasi",
                                    "Bimbingan dan Konseling",
                                    "Seni Tari",
                                    "Seni Musik",
                                    "Pendidikan Geografi",
                                    "Pendidikan Bahasa Lampung",
                                    "Pendidikan Bahasa Perancis",
                                    "Perbankan",
                                    "Ilmu Ekonomi",
                                    "Akuntansi",
                                    "Manajemen",
                                    "Ekonomi Pembangunan",
                                    "Perpajakan",
                                    "Manajemen Keuangan",
                                    "Ilmu Hukum",
                                    "Fisika",
                                    "Matematika",
                                    "Ilmu Komputer",
                                    "Biologi",
                                    "Kimia"
                                );

                                foreach ($jurusanUnila as $jurusan) {
                                    $selected = "selected";
                                    echo "<option value=\"$jurusan\" $selected>$jurusan</option>";
                                }
                                foreach ($jurusanOptions as $id => $jurusan) {
                                    echo "<option value=\"$id\" $selected >$jurusan</option>";
                                }
                                ?>
                            </select>

                    </div>
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <select class="form-control" name="nama_bank">
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="BSI">BSI</option>
                            <option value="BTN">BTN</option>
                            <option value="KB Bukopin">KB Bukopin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_dibayarkan">Jumlah Dibayarkan</label>
                        <input required type="text" class="form-control" name="jumlah_dibayarkan"
                            value="<?php echo $jumlah_dibayarkan ?>" placeholder="Masukkan jumlah yang dibayarkan">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_dikembalikan">Jumlah Dikembalikan</label>
                        <input required type="number" class="form-control" name="jumlah_dikembalikan"
                            value="<?php echo $jumlah_dikembalikan ?>" placeholder="Masukkan jumlah yang dikembalikan">
                    </div>
                    <div class="form-group">
                        <label for="transfer_bank">Transfer Bank</label>
                        <input required type="number" class="form-control" name="transfer_bank"
                            value="<?php echo $transfer_bank ?>" placeholder="Masukkan transfer bank">
                    </div>
                    <div class="form-group">
                        <label for="no_rekening">Nomor Rekening</label>
                        <input required type="number" class="form-control" name="no_rekening"
                            value="<?php echo $no_rekening ?>" placeholder="Masukkan nomor rekening">
                    </div>
                    <div class="form-group">
                        <label for="nama_pemilik_rekening">Nama Pemilik Rekening</label>
                        <input required type="text" class="form-control" name="nama_pemilik_rekening"
                            value="<?php echo $nama_pemilik_rekening ?>" placeholder="Masukkan nama pemilik rekening">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <select required class="form-control" name="keterangan" value="<?php echo $keterangan ?>">
                            <option <?php if ($keterangan == "Pengembalian PNBP") {
                                echo "selected";
                            } ?>        value="Pengembalian PNBP">Pengembalian PNBP</option>
                            <option <?php if ($keterangan == "Hasil Banding UKT") {
                                echo "selected";
                            } ?> value="Hasil Banding UKT">Hasil Banding UKT</option>

                        </select>
                    </div>
                    <div class="col-sm-8 mb-5">
                        <?php
                        if (isset($_GET['ubah'])) {
                            ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa fa-floppy-o"
                                    aria-hidden="true"></i> Simpan Perubahan</button>
                            <?php
                        } else {
                            ?>
                            <button onClick="return confirm('Apakah anda yakin ingin simpan data?')" type="submit"
                                name="aksi" value="add" class="btn btn-primary"><i class="fa fa-floppy-o"></i>
                                Tambah</button>
                            <?php
                        }
                        ?>
                        <a type="button" href="tables.php" class="btn btn-danger"><i class="fa fa-reply"></i>
                            Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->