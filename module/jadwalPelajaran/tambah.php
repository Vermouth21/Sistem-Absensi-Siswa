<?php

//jika tombol simpan diklik
if (@$_POST['input']) {
    $mengajar   = $_POST['mengajar'];
    // echo $mengajar;
    // exit;
    $hari       = $_POST['hari'];
    $mulai      = $_POST['mulai'];
    $berakhir   = $_POST['berakhir'];
    $kelas      = $_POST['kelas'];

    // echo $mengajar;
    // exit;

    $sql = $konek->query("INSERT jadwal (id_mengajar, hari, jam_mulai, jam_selesai, kelas) VALUES ('$mengajar','$hari','$mulai','$berakhir','$kelas')");
    // echo "INSERT jadwal (id_mengajar, hari, jam_mulai, jam_selesai, kelas) VALUES ('$mengajar','$hari','$mulai','$berakhir','$kelas')";
    // exit;
    if ($sql) {
        echo '<script type="text/javascript">
                alert("Input Data Sukses !")
                window.location = "?p=module/jadwalPelajaran/index";
              </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Input Data Gagal !")
                window.location = "?p=module/jadwalPelajaran/index";
             </script>';
    }
}
if (isset($_POST['kembali'])) {
    echo "<script language=javascript>
			window.location.href='?p=module/jadwalPelajaran/index';
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
                <form role="form" method="post">
                    <div class="col-md-12">
                        <h3 class="page-header">Set Jadwal Pelajaran</h3>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hari</label>
                                <select name="hari" class="form-control" required>
                                    <option value="">--Pilih Hari--</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-control" required>
                                    <option value="">--Pilih Kelas--</option>
                                    <?php
                                    // include "koneksi.php";
                                    $ambil = $konek->query("SELECT * FROM kelas ORDER BY id_kelas ASC");
                                    while ($row = $ambil->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['kelas'] ?>"><?php echo $row['kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Guru -- Mapel</label>
                                <select name="mengajar" class="form-control" required>
                                    <option value="">Guru -- Mapel</option>
                                    <?php
                                    $data = $konek->query("SELECT a.nama_guru, a.id, b.id_mengajar, c.mapel FROM guru a, mengajar b, mapel c WHERE b.kode_guru = a.kode_guru AND b.kode_mapel = c.kode_mapel ORDER BY b.kode_guru ASC");
                                    while ($dataGuru = $data->fetch_array()) {
                                        // var_dump($data);

                                    ?>
                                        <option value="<?= $dataGuru['id_mengajar']; ?>"><?php echo $dataGuru['nama_guru']; ?> -- <?php echo $dataGuru['mapel']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input type="time" class="form-control" name="mulai" required>
                            </div>
                            <div class="form-group">
                                <label>Jam Selesai</label>
                                <input type="time" class="form-control" name="berakhir" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <input type="submit" name="input" class="btn btn-primary" value="Input" />
                            <button class="btn btn-warning" name="kembali" id="kembali">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>