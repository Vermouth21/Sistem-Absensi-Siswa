<?php

//jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $nip       = $_POST['nip'];
    $nama      = $_POST['nama'];
    $kode_guru = $_POST['kode_guru'];
    $jk        = $_POST['jk'];
    $ttl       = $_POST['ttl'];
    $alamat    = $_POST['alamat'];
    $agama     = $_POST['agama'];


    //simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "INSERT INTO `guru` (nip, nama_guru, kode_guru, jk, ttl, alamat, agama)
													VALUES
														  ('$nip', '$nama','$kode_guru','$jk','$ttl','$alamat','$agama')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data karyawan
    if ($simpan) {
        echo "
				<script>
					alert('Tersimpan');
					location.replace('?p=module/guru/index');
				</script>
			";
    } else {
        echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('?p=module/guru/index');
				</script>
			";
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/guru/index';
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
                            <label>NIP</label>
                            <input type="number" name="nip" id="nip" placeholder="Isikan NIP..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" name="nama" id="nama" placeholder="Isikan Nama Guru..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kode Guru</label>
                            <input type="number" name="kode_guru" id="kode_guru" placeholder="Isikan Kode Guru..." class="form-control">
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
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Isikan Alamat..." class="form-control">
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