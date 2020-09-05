<!-- proses penyimpanan -->

<?php
// include "koneksi.php";

//baca ID data yang akan di edit
$id = $_GET['id'];
//baca data karyawan berdasarkan id
$cari = mysqli_query($konek, "SELECT * FROM user WHERE id='$id'");
$hasil = mysqli_fetch_array($cari);


//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status    = $_POST['status'];

    //simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "UPDATE user SET username ='$username',
														password ='$password',
														status ='$status'
														WHERE id='$id'");
    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    if ($simpan) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/user/index');
				</script>
			";
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/user/index');
				</script>
			";
        exit;
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/user/index';
			</script>";
}
?>





<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data User</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" placeholder="Isikan Username..." class="form-control" value="<?= $hasil['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Isikan Password..." class="form-control" value="<?php echo $hasil['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="<?= $hasil['status'] ?>"><?= $hasil['status'] ?></option>
                                <option value="">--Pilih--</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                            </select>
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