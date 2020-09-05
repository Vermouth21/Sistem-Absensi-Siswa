<?php
session_start();
$tanggal1 = $_SESSION['tgl1'];
$tanggal2 = $_SESSION['tgl2'];

// $kelas2 = $konek->query("SELECT * FROM mapel");
// while ($row2 = mysqli_fetch_array($kelas2)) {
//     $kelas = $row2['kode_mapel'];
//     $kela = $row2['mapel'];
?>

<div class="row">
    <h4 class="page-header" style="margin-top:7px;" align="center">
        Rekap Absensi Kelas Kelas VII
    </h4>

    <div class="container">
        <div class="col-md-10">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Jumlah Hadir</th>
                        <!-- <th>Sakit</th>
                                                                <th>Izin</th> -->
                        <!-- <th>Alfa</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include '../../config/koneksi.php';
                    $no = 1;
                    // $kelas = $konek->query("SELECT * ")

                    $ambil = $konek->query("SELECT a.nokartu, a.nis, a.nama, b.nis, b.id_jadwal, c.id_jadwal, d.id_mengajar, d.kode_mapel, e.kode_mapel, e.mapel FROM karyawan a JOIN absensi b ON b.nis = a.nis JOIN jadwal c ON c.id_jadwal = b.id_jadwal JOIN mengajar d ON d.id_mengajar = c.id_mengajar JOIN mapel e ON e.kode_mapel = d.kode_mapel WHERE e.mapel = '$kela' ORDER BY a.nis ASC");


                    // echo "SELECT a.nokartu, a.nis, a.nama, b.nis, b.id_jadwal, c.id_jadwal, d.id_mengajar, d.kode_mapel, e.kode_mapel, e.mapel FROM karyawan a JOIN absensi b ON b.nis = a.nis JOIN jadwal c ON c.id_jadwal = b.id_jadwal JOIN mengajar d ON d.id_mengajar = c.id_mengajar JOIN mapel e ON e.kode_mapel = d.kode_mapel WHERE e.mapel = '$kela' ORDER BY a.nis ASC";

                    // echo "SELECT COUNT(a.id) as absen, a.id_jadwal, a.ket, a.nis, b.id_jadwal, b.id_mengajar, c.id_mengajar, c.kode_guru, c.kode_mapel, d.kode_guru, e.nis, e.nama FROM absensi a JOIN jadwal b ON a.id_jadwal = b.id_jadwal JOIN mengajar c ON b.id_mengajar = c.id_mengajar JOIN guru d ON c.kode_guru = d.kode_guru JOIN karyawan e ON a.nis = e.nis WHERE c.kode_mapel = '1' AND d.kode_guru = '1' AND a.id_jadwal = '1' AND a.nis = '15101152620048' AND a.ket = 'H' AND tanggal BETWEEN '2020-08-01' AND '2020-08-31'";
                    // exit;

                    while ($hitung = $ambil->fetch_array()) {

                        // var_dump($hitung['absen']);
                        // $absen = 0;

                        // if ($hitung['absen'] != NULL) {
                        //     $absen = $hitung['absen'];
                        // } else {
                        //     $absen = '0';
                        // }
                        // echo "SELECT * FROM absensi WHERE nokartu = '$hitung[nokartu]' AND ket='H' AND id_jadwal = '$hitung[id_jadwal]' AND tanggal BETWEEN '$tanggal1' and '$tanggal2'";
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $hitung['nis']; ?></td>
                            <td><?= $hitung['nama']; ?></td>
                            <td><?= $hitung['mapel']; ?></td>
                            <td><?= mysqli_num_rows($konek->query("SELECT * FROM absensi WHERE nokartu = '$hitung[nokartu]' AND ket='H' AND id_jadwal = '$hitung[id_jadwal]' AND tanggal BETWEEN '$tanggal1' and '$tanggal2'")); ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- <input type="button" class="btn btn-default" value="Print" onClick="return window.open('module/rekap/cetak.php?kelas=<?= $kelas; ?>&tgl1=<?= $tanggal1; ?>&tgl2=<?= $tanggal2; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes');" /> -->
            <!-- <a href="module/rekap/cetak.php?mapel=<?= $kela ?>&tgl1=<?= $tanggal1 ?>&tgl2=<?= $tanggal2 ?>" class="btn btn-success" target="_blank">Print</a> -->

        </div>
    </div>
</div>

<script>
    window.print();
</script>