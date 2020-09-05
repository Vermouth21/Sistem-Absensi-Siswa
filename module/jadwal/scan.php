<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function(){
				$("#cekkartu").load('module/jadwal/bacakartu.php')
			}, 2000);
		});	
</script>

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
                                <div class="container-fluid dis" style="padding-top: 10%">
									<div id="cekkartu"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>