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

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="page-header">
                                    Data Guru
                                </h3>
                                <?php
                                $ambil = $konek->query("SELECT a.username, b.nama_guru FROM user a, guru b WHERE a.id = '$id_login' AND a.username = b.nip");
                                $dataGuru = $ambil->fetch_array();
                                ?>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" value=" <?php echo $dataGuru['nama_guru']; ?>" readonly="readonly">
                                </div><br>

                                <?php
                                $view = $konek->query("SELECT a.username, b.id_mengajar, b.kode_mapel, c.kode_guru, d.mapel FROM user a, mengajar b, guru c, mapel d WHERE a.id ='$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.kode_mapel = d.kode_mapel");
                                $hitung = mysqli_num_rows($view);
                                ?>
                                <!-- <label>Jumlah Mata Pelajaran : <?php echo $hitung; ?></label><br> -->
                                <?php
                                while ($row = $view->fetch_array()) {
                                ?>
                                    <div class="form-group">
                                        <label>Mata Pelajaran</label>
                                        <input class="form-control" value="<?= $row['mapel']; ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Mapel</label>
                                        <input class="form-control" value="<?= $row['kode_mapel']; ?>" readonly="readonly">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Jumlah Mata Pelajaran</label>
                                        <input class="form-control" value="<?= $hitung ?>" readonly="readonly">
                                    </div><br>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-8" style="border-left: 1px solid #ccc;">
                                <h3 class="page-header" style="margin-top:0px;">
                                    Jadwal Mengajar
                                </h3>
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                SENIN
                                            </h4>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>KM</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $view1 = $konek->query("SELECT a.username, b.id_mengajar, c.kode_guru, d.id_mengajar, d.hari, d.jam_mulai, d.jam_selesai, d.kelas,  b.kode_mapel, e.kelas FROM user a, mengajar b, guru c, jadwal d, kelas e WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.kelas = e.kelas AND d.hari ='Senin' ORDER BY d.jam_mulai ASC");
                                                    while ($raw1 = $view1->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $raw1['kelas']; ?></td>
                                                            <td><?php echo $raw1['kode_mapel']; ?></td>
                                                            <td><?php echo $raw1['jam_mulai']; ?> - <?php echo $raw1['jam_selesai'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                SELASA
                                            </h4>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>KM</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $view2 = $konek->query("SELECT a.username, b.id_mengajar, c.kode_guru, d.id_mengajar, d.hari, d.jam_mulai, d.jam_selesai, d.kelas,  b.kode_mapel, e.kelas FROM user a, mengajar b, guru c, jadwal d, kelas e WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.kelas = e.kelas AND d.hari ='Selasa' ORDER BY d.jam_mulai ASC");
                                                    $no = 1;
                                                    while ($raw2 = $view2->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $raw2['kelas']; ?></td>
                                                            <td><?php echo $raw2['kode_mapel']; ?></td>
                                                            <td><?php echo $raw2['jam_mulai']; ?> - <?php echo $raw2['jam_selesai'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                RABU
                                            </h4>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>KM</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $view3 = $konek->query("SELECT a.username, b.id_mengajar, c.kode_guru, d.id_mengajar, d.hari, d.jam_mulai, d.jam_selesai, d.kelas,  b.kode_mapel, e.kelas FROM user a, mengajar b, guru c, jadwal d, kelas e WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.kelas = e.kelas AND d.hari ='Rabu' ORDER BY d.jam_mulai ASC");
                                                    while ($raw3 = $view3->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $raw3['kelas']; ?></td>
                                                            <td><?php echo $raw3['kode_mapel']; ?></td>
                                                            <td><?php echo $raw3['jam_mulai']; ?> - <?php echo $raw3['jam_selesai'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                KAMIS
                                            </h4>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>KM</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $view4 = $konek->query("SELECT a.username, b.id_mengajar, c.kode_guru, d.id_mengajar, d.hari, d.jam_mulai, d.jam_selesai, d.kelas,  b.kode_mapel, e.kelas FROM user a, mengajar b, guru c, jadwal d, kelas e WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.kelas = e.kelas AND d.hari ='Kamis' ORDER BY d.jam_mulai ASC");
                                                    while ($raw4 = $view4->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $raw4['kelas']; ?></td>
                                                            <td><?php echo $raw4['kode_mapel']; ?></td>
                                                            <td><?php echo $raw4['jam_mulai']; ?> - <?php echo $raw4['jam_selesai'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                JUM'AT
                                            </h4>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>KM</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $view5 = $konek->query("SELECT a.username, b.id_mengajar, c.kode_guru, d.id_mengajar, d.hari, d.jam_mulai, d.jam_selesai, d.kelas,  b.kode_mapel, e.kelas FROM user a, mengajar b, guru c, jadwal d, kelas e WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.kelas = e.kelas AND d.hari ='Jumat' ORDER BY d.jam_mulai ASC");
                                                    while ($raw5 = $view5->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $raw5['kelas']; ?></td>
                                                            <td><?php echo $raw5['kode_mapel']; ?></td>
                                                            <td><?php echo $raw5['jam_mulai']; ?> - <?php echo $raw5['jam_selesai'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                SABTU
                                            </h4>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>KM</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $view6 = $konek->query("SELECT a.username, b.id_mengajar, c.kode_guru, d.id_mengajar, d.hari, d.jam_mulai, d.jam_selesai, d.kelas,  b.kode_mapel, e.kelas FROM user a, mengajar b, guru c, jadwal d, kelas e WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.id_mengajar = d.id_mengajar AND d.kelas = e.kelas AND d.hari ='Sabtu' ORDER BY d.jam_mulai ASC");
                                                    while ($raw6 = $view6->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $raw6['kelas']; ?></td>
                                                            <td><?php echo $raw6['kode_mapel']; ?></td>
                                                            <td><?php echo $raw6['jam_mulai']; ?> - <?php echo $raw6['jam_selesai'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->