<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="?p=module/user/tambah" class='btn btn-primary' style="margin:10px">+ Tambah Data</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Nama Guru</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //baca data karyawan
                            $sql = mysqli_query($konek, "SELECT a.id, a.username, a.password, a.status, b.nama_guru, b.nip FROM user a LEFT JOIN guru b ON a.username = b.nip  ORDER BY a.id ASC");
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>

                                <tr>
                                    <td style="width: 5%;"> <?php echo $no++; ?> </td>
                                    <td> <?php echo $data['username']; ?> </td>
                                    <td> <?php echo $data['nama_guru']; ?> </td>
                                    <td> <?php echo $data['password']; ?> </td>
                                    <td> <?php echo $data['status']; ?> </td>
                                    <td style="width: 10%;">
                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/user/edit&id=<?php echo $data['id']; ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/user/hapus&id=<?= $data['id']; ?>">
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