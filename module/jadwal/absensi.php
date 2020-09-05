<?php
$id_login = $_SESSION['user']['id'];
// var_dump($id_login);
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Jadwal Kelas Dan Mata Pelajaran</h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <?php
                    include_once 'config/function.php';
                    $tgl = date('D');

                    // echo $tgl;
                    ?>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="?p=module/jadwal/prosesAbsen" method="post">
                                    <div class="col-md-6">
                                        <h3 class="page-header">Data Absensi</h3>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" value="<?= $tanggal1 = date('Y-m-d'); ?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label>Hari</label>
                                            <input class="form-control" value="<?= hariIndo($tgl); ?>" readonly="readonly">
                                        </div>
                                        <?php
                                        $view = $konek->query("SELECT a.username, b.nama FROM user a, guru b WHERE a.id = '$id_login' AND a.username = b.nip");
                                        $row = mysqli_fetch_array($view);
                                        ?>
                                        <div class="form-group">
                                            <label>Nama Guru</label>
                                            <input class="form-control" value="<?= $row['nama']; ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="page-header">
                                            Pilih Jadwal Absensi
                                        </h3>
                                        <br>
                                        <?php
                                        $jam = date("H:i");
                                        $hari = date("D");
                                        $hariIni = hariIndo($hari);
                                        // echo $hariIni;
                                        // echo $hari;
                                        $tanggal0 = date('Y-m-d');
                                        $view1 = $konek->query("SELECT a.username, a.id, c.kode_guru, d.id_jadwal, d.kelas,  d.hari, d.jam_mulai, d.jam_selesai, e.mapel, f.kelas FROM user a, mengajar b, guru c, jadwal d, mapel e, kelas f WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.hari = '$hariIni' AND b.kode_mapel = e.kode_mapel AND d.kelas = f.kelas ORDER BY d.jam_mulai ASC");


                                        if (mysqli_num_rows($view1) > 0) {
                                        ?>
                                            <div class="table-respopnsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Pilih</th>
                                                            <th>Kelas</th>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Waktu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row1 = mysqli_fetch_array($view1)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    $ada = $konek->query("SELECT id_jadwal, tanggal FROM absensi WHERE tanggal ='$tanggal0' AND id_jadwal = '$row1[id_jadwal]'");
                                                                    if (mysqli_num_rows($ada) > 0) {
                                                                    ?>
                                                                        <i class="fa fa-check"></i><?php
                                                                                                } else {
                                                                                                    ?><input name="id_jadwal" type="radio" value="<?php echo $row1['id_jadwal']; ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?php echo $row1['kelas']; ?></td>
                                                                <td><?php echo $row1['mapel'] ?></td>
                                                                <td><?php echo $row1['jam_mulai']; ?> - <?php echo $row1['jam_selesai']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <input type="submit" name="lanjut" class="btn btn-default" value="Ke Proses Absensi" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                                        } else {
                                            echo "Tidak ada jadwal hari ini<br><br>Silahkan lihat <a href='?p=module/jadwal/prosesAbsen.php'>jadwal</a>";
                                        }
            ?>

            <?php
            if (@$_POST['lanjut']) {
                $tanggal1 = date('Y-m-d');
                $id_jadwal = $_POST['id_jadwal'];

                $view2 = $konek->query("SELECT a.kelas, b.kelas FROM jadwal a, kelas b WHERE a.id_jadwal = '$id_jadwal' AND b.kelas = b.kelas");
                $row2 = $view2->fetch_array();

                $kelas   = $row2['kelas'];
                // $kelasid = $row2['kelas'];

                $view4 = $konek->query("SELECT a.tanggal, a.nis, b.kelas FROM absen2 a, karyawan b WHERE a.nis = b.nis AND a.tanggal= '$tanggal1' AND b.kelas='$kelasid'");
                $cek = mysqli_num_rows($view4);
            }
            ?>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->