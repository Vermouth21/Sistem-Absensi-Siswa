<?php 
	
	include "../../config/koneksi.php";
	// mysqli_query($konek, "UPDATE fa SET id_status=0");
	$sql = mysqli_query($konek, "select * from cekAbsen");
	while($data = mysqli_fetch_array($sql)){
		echo $data['id_status'];
	}

 ?>