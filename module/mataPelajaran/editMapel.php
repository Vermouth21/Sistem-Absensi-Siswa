<?php
$id = $_GET['id'];
$ambil = mysqli_query($konek, "SELECT * FROM mengajar WHERE id_mengajar = '$id'");
$pecah = mysqli_fetch_array($ambil);

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $kode_guru = strtoupper($_POST['kode_guru']);
    $kode_mapel = strtoupper($_POST['kode_mapel']);

    $ambil =  $konek->query("UPDATE mengajar SET kode_guru = '$kode_guru', kode_mapel = '$kode_mapel' WHERE id_mengajar = '$id'");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data kelas
    if ($ambil) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/mataPelajaran/setMapel');
				</script>
			";
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/mataPelajaran/setMapel');
				</script>
			";
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/mataPelajaran/setMapel';
			</script>";
}
?>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Mata Pelajaran</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <select name="kode_guru" class="form-control" required>
                                <?php
                                $ambilGuru =  $konek->query("SELECT a.nama_guru, a.kode_guru, b.kode_guru, b.id_mengajar FROM guru a JOIN mengajar b ON a.kode_guru = b.kode_guru WHERE b.id_mengajar = '$id'");
                                $dataGuru = $ambilGuru->fetch_assoc();
                                ?>
                                <option value="<?= $pecah['kode_guru'] ?>"><?= $dataGuru['nama_guru'] ?></option>
                                <option value="">--Pilih Guru--</option>
                                <?php
                                $data = $konek->query("SELECT * FROM guru ORDER BY nip ASC");
                                while ($guru = $data->fetch_assoc()) {
                                ?>
                                    <option value="<?= $guru['kode_guru']; ?>"><?= $guru['nama_guru']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <select name="kode_mapel" class="form-control" required>
                                <?php
                                $ambilMapel = $konek->query("SELECT a.mapel, a.kode_mapel, b.kode_mapel, b.id_mengajar FROM mapel a JOIN mengajar b ON a.kode_mapel = b.kode_mapel WHERE b.id_mengajar = '$id'");
                                $dataMapel = $ambilMapel->fetch_assoc();
                                ?>
                                <option value="<?= $pecah['kode_mapel']  ?>"><?= $dataMapel['mapel']  ?></option>
                                <option value="">--Pilih Mata Pelajaran--</option>
                                <?php
                                $dataMapel = $konek->query("SELECT * FROM mapel ORDER BY kode_mapel ASC");
                                while ($mapel = $dataMapel->fetch_assoc()) {
                                ?>
                                    <option value="<?= $mapel['kode_mapel']; ?>"><?= $mapel['mapel']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
                        <button class="btn btn-warning" name="kembali" id="kembali">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>