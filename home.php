<?php

	$tgl=date("Y-m-d");
	
		
	$sql2=$koneksi->query("select * from tb_dokter");

	while ($tampil2=$sql2->fetch_assoc()) {
		$jumlah_dokter=$sql2->num_rows;
	}

	$sql3=$koneksi->query("select * from tb_obat");

	while ($tampil3=$sql3->fetch_assoc()) {
		$jumlah_obat=$sql3->num_rows;
	}

	$sql4=$koneksi->query("select * from tb_pasien");

	while ($tampil4=$sql4->fetch_assoc()) {
		$jumlah_pasien=$sql4->num_rows;
	}

	$sql5=$koneksi->query("select * from tb_rekam_medis where tgl_pemeriksaan='$tgl'");

	while ($tampil5=$sql5->fetch_assoc()) {
		$jumlah_remek=$sql5->num_rows;
	}

	$sql6=$koneksi->query("select * from tb_dokter");

	while ($tampil6=$sql6->fetch_assoc()) {
		$jumlah_dokter=$sql6->num_rows;
	}

    $sql7 =mysqli_query($koneksi,"select * from tb_pengguna");
    $query = mysqli_fetch_array($sql7);
?>
<p align="center"><img src="images/logo.jpg"></p>

<marquee><strong> Selamat Datang <?php echo $query['nama']; ?> Sebagai <?php echo $query['level']; ?> </strong></marquee>

	<div class="container-fluid">
	    <div class="block-header">
	        
	    </div>

	    <!-- Widgets -->    
	    <div class="row clearfix">
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-pink hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=dokter"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" />
	                </div>
	                <div class="content">
	                    <div class="text">Data Dokter</div>
	                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jumlah_dokter ;?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-blue hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=obat"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" /></a>
	                </div>
	                <div class="content">
	                    <div class="text">Data Obat</div>
	                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jumlah_obat ;?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-purple hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=pasien"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" /></a>
	                </div>
	                <div class="content">
	                    <div class="text">Data Pasien</div>
	                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
	                    	<?php echo $jumlah_pasien ;?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-cyan hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=pemeriksaan_dokter"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" /></a>
	                </div>
	                <div class="content">
	                    <div class="text">Pasien Hari Ini</div>
	                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
	                    	<?php echo $jumlah_remek ;?></div>
	                </div>
	            </div>
	        </div>
	    </div>