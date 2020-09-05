<?php

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $kelas = $_POST['kelas'];

    //simpan ke tabel kelas
    $simpan = mysqli_query($konek, "INSERT INTO `kelas` (kelas)
													VALUES
														  ('$kelas')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data kelas
    if ($simpan) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/kelas/index');
				</script>
			";
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/kelas/index');
				</script>
			";
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/kelas/index';
			</script>";
}
?>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Kelas</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" id="kelas" placeholder="Isikan Kelas..." class="form-control">
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