<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Guru Mata Pelajaran</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="?p=module/mataPelajaran/tambahData" class='btn btn-primary' style="margin:10px">+ Tambah</a>
                    <div class="col-md-12">
                        <h3 class="page-header">
                            Data Guru Mata Pelajaran
                        </h3>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $ambil = $konek->query("SELECT a.nama_guru, b.id_mengajar, c.mapel FROM guru a, mengajar b, mapel c WHERE b.kode_guru = a.kode_guru AND b.kode_mapel = c.kode_mapel ORDER BY b.kode_guru ASC");
                                    while ($pecah = $ambil->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pecah['nama_guru']; ?></td>
                                            <td><?= $pecah['mapel']; ?></td>
                                            <td>
                                                <a type="submit" class="btn btn-success btn-md" href="?p=module/mataPelajaran/editMapel&id=<?= $pecah['id_mengajar']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-md" type="submit" onclick="return confirm('Yakin akan hapus data ini ?')" href="?p=module/mataPelajaran/hapusMapel&id=<?= $pecah['id_mengajar']; ?>">
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
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.pecah -->
</section>
<!-- /.content -->