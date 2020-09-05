<?php
include "../../config/koneksi.php";
include "../../config/function.php";
//baca nomor kartu dari NodeMCU
$nokartu = $_GET['nokartu'];

//kosongkan tabel tmprfid
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$jam     = date('H:i:s');

$cari_karyawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu=$nokartu");
$jumlah_data = mysqli_num_rows($cari_karyawan);

if ($jumlah_data == 0)
	echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
else {
	//ambil nama karyawan
	$data_karyawan = mysqli_fetch_array($cari_karyawan);
	$nama = $data_karyawan['nama'];
	$nis = $data_karyawan['nis'];

	//tanggal dan jam hari ini
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$jam     = date('H:i:s');
	$jamJadwal = date('H');
	$jam2 = $jamJadwal + 2;
	$hari = date('D');
	$hariJadwal = hariIndo($hari);

	$id_jadwal = $konek->query("SELECT id_jadwal FROM jadwal WHERE hari = '$hariJadwal' AND jam_mulai BETWEEN '$jamJadwal' AND '$jam2'");

	$idJ = $id_jadwal->fetch_assoc();
	$id = $idJ['id_jadwal'];

	//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
	$cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='$nokartu' AND tanggal='$tanggal' AND id_jadwal = '$id'");
	//hitung jumlah datanya
	$jumlah_absen = mysqli_num_rows($cari_absen);
	if ($jumlah_absen != 0) {
		// $jam1     = strtotime(date('H:i:s'));
		// if ($jam1 > strtotime('07:00:00') && $jam1 <= strtotime('10:00:00')) {
		// echo "Selamat Pagi";
		echo $nis;
		echo "pulang";
		// echo " <br>";
		mysqli_query($konek, "UPDATE absensi SET jam_pulang ='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");

		// } else if ($jam1 >= strtotime('10:31:00') && $jam1 <= strtotime('12:30:00')) {
		// 	echo "Selamat Istirahat";
		// 	mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_pulang, ket)values('$nokartu', '$tanggal', '$jam','H')");
		// } else {
		// 	echo "Kamu Terlambat";
		// }
	} else {
		// $jam1     = strtotime(date('H:i:s'));
		// if ($jam1 >= strtotime('07:00:00') && $jam1 <= strtotime('10:00:00')) {
		// echo "Selamat Pagi";
		// echo " <br>";

		echo $nis;
		echo $nama;
		// echo "<br>"
		mysqli_query($konek, "INSERT INTO absensi (id_jadwal, nokartu, nis, tanggal, jam_masuk, ket) VALUES ('$id','$nokartu','$nis','$tanggal', '$jam','H')");
		// } else if ($jam1 >= strtotime('10:31:00') && $jam1 <= strtotime('12:30:00')) {
		// 	echo "Selamat Istirahat";
		// 	mysqli_query($konek, "update absensi set jam_pulang='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
		// } else {
		// 	echo "Kamu Terlambat";
		// }
	}
}

//kosongkan tabel tmprfid
mysqli_query($konek, "delete from tmprfid");
mysqli_query($konek, "UPDATE cekAbsen SET id_status=0");
		// mysqli_query($konek, "UPDATE fa SET id_status=''");
