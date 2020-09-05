<?php

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $kode_guru = strtoupper($_POST['kode_guru']);
    $kode_mapel = strtoupper($_POST['kode_mapel']);

    $ambil =  $konek->query("INSERT INTO mengajar (kode_guru, kode_mapel) VALUES ('$kode_guru','$kode_mapel')");


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
                            <select name="kode_guru" class="form-control">
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
                            <select name="kode_mapel" class="form-control">
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