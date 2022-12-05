<?php 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	$koneksi=new mysqli("localhost","root","","klinik");
	
	$pencetak=$_GET['petugas'];

	$norm=$_GET['no_rm'];

	//$sql1=$koneksi->query("select * from view_rm where no_rm='$norm'");
		//$tampil2=$sql1->fetch_assoc();

?>
<style>
	
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="left">
	<img src="../../images/logo.jpg" width="75" height="75" style="float:left;margin:0 8px 4px 0;">
	<font size="6" color="red"><b>dr.Febby Astari</b></font><br>
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa Jatiasih Kota Bekasi<br>Telp: </div>
	<caption>==================================================================</caption>
</table>
<table border="0">
	<?php
		$sql2=$koneksi->query("select * from view_rm where no_rm='$norm'");
		$tampil=$sql2->fetch_assoc();
	?>

	<tr>
		<td>Nama Pasien</td>
		<td width="200px">: &nbsp&nbsp <?php echo $tampil['nm_pasien']; ?></td>&nbsp
		<td width="10px"></td>
		<td>Tgl Lahir</td>
		<td>: &nbsp&nbsp <?php echo $tampil['tgl_lhr']; ?></td>
	</tr>
	<tr>
		<td>Pekerjaan &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['pekerjaan']; ?></td>
		<td></td>
		<td>Agama &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['agama']; ?></td>
	</tr>
	<tr>
		<td>Alamat &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['alamat']; ?></td>
		<td></td>
		<td>No. RM &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['no_pasien']; ?></td>
	</tr>
	<tr>
		<td>Berat Badan &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['bb']; ?>&nbspKg</td>
		<td></td>
		<td>Tinggi Badan &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['tb']; ?>&nbspCm</td>
	</tr>
	<tr>
		<td>Lingkar Perut &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['lp']; ?></td>
		<td></td>
		<td>Alergi Obat &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['ao']; ?></td>
	</tr>
	</table>
	<br>
	<table border="1" cellspacing="0px" cellpadding="5">
	<thead>
		<tr>
			<th width="90px">Tanggal</th>
			<th width="300px">Keluhan/ Diagnosis</th>
			<th width="120px">Diagnosa</th>
			<th>Dokter</th>
		</tr>		
	</thead>

	<tbody>
		<?php
	        $no=1;
	        $sql3= $koneksi->query("select * from view_rm where no_rm='$norm'");
	        while($data= $sql3->fetch_assoc()){
	        ?>
		    <tr>
	            <td><?php echo $data['tgl_pemeriksaan']?></td>
	            <td><?php echo $data['keluhan']?><br>
	            	<?php echo 'Cholestrol:'.$data['kol']?><br>
	            	<?php echo 'Asam Urat:'.$data['au']?><br>
	            	<?php echo 'Glukosa:'.$data['glu']?><br>
	            	<?php echo 'Hemoglobin:'.$data['hb']?><br>
	            </td>
	            <td><?php echo $data['diagnosa']?><br>
	            	<?php echo $data['ket']?>
	            </td>
	            <td><?php echo $data['nm_dokter']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
	</table>
<br>
<table border="0" cellspacing="0px" cellpadding="5">
	<b>Obat-obat</b>
<tbody>
		<?php
	        $no=1;
	        $sql3= $koneksi->query("Select tb_rekam_medis_detail2.no_rm,tb_obat.nm_obat,jumlah,dosis
from tb_rekam_medis_detail2,tb_obat,tb_rekam_medis
where
     tb_rekam_medis_detail2.no_rm=tb_rekam_medis.no_rm and
     tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and tb_rekam_medis_detail2.no_rm='$norm'");
	        while($data= $sql3->fetch_assoc()){
	        ?>
		    <tr>
	            <td><?php echo $no++;?>.</td>
	            <td width="200px"><?php echo $data['nm_obat']?>
	            <td width="50px"><?php echo $data['jumlah']?></td>
	            <td><?php echo $data['dosis']?> x 1&nbspHari</td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
	<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">