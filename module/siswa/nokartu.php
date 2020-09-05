<?php
// include "koneksi.php";
//baca isi tabel tmprfid

include "../../config/koneksi.php";

$sql = mysqli_query($konek, "select * from tmprfid");
	$data = mysqli_fetch_array($sql);
	//baca nokartu
	$nokartu = $data['nokartu'];
	if($nokartu){
		mysqli_query($konek, "UPDATE cekAbsen SET id_status=0");
	}
?>

<div class="form-group">
    <label>No.Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Jari Difinger..." class="form-control" value="<?php echo $nokartu; ?>">
</div>