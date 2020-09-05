<?php
//baca id data yang akan dihapus
$id = $_GET['id'];

//hapus data
$hapus = mysqli_query($konek, "DELETE FROM karyawan WHERE id = '$id'");

//jika berhasil terhapus tampilkan pesan Terhapus
//kemudian kembali ke data karyawan
if ($hapus) {
	echo "
			<script>
				alert('Terhapus');
				location.replace('?p=module/siswa/index');
			</script>
		";
} else {
	echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('?p=module/siswa/index');
			</script>
		";
}
