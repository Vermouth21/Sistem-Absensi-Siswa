<?php

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status    = $_POST['status'];

    //simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "INSERT INTO `user` (username, password, status)
													VALUES
														  ('$username', '$password','$status')");

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
    }
}

if (isset($_POST['batal'])) {
    echo "<script language=javascript>
            location.replace('?p=module/user/index');
		</script>";
}
?>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Data User</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Username</label>
                            <select class="form-control" id="username" name="username">
                                <option value="">--Pilih--</option>
                                <?php
                                $nip = $konek->query("SELECT * FROM guru");
                                while ($nipGuru = $nip->fetch_assoc()) {
                                ?>
                                    <option value="<?= $nipGuru['nip']; ?>"><?php echo $nipGuru['nama_guru']; ?> -- <?php echo $nipGuru['nip']; ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" name="username" id="username" placeholder="Isikan Username..." class="form-control"> -->
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Isikan Password..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">--Pilih--</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
                        <button class="btn btn-warning" name="batal" id="batal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>