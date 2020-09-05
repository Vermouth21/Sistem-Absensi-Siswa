<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Jadwal Kelas Dan Mata Pelajaran</h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="page-header">
                                Absen Kelas VII
                            </h3>
                            <?php
                            if (@$_POST['lanjut']) {
                                $tanggal1 = date('Y-m-d');
                                $id_jadwal = $_POST['id_jadwal'];

                                $view2 = $konek->query("SELECT a.kelas, b.kelas, a.id_jadwal FROM jadwal a, kelas b WHERE a.id_jadwal = '$id_jadwal' AND a.kelas = b.kelas");
                                $row2 = $view2->fetch_array();

                                $kelas = $row2['kelas'];
                                // $kelasid = $row2['id_kelas'];

                                $view4 = $konek->query("SELECT a.tanggal, a.nis, b.kelas FROM absen2 a, karyawan b WHERE a.nis = b.nis AND a.tanggal = '$tanggal1' AND b.kelas='$kelas'");
                                $cek = mysqli_num_rows($view4);
                            ?>

                                <form method="post">
                                    <div class="table-responsive">
                                        <?php
                                        $no = 0;
                                        $view3 = $konek->query("SELECT * FROM karyawan WHERE kelas = '$kelas'");
                                        ?>
                                        <input type="hidden" value="<?php echo $tanggal1; ?>" name="tanggal">
                                        <input type="hidden" value="<?php echo $id_jadwal; ?>" name="id_jadwal">
                                        <input type="hidden" value="<?php echo $cek; ?>" name="cek">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">NIS</th>
                                                    <th class="col-md-6">Nama</th>
                                                    <th class="col-md-1">Hadir</th>
                                                    <th class="col-md-1">Sakit</th>
                                                    <th class="col-md-1">Ijin</th>
                                                    <th class="col-md-1">Alfa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row3 = mysqli_fetch_array($view3)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: left;"><?php echo $row3['nis']; ?></td>
                                                        <td style="text-align: left;"><?php echo $row3['nama']; ?></td>
                                                        <td><input name="ket<?php echo $no; ?>" type="radio" value="H"></td>
                                                        <td><input name="ket<?php echo $no; ?>" type="radio" value="S"></td>
                                                        <td><input name="ket<?php echo $no; ?>" type="radio" value="I"></td>
                                                        <td><input name="ket<?php echo $no; ?>" type="radio" value="A"></td>
                                                    </tr>

                                                    <input type="hidden" name="nis<?php echo $no; ?>" value="<?php echo $row3['nis']; ?>">

                                                <?php $no++;
                                                } ?>
                                                <input type="hidden" value="<?php echo $no; ?>" name="no">
                                            </tbody>
                                        </table>
                                    </div>
                                    <input type="submit" name="input" class="btn btn-default" value="Selesai" />
                                </form>
                            <?php } ?>
                        </div>


                        <!-- Script Input Data -->
                        <?php
                        if (@$_POST['input']) {
                            $no = $_POST['no'];
                            $tanggal = $_POST['tanggal'];
                            $id_jadwal = $_POST['id_jadwal'];
                            $cek = $_POST['cek'];

                            for ($i = 0; $i < $no; $i++) {
                                $ket = $_POST['ket' . $i];
                                $nis = $_POST['nis' . $i];

                                $query = $konek->query("INSERT INTO absensi (id_jadwal, tanggal, nis, ket) VALUES ('$id_jadwal','$tanggal','$nis','$ket')");
                            }
                            if ($cek == 0) {
                                for ($a = 0; $a < $no; $a++) {
                                    $ket = $_POST['ket' . $a];
                                    $nis = $_POST['nis' . $a];

                                    $query1 = $konek->query("INSERT INTO absensi2 (tanggal, nis, ket) VALUES ('$tanggal','$nis','$ket')");
                                }
                            }

                            if ($query) {
                                echo '<script type="text/javascript">
                                        alert("Input Data Sukses !")
                                        window.location = "?p=module/jadwal/absensi";
                                     </script>';
                            } else {
                                echo '<script type="text/javascript">
                                        alert("Input Data Gagal !")
                                        window.location = "?p=module/jadwal/absensi";
                                    </script>';
                            }
                        }
                        ?>

                        <div class="col-lg-4">
                            Keterangan
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