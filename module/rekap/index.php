<?php
$id_login = $_SESSION['user']['id'];
// var_dump($id_login);
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Rekap Kehadiran</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="table-responsive">
                        <div class="row" style="margin-top:30px;">
                            <div class="col-lg-4">
                                <h3 class="page-header" style="margin-top:0px;">
                                    Data Guru
                                </h3>
                                <?php
                                $view = $konek->query("SELECT a.username, b.nama FROM user a, guru b WHERE a.id = '$id_login' AND a.username = b.nip");
                                $row = $view->fetch_array();

                                ?>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" value=" <?= $row['nama']; ?>" readonly="readonly">
                                </div><br>

                                <?php
                                $view1 = $konek->query("SELECT a.username, b.id_mengajar, b.kode_mapel, c.kode_guru, d.mapel FROM user a, mengajar b, guru c, mapel d WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru AND b.kode_mapel = d.kode_mapel");
                                $num = mysqli_num_rows($view1);
                                ?>
                                <label>Jumlah Mata Pelajaran : <?= $num; ?></label><br>
                                <?php
                                while ($row1 = mysqli_fetch_array($view1)) {
                                ?>
                                    <div class="form-group">
                                        <label>Mata Pelajaran</label>
                                        <input class="form-control" value=" <?= $row1['mapel']; ?>" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label>Kode Mapel</label>
                                        <input class="form-control" value=" <?= $row1['kode_mapel']; ?>" readonly="readonly">
                                    </div><br>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="col-lg-8" style="border-left: 1px solid #ccc;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="page-header" style="margin-top:0px;">
                                            Rekap
                                        </h3>

                                        <label>Pilih Range Tanggal :</label>

                                        <form method="post">
                                            <table class="table table-hover" style="margin-top:5px;">
                                                <tr>
                                                    <th><label style="margin-top:5px;">Tanggal</label></th>
                                                    <th><input type="date" class="form-control" name="tanggal1" id="from"></th>
                                                    <th><label style="margin-top:5px;"> s/d tanggal </label></th>
                                                    <th><input type="date" class="form-control" name="tanggal2" id="from1"></th>
                                                    <th><input type="submit" name="submit" class="btn btn-default" value="Rekap" /></th>
                                                </tr>
                                            </table>
                                        </form>
                                        <?php

                                        if (isset($_POST['submit'])) {
                                            // function ubahformatTgl($tanggal)
                                            // {
                                            //     $pisah = explode('/', $tanggal);
                                            //     $urutan = array($pisah[2], $pisah[0], $pisah[1]);
                                            //     $satukan = implode('-', $urutan);
                                            //     return $satukan;
                                            // }

                                            $tanggal1 = $_POST['tanggal1'];
                                            $tanggal2 = $_POST['tanggal2'];

                                            // $tanggal1 = ubahformatTgl($tgl1);
                                            // $tanggal2 = ubahformatTgl($tgl2);
                                        ?>
                                            <center><label>Tanggal&nbsp <?= date("d-m-Y", strtotime($tanggal1)); ?> &nbsps/d&nbsp tanggal &nbsp<?= date("d-m-Y", strtotime($tanggal2)); ?></label></center>
                                            <hr>
                                    </div>
                                </div>

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                            $view5 = $konek->query("SELECT a.username, b.id_mengajar, b.kode_mapel, c.kode_guru FROM user a, mengajar b, guru c WHERE a.id = '$id_login' AND a.username = c.nip AND c.kode_guru = b.kode_guru");
                                            $nomor1 = 1;
                                            while ($row5 = mysqli_fetch_array($view5)) {
                                                $kodemapel = $row5['kode_mapel'];
                                                // var_dump($kodemapel);
                                    ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a role="button" type="submit" href="#<?= $row5['kode_mapel']; ?>" aria-expanded="true">
                                                        Kode Mapel <?= $row5['kode_mapel']; ?> &nbsp<i class="fa fa-caret-square-o-down"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="<?= $row5['kode_mapel'] ?>" class="panel-collapse collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php
                                                            $view2 = $konek->query("SELECT * FROM kelas");
                                                            ?>
                                                            <ul class="nav nav-tabs responsive" class="deco-none misc-class" data-toggle="tab">
                                                                <?php
                                                                $nomor2 = 0;
                                                                while ($row2 = mysqli_fetch_array($view2)) {
                                                                ?>
                                                                    <li class="test-class">
                                                                        <a class="deco-none misc-class" href="#<?= $nomor1 . $nomor2; ?>"> Kelas <?= $row2['kelas']; ?></a>
                                                                    </li>
                                                                <?php
                                                                    $nomor2++;
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="tab-content responsive">
                                                                <?php
                                                                $view3 = $konek->query("SELECT * FROM kelas");
                                                                $nomor3 = 1;
                                                                while ($row3 = mysqli_fetch_array($view3)) {
                                                                    $kelasid = $row3['id_kelas'];
                                                                ?>
                                                                    <div class="tab-pane active" id="<?= $nomor1++ . $nomor3++; ?>" style="margin-top:15px;">
                                                                        <div class="row">
                                                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                                                Rekap Absensi Kelas <?= $row3['kelas']; ?>
                                                                            </h4>

                                                                            <div class="col-lg-12" style="padding-right:20px; border-right: 1px solid #ccc;">
                                                                                <form method="POST" action="">
                                                                                    <table class="table table-hover table-bordered table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th class="col-md-1">No</th>
                                                                                                <th>NIS</th>
                                                                                                <th>Nama Siswa</th>
                                                                                                <th class="col-md-1">Hadir</th>
                                                                                                <th class="col-md-1">Action</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $view4 = $konek->query("SELECT nis, nama FROM karyawan WHERE id = '$kelasid' ORDER BY nis ASC");
                                                                                            $no = 1;
                                                                                            while ($row4 = mysqli_fetch_array($view4)) {
                                                                                                var_dump($row4['nis']);
                                                                                            ?>
                                                                                                <tr>
                                                                                                    <td><?= $no++; ?></td>
                                                                                                    <td style="text-align: left;"><?= $row4['nis']; ?></td>
                                                                                                    <td style="text-align: left;"><?= $row4['nama']; ?></td>
                                                                                                    <td>
                                                                                                        <?= mysqli_num_rows($konek->query("SELECT * FROM absensi")) ?>
                                                                                                    <td>
                                                                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?= $nomor1++ . $nomor3++ . $no++; ?>">Detail</button>
                                                                                                        <?php
                                                                                                        // include "modal.php";
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            <?php } ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </form>
                                                                                <input type="button" class="btn btn-default" value="Print" onClick="return window.open('module/rekap/print.php?login=<?= $id_login; ?>&kelas=<?= $kelasid; ?>&mapel=<?= $kodemapel; ?>&tgl1=<?= $tanggal1; ?>&tgl2=<?= $tanggal2; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes');" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
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