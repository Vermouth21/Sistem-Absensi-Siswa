<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Mata Pelajaran</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="?p=module/mataPelajaran/tambah" class='btn btn-primary' style="margin:10px">+ Tambah Mata Pelajaran</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Mapel</th>
                                <th>Mata Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //koneksi ke database
                            // include "koneksi.php";

                            //baca data karyawan
                            $sql = mysqli_query($konek, "SELECT * FROM mapel");
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>

                                <tr>
                                    <td style="width: 5%;"> <?php echo $no++; ?> </td>
                                    <td style="width: 10%;"> <?php echo $data['kode_mapel']; ?> </td>
                                    <td> <?php echo $data['mapel']; ?> </td>
                                    <td style=" width: 10%;">
                                        <!-- <a href="edit_mapel.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapus_mapel.php?id=<?php echo $data['id']; ?>"> Hapus</a> -->
                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/mataPelajaran/edit&id=<?= $data['id']; ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/mataPelajaran/hapus&id=<?= $data['id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->