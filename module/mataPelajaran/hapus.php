<?php
$id = $_GET['id'];
$hapus = mysqli_query($konek, "DELETE FROM mapel WHERE id='$id'");

if ($hapus) {
	echo "
			<script>
				alert('Terhapus');
				location.replace('?p=module/mataPelajaran/index');
			</script>
		";
} else {
	echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('?p=module/mataPelajaran/index');
			</script>
		";
}
