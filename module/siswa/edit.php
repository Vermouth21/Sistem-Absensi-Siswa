<!-- proses penyimpanan -->

<?php
//baca ID data yang akan di edit
$id = $_GET['id'];

//baca data karyawan berdasarkan id
$cari = mysqli_query($konek, "SELECT * FROM karyawan WHERE id='$id'");
$hasil = mysqli_fetch_array($cari);
// var_dump($hasil);
// exit;


//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $nis = $_POST['nis'];
    $nama    = $_POST['nama'];
    $jk = $_POST['jk'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $angmer  = $_POST['angmer'];
    $nohp  = $_POST['nohp'];
    $kelas  = $_POST['kelas'];


    //simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "UPDATE karyawan SET nis ='$nis',
														nama ='$nama',
														jk ='$jk',
														ttl ='$ttl',
														alamat ='$alamat',
														agama ='$agama',
														nama_orangtua ='$angmer',
														nohp ='$nohp',
														kelas ='$kelas'
														WHERE id='$id'");
    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data karyawan
    if ($simpan) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/siswa/index');
				</script>
			";
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/siswa/index');
				</script>
			";
        exit;
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/siswa/index';
			</script>";
}
?>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Siswa</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" name="nis" id="nis" placeholder="Isikan Nis..." class="form-control" value="<?= $hasil['nis']  ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" id="nama" placeholder="Isikan Nama Siswa..." class="form-control" value="<?php echo $hasil['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk">
                                <option value="<?= $hasil['jk'] ?>"><?= $hasil['jk'] ?></option>
                                <option value="">--Pilih--</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="ttl" id="ttl" class="form-control" value="<?= $hasil['ttl'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option value="<?= $hasil['agama'] ?>"><?= $hasil['agama'] ?></option>
                                <option value="">--Pilih--</option>
                                <option value="Laki-Laki">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Isikan Nama Orang Tua.." class="form-control" value="<?= $hasil['alamat'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Orang Tua</label>
                            <input type="text" name="angmer" id="angmer" placeholder="Isikan Nama Orang Tua.." class="form-control" value="<?= $hasil['nama_orangtua'] ?>">
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="number" name="nohp" id="nohp" placeholder="Isikan No Hp Siswa..." class="form-control" value="<?= $hasil['nohp'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="<?= $hasil['kelas'] ?>"><?= $hasil['kelas'] ?></option>
                                <option value="">--Pilih--</option>
                                <?php
                                $ambil = $konek->query("SELECT * FROM kelas");
                                while ($dataKelas = $ambil->fetch_assoc()) {
                                    // var_dump($dataKelas);
                                ?>
                                    <option value="<?= $dataKelas['kelas'] ?>">
                                        <?= $dataKelas['kelas'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
                            <input class="btn btn-warning" type="submit" name="kembali" id="kembali" value="Kembali">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>