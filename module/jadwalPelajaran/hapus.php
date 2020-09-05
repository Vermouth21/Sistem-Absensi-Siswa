<?php
// include "../../config/koneksi.php";

//baca id data yang akan dihapus
$id = $_GET['id'];

//hapus data
$hapus = mysqli_query($konek, "DELETE FROM jadwal WHERE id_jadwal ='$id'");

//jika berhasil terhapus tampilkan pesan Terhapus
//kemudian kembali ke data kelas
if ($hapus) {
	echo "
			<script>
				alert('Terhapus');
				location.replace('?p=module/jadwalPelajaran/index');
			</script>
		";
} else {
	echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('?p=module/jadwalPelajaran/index');
			</script>
		";
}
