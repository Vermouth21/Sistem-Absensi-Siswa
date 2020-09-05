<?php
$id = $_GET['id'];
$hapus = mysqli_query($konek, "DELETE FROM guru WHERE id='$id'");

if ($hapus) {
	echo "
			<script>
				alert('Terhapus');
				location.replace('?p=module/guru/index');
			</script>
		";
} else {
	echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('?p=module/guru/index');
			</script>
		";
}
