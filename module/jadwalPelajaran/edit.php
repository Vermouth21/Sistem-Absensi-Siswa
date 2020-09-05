<!-- proses penyimpanan -->

<?php
// include "koneksi.php";

//baca ID data yang akan di edit
$id = $_GET['id'];

//baca data karyawan berdasarkan id
$cari = mysqli_query($konek, "SELECT * FROM kelas WHERE id_kelas ='$id'");
$hasil = mysqli_fetch_array($cari);


//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $idk = $id;
    $kelas = $_POST['kelas'];

    // var_dump($_POST);
    // exit;

    //simpan ke tabel kelas
    $simpan = mysqli_query($konek, "UPDATE kelas SET kelas ='$kelas' WHERE id_kelas='$idk'");


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
        exit;
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
                    <h3 class="box-title">Edit Kelas</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" id="kelas" placeholder="Isikan Kelas..." class="form-control" value="<?= $hasil['kelas'] ?>">
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