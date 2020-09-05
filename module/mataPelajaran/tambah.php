<?php

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $kode_mapel = $_POST['kode_mapel'];
    $mapel = $_POST['mapel'];

    //simpan ke tabel kelas
    $simpan = mysqli_query($konek, "INSERT INTO `mapel` (kode_mapel, mapel)
													VALUES
														  ('$kode_mapel','$mapel')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data kelas
    if ($simpan) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/mataPelajaran/index');
				</script>
			";
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/mataPelajaran/index');
				</script>
			";
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/mataPelajaran/index';
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
                            <label>Kode Mata Pelajaran</label>
                            <input type="number" name="kode_mapel" id="kode_mapel" placeholder="Isikan Kode Mapel..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mapel" id="mapel" placeholder="Isikan Mata Pelajaran..." class="form-control">
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