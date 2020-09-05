<?php
$nip = $_SESSION['user']['username'];
// var_dump($_SESSION);
// echo $nip;
?>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Sistem Absensi Siswa</h3>
				</div>

				<!-- ISI -->
				<div class="box-body">
					<div class="row">
						<div class="container">
							<div class="col-md-12">
								<h3 class="page-header">
									Absen Siswa
								</h3>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Siswa</th>
											<th>Nama Guru</th>
											<th>Mata Pelajaran</th>
											<th>Tanggal</th>
											<th>Jam Masuk</th>
											<th>Jam Keluar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										date_default_timezone_set('Asia/Jakarta');
										$tanggal = date('Y-m-d');
										$jamJadwal = date('H');
										$jam2 = $jamJadwal + 2;
										$hari = date('D');
										$hariJadwal = hariIndo($hari);

										$id_jadwal = $konek->query("SELECT id_jadwal FROM jadwal WHERE hari = '$hariJadwal' AND jam_mulai BETWEEN '$jamJadwal' AND '$jam2'");

										$idJ = $id_jadwal->fetch_assoc();
										$id = $idJ['id_jadwal'];

										// $cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='5' AND tanggal='2020-08-24'");
										// //hitung jumlah datanya
										// $jumlah_absen = mysqli_num_rows($cari_absen);

										// var_dump($jumlah_absen);

										// var_dump($id);

										//filter absensi berdasarkan tanggal saat ini
										$sql = mysqli_query($konek, "SELECT b.nama, a.tanggal, a.jam_masuk, a.jam_pulang, b.nis, c.nip FROM absensi a, karyawan b, guru c WHERE a.nokartu = b.nokartu and a.tanggal='$tanggal' AND nip = '$nip'");

										$sql = mysqli_query($konek, "SELECT a.id_jadwal, a.jam_masuk, a.jam_pulang, a.tanggal, a.nis, a.nokartu, b.id_jadwal, b.id_mengajar, c.kode_mapel, c.kode_guru, d.nama, d.nis, e.kode_mapel, e.mapel, f.kode_guru, f.nama_guru, f.nip FROM absensi a JOIN jadwal b ON a.id_jadwal = b.id_jadwal JOIN mengajar c ON b.id_mengajar = c.id_mengajar JOIN karyawan d ON a.nis = d.nis JOIN mapel e ON c.kode_mapel = e.kode_mapel JOIN guru f ON c.kode_guru = f.kode_guru WHERE f.nip = '$nip' AND a.tanggal = '$tanggal'");


										// echo "SELECT a.id_jadwal, a.jam_masuk, a.jam_pulang, a.tanggal, a.nis, a.nokartu, b.id_jadwal, b.id_mengajar, c.kode_mapel, c.kode_guru, d.nama, d.nis, e.kode_mapel, e.mapel, f.kode_guru, f.nama_guru, f.nip FROM absensi a JOIN jadwal b ON a.id_jadwal = b.id_jadwal JOIN mengajar c ON b.id_mengajar = c.id_mengajar JOIN karyawan d ON a.nis = d.nis JOIN mapel e ON c.kode_mapel = e.kode_mapel JOIN guru f ON c.kode_guru = f.kode_guru WHERE f.nip = '$nip' AND a.tanggal = '$tanggal'";
										$no = 1;
										while ($data = mysqli_fetch_array($sql)) {
											// $no++;
										?>
											<tr>
												<td> <?php echo $no++; ?> </td>
												<td> <?php echo $data['nama']; ?> </td>
												<td> <?php echo $data['nama_guru']; ?> </td>
												<td> <?php echo $data['mapel']; ?> </td>
												<td> <?php echo $data['tanggal']; ?> </td>
												<td> <?php echo $data['jam_masuk']; ?> </td>
												<td> <?php echo $data['jam_pulang']; ?> </td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>