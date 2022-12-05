<?php
	
	$kode = $_GET['koderm'];
	$no_pasien=$_GET['no_pasien'];


	$sql=$koneksi->query("delete from tb_rekam_medis where no_pasien='$no_pasien'");
	
	if($sql || $sql1 || $sql2){

		?>
			<script>
				window.location.href="?page=rekam_medis&koderm=<?php echo $kode; ?>";
			</script>

		<?php
	}

?>