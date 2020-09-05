<?php

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $nokartu = $_POST['nokartu'];
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
    $simpan = mysqli_query($konek, "INSERT INTO `karyawan` (nokartu, nis, nama, jk, ttl, alamat, agama, nama_orangtua, nohp, kelas)
													VALUES
														  ('$nokartu', '$nis', '$nama', '$jk', '$ttl', '$alamat', '$agama', '$angmer', '$nohp','$kelas')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data karyawan
    if ($simpan) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/siswa/index');
				</script>
			";
        // mysqli_query($konek, "UPDATE cekAbsen SET id_status=0");
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/siswa/index');
				</script>
			";
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/siswa/index';
			</script>";
}

//kosongkan tabel tmprfid
mysqli_query($konek, "DELETE FROM tmprfid");
// mysqli_query($konek, "UPDATE fa SET id_status=''");
?>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $("#norfid").load('module/siswa/nokartu.php')
        }, 0); //pembacaan file nokartu.php, tiap 1 detik = 1000
    });
</script>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Data Siswa</h3>
                </div>
                <form role="form" method="POST">
                    <div class="box-body">
                        <div id="norfid"></div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" name="nis" id="nis" placeholder="Isikan Nis..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" id="nama" placeholder="Isikan Nama Siswa..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk">
                                <option value="">--Pilih--</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="ttl" id="ttl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option value="">--Pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Isikan Alamat Siswa..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nama Orang Tua</label>
                            <input type="text" name="angmer" id="angmer" placeholder="Isikan Nama Orang Tua.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="number" name="nohp" id="nohp" placeholder="Isikan No Hp Siswa..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="">--Pilih--</option>
                                <?php
                                $ambil = mysqli_query($konek, "SELECT * FROM kelas");
                                while ($dataKelas = mysqli_fetch_array($ambil)) {
                                ?>
                                    <option value="<?= $dataKelas['kelas'] ?>">
                                        <?= $dataKelas['kelas'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
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