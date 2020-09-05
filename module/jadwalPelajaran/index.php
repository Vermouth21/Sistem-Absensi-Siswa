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
                        <div class="col-md-12">
                            <div class="row" style="margin-bottom:10px;">
                                <div class="col-md-8" style="border-right: 1px solid #ccc;">
                                    <h4 align="center">
                                        <b>Jadwal Kelas VII SMP Kartika 1-7 Padang</b>
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 align="center">
                                        <b>Keterangan</b>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <div class="page-header">
                                        <a href="?p=module/jadwalPelajaran/tambah" class='btn btn-primary' style="margin:10px">+ Atur Jadwal</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-4">
                                    <ul class="nav nav-tabs responsive">
                                        <li class="test-class"><a class="deco-none misc-class" data-toggle="tab" href="#guru">Guru Mapel</a></li>
                                        <li class="test-class"><a class="deco-none misc-class" data-toggle="tab" href="#mapel">Mata Pelajaran</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-12" style="border-right: 1px solid #ccc;">
                                                <div class="tab-content responsive">
                                                    <?php
                                                    // include "koneksi.php";
                                                    $kelas2 = $konek->query("SELECT * FROM kelas");
                                                    while ($row2 = $kelas2->fetch_array()) {
                                                        $kelas = $row2['kelas'];

                                                        // echo $kelas;
                                                    ?>
                                                        <div class="tab-pane active" id="<?php echo $row2['kelas']; ?>" style="margin-top:15px;">
                                                            <?php
                                                            $kelas3 = $konek->query("SELECT * FROM kelas WHERE kelas = '$kelas'");
                                                            $ruw = $kelas3->fetch_array();
                                                            ?>
                                                            <h4 class="page-header text-center">
                                                                Jadwal Kelas <?php echo $ruw['kelas']; ?>
                                                                <br>
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4 class="page-header" style="margin-top:7px;" align="center">
                                                                        SENIN
                                                                    </h4>
                                                                    <table class="table table-hover table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="col-md-4">Waktu</th>
                                                                                <th class="col-md-2">MP</th>
                                                                                <th class="col-md-2">KG</th>
                                                                                <th class="col-md-4">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $view1 = $konek->query("SELECT a.id_jadwal, a.id_mengajar, a.hari, a.jam_mulai, a.jam_selesai, a.kelas, b.kode_guru, b.kode_mapel FROM jadwal a, mengajar b WHERE a.id_mengajar = b.id_mengajar AND a.hari='Senin' AND a.kelas = '$kelas' ORDER BY jam_mulai ASC");
                                                                            while ($raw1 = $view1->fetch_array()) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $raw1['jam_mulai']; ?> - <?php echo $raw1['jam_selesai']; ?></td>
                                                                                    <td><?php echo $raw1['kode_mapel']; ?></td>
                                                                                    <td><?php echo $raw1['kode_guru']; ?></td>
                                                                                    <td>
                                                                                        <!-- <i>
                                                                                            <a href="editJadwal.php&id=<?php echo $raw1['id_jadwal']; ?>">Edit
                                                                                            </a> /
                                                                                            <a onclick="return confirm('Yakin akan hapus data ini ?')" href="hapusJadwal.php?id=<?php echo $raw1['id_jadwal']; ?>">Hapus
                                                                                            </a>
                                                                                        </i> -->
                                                                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/jadwalPelajaran/edit&id=<?php echo $raw1['id_jadwal']; ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/jadwalPelajaran/hapus&id=<?= $raw1['id_jadwal']; ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }
                                                                            ?>
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
                                                                                <th class="col-md-4">Waktu</th>
                                                                                <th class="col-md-2">MP</th>
                                                                                <th class="col-md-2">KG</th>
                                                                                <th class="col-md-4">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $view2 = $konek->query("SELECT a.id_jadwal, a.id_mengajar, a.hari, a.jam_mulai, a.jam_selesai, a.kelas, b.kode_guru, b.kode_mapel FROM jadwal a, mengajar b WHERE a.id_mengajar = b.id_mengajar AND a.hari='Selasa' AND a.kelas = '$kelas' ORDER BY jam_mulai ASC");
                                                                            while ($raw2 = $view2->fetch_array()) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $raw2['jam_mulai']; ?> - <?php echo $raw2['jam_selesai']; ?></td>
                                                                                    <td><?php echo $raw2['kode_mapel']; ?></td>
                                                                                    <td><?php echo $raw2['kode_guru']; ?></td>
                                                                                    <td>
                                                                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/jadwalPelajaran/edit&id=<?php echo $raw2['id_jadwal']; ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/jadwalPelajaran/hapus&id=<?= $raw2['id_jadwal']; ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }
                                                                            ?>
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
                                                                                <th class="col-md-4">Waktu</th>
                                                                                <th class="col-md-2">MP</th>
                                                                                <th class="col-md-2">KG</th>
                                                                                <th class="col-md-4">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $view3 = $konek->query("SELECT a.id_jadwal, a.id_mengajar, a.hari, a.jam_mulai, a.jam_selesai, a.kelas, b.kode_guru, b.kode_mapel FROM jadwal a, mengajar b WHERE a.id_mengajar = b.id_mengajar AND a.hari='Rabu' AND a.kelas = '$kelas' ORDER BY jam_mulai ASC");
                                                                            while ($raw3 = $view3->fetch_array()) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $raw3['jam_mulai']; ?> - <?php echo $raw3['jam_selesai']; ?></td>
                                                                                    <td><?php echo $raw3['kode_mapel']; ?></td>
                                                                                    <td><?php echo $raw3['kode_guru']; ?></td>
                                                                                    <td>
                                                                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/jadwalPelajaran/edit&id=<?php echo $raw3['id_jadwal']; ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/jadwalPelajaran/hapus&id=<?= $raw3['id_jadwal']; ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }

                                                                            ?>
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
                                                                                <th class="col-md-4">Waktu</th>
                                                                                <th class="col-md-2">MP</th>
                                                                                <th class="col-md-2">KG</th>
                                                                                <th class="col-md-4">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $view4 = $konek->query("SELECT a.id_jadwal, a.id_mengajar, a.hari, a.jam_mulai, a.jam_selesai, a.kelas, b.kode_guru, b.kode_mapel FROM jadwal a, mengajar b WHERE a.id_mengajar = b.id_mengajar AND a.hari='Kamis' AND a.kelas = '$kelas' ORDER BY jam_mulai ASC");
                                                                            while ($raw4 = $view4->fetch_array()) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $raw4['jam_mulai']; ?> - <?php echo $raw4['jam_selesai']; ?></td>
                                                                                    <td><?php echo $raw4['kode_mapel']; ?></td>
                                                                                    <td><?php echo $raw4['kode_guru']; ?></td>
                                                                                    <td><a type="submit" class="btn btn-success btn-md" href="?p=module/jadwalPelajaran/edit&id=<?php echo $raw4['id_jadwal']; ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/jadwalPelajaran/hapus&id=<?= $raw4['id_jadwal']; ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }

                                                                            ?>
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
                                                                                <th class="col-md-4">Waktu</th>
                                                                                <th class="col-md-2">MP</th>
                                                                                <th class="col-md-2">KG</th>
                                                                                <th class="col-md-4">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $view5 = $konek->query("SELECT a.id_jadwal, a.id_mengajar, a.hari, a.jam_mulai, a.jam_selesai, a.kelas, b.kode_guru, b.kode_mapel FROM jadwal a, mengajar b WHERE a.id_mengajar = b.id_mengajar AND a.hari='Jumat' AND a.kelas = '$kelas' ORDER BY jam_mulai ASC");
                                                                            while ($raw5 = $view5->fetch_array()) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $raw5['jam_mulai']; ?> - <?php echo $raw5['jam_selesai']; ?></td>
                                                                                    <td><?php echo $raw5['kode_mapel']; ?></td>
                                                                                    <td><?php echo $raw5['kode_guru']; ?></td>
                                                                                    <td><a type="submit" class="btn btn-success btn-md" href="?p=module/jadwalPelajaran/edit&id=<?php echo $raw5['id_jadwal']; ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/jadwalPelajaran/hapus&id=<?= $raw5['id_jadwal']; ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }

                                                                            ?>
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
                                                                                <th class="col-md-4">Waktu</th>
                                                                                <th class="col-md-2">MP</th>
                                                                                <th class="col-md-2">KG</th>
                                                                                <th class="col-md-4">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $view6 = $konek->query("SELECT a.id_jadwal, a.id_mengajar, a.hari, a.jam_mulai, a.jam_selesai, a.kelas, b.kode_guru, b.kode_mapel FROM jadwal a, mengajar b WHERE a.id_mengajar = b.id_mengajar AND a.hari='Sabtu' AND a.kelas = '$kelas' ORDER BY jam_mulai ASC");
                                                                            while ($raw6 = $view6->fetch_array()) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $raw6['jam_mulai']; ?> - <?php echo $raw6['jam_selesai']; ?></td>
                                                                                    <td><?php echo $raw6['kode_mapel']; ?></td>
                                                                                    <td><?php echo $raw6['kode_guru']; ?></td>
                                                                                    <td><a type="submit" class="btn btn-success btn-md" href="?p=module/jadwalPelajaran/edit&id=<?php echo $raw6['id_jadwal']; ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/jadwalPelajaran/hapus&id=<?= $raw6['id_jadwal']; ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }

                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="guru">
                                            <h4 class="page-header text-center">
                                                Keterangan Guru
                                            </h4>
                                            <h4 class="page-header" style="margin-top:7px;" align="center">
                                                &nbsp;
                                            </h4>

                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Guru</th>
                                                        <th>Nama Guru</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $view7 = $konek->query("SELECT * FROM guru ORDER BY kode_guru ASC");
                                                    while ($raw7 = $view7->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: left; width: 20%;"><?php echo $raw7['kode_guru']; ?></td>
                                                            <td style="text-align: left;"><?php echo $raw7['nama_guru']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="mapel">
                                            <h4 class="page-header text-center">
                                                Keterangan Mata Pelajaran
                                            </h4>
                                            <br>
                                            <br>
                                            <br>
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Mapel</th>
                                                        <th>Mata Pelajaran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $view8 = $konek->query("SELECT * FROM mapel ORDER BY kode_mapel ASC");
                                                    while ($raw8 = $view8->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: left; width: 15%;"><?php echo $raw8['kode_mapel']; ?></td>
                                                            <td style="text-align: left;"><?php echo $raw8['mapel']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
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