<form action="" method="post" enctype="multipart/form-data">
    <button class="btn btn-warning" type="submit" name="res">Reset Jadi 0</button>
    <button class="btn btn-primary" type="submit" name="cek">Cek Absen</button>
    <button class="btn btn-success" type="submit" name="daf">Daftar</button>
    <button class="btn btn-danger" type="submit" name="del">Hapus Data Finger Print Semua</button>
</form>
<?php

// include '../../config/koneksi.php';
if (isset($_POST['cek'])) {
    mysqli_query($konek, "UPDATE cekAbsen SET id_status=2");
    echo "<script>
    window.location ='?p=module/finger/scan';
    </script>";
}

if (isset($_POST['daf'])) {
    mysqli_query($konek, "UPDATE cekAbsen SET id_status=1");
    echo "<script>
    window.location ='?p=module/siswa/tambah';
    </script>";
}

if (isset($_POST['res'])) {
    mysqli_query($konek, "UPDATE cekAbsen SET id_status=0");
}

if (isset($_POST['del'])) {
    mysqli_query($konek, "UPDATE cekAbsen SET id_status=3");
    mysqli_query($konek, "DELETE FROM karyawan");
    // mysqli_query($konek, "UPDATE cekAbsen SET id_status=0");
}
?>
<br>