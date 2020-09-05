<!-- proses penyimpanan -->

<?php
// include "koneksi.php";

//baca ID data yang akan di edit
$id = $_GET['id'];

//baca data karyawan berdasarkan id
$cari = mysqli_query($konek, "SELECT * FROM mapel WHERE id='$id'");
$hasil = mysqli_fetch_array($cari);


//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $kode_mapel = $_POST['kode_mapel'];
    $mapel = $_POST['mapel'];

    //simpan ke tabel kelas
    $simpan = mysqli_query($konek, "UPDATE mapel SET kode_mapel ='$kode_mapel', mapel = '$mapel' WHERE id='$id'");
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
        exit;
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
                    <h3 class="box-title">Edit Mata Pelajaran</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kode Mapel</label>
                            <input type="number" name="kode_mapel" id="kode_mapel" placeholder="Isikan Kode Mapel..." class="form-control" value="<?= $hasil['kode_mapel'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mapel" id="mapel" placeholder="Isikan Mapel..." class="form-control" value="<?= $hasil['mapel'] ?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
                        <input class="btn btn-warning" type="submit" name="kembali" id="kembali" value="Kembali">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>