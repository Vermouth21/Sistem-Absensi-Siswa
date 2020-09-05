<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Siswa</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="POST">
                        <button type="submit" name="daf" class='btn btn-primary' style="margin:10px">+ Tambah Data</button>
                    </form>
                    <!-- <button class="btn btn-success" type="submit" name="daf">Daftar</button> -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No.Finger</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tgl Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Nama Ortu</th>
                                <th>No. Hp</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = mysqli_query($konek, "SELECT * FROM karyawan");
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td style="width: 5%;"> <?php echo $no++; ?> </td>
                                    <td style="width: 5%;"> <?php echo $data['nokartu']; ?> </td>
                                    <td> <?php echo $data['nis']; ?> </td>
                                    <td> <?php echo $data['nama']; ?> </td>
                                    <td> <?php echo $data['jk']; ?> </td>
                                    <td> <?php echo $data['ttl']; ?> </td>
                                    <td> <?php echo $data['alamat']; ?> </td>
                                    <td> <?php echo $data['agama']; ?> </td>
                                    <td> <?php echo $data['nama_orangtua']; ?> </td>
                                    <td> <?php echo $data['nohp']; ?> </td>
                                    <td> <?php echo $data['kelas']; ?> </td>
                                    <td style="width: 10%;">
                                        <!-- <a href="edit.php?id=<?= $data['id']; ?>"> Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"> Hapus</a> -->
                                        <a type="submit" class="btn btn-success btn-md" href="?p=module/siswa/edit&id=<?php echo $data['id']; ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a type="submit" class="btn btn-danger btn-md" href="?p=module/siswa/hapus&id=<?= $data['id']; ?>">
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

<?php
if(isset($_POST['daf'])){
    mysqli_query($konek, "UPDATE cekAbsen SET id_status=1");
    echo "<script>
    window.location ='?p=module/siswa/tambah';
    </script>";
}
?>
<!-- /.content -->