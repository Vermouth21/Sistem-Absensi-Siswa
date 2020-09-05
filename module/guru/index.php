<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Guru</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="?p=module/guru/tambah" class='btn btn-primary' style="margin:10px">+ Tambah Data</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Kode Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //koneksi ke database
                            // include "koneksi.php";

                            //baca data karyawan
                            $sql = mysqli_query($konek, "SELECT * FROM guru");
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>

                                <tr>
                                    <td> <?php echo $no++; ?> </td>
                                    <td> <?php echo $data['nip']; ?> </td>
                                    <td> <?php echo $data['nama_guru']; ?> </td>
                                    <td> <?php echo $data['kode_guru']; ?> </td>
                                    <td> <?php echo $data['jk']; ?> </td>
                                    <td> <?php echo tgl_indo($data['ttl']); ?> </td>
                                    <td> <?php echo $data['alamat']; ?> </td>
                                    <td> <?php echo $data['agama']; ?> </td>
                                    <td>
                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/guru/edit&id=<?php echo $data['id']; ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/guru/hapus&id=<?= $data['id']; ?>">
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