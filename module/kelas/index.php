<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Kelas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="?p=module/kelas/tambah" class='btn btn-primary' style="margin:10px">+ Tambah Kelas</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //baca data karyawan
                            $sql = mysqli_query($konek, "SELECT * FROM kelas");
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>

                                <tr>
                                    <td style="width: 5%;"> <?php echo $no++; ?> </td>
                                    <td> <?php echo $data['kelas']; ?> </td>
                                    <td style="width: 10%;">
                                        <!-- <a href="edit.php?id=<?php echo $data['id_kelas']; ?>"> Edit</a> | <a href="hapus_kelas.php?id=<?php echo $data['id_kelas']; ?>"> Hapus</a> -->
                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/kelas/edit&id=<?php echo $data['id_kelas']; ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/kelas/hapus&id=<?= $data['id_kelas']; ?>">
                                            <i class="fa fa-trash"></i>
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