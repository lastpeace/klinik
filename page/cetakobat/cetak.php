<?php 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	$koneksi=new mysqli("localhost","root","","klinik");
	
	$pencetak=$_GET['petugas'];

	$norm=$_GET['no_rm'];

	$sql=$koneksi->query("update tb_rekam_medis set statusobat='Selesai' where no_rm='$norm'");
	if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Siap DiCetak");
        //window.location.href="?page=obat";
        </script>
        <?php
    }

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
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa jatiasih Kota Bekasi<br>Telp:0878-8730-5379</div>
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
		<td>: &nbsp&nbsp <?php echo $tampil['lp']; ?>&nbspCm</td>
		<td></td>
		<td>Alergi Obat &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['ao']; ?></td>
	</tr>
	</table>
	<br>
	<table border="1" cellspacing="0px" cellpadding="5">
		<!--<table style="border-bottom:3px dashed #00f;">-->
	<thead>
		<tr>
			<th width="40px">No.</th>
			<th width="250px">Nama Obat</th>
			<th width="100px">Jumlah Obat</th>
			<th width="120px">Dosis</th>
		</tr>		
	</thead>

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
	            <td align="center"><?php echo $no++;?>.</td>
	            <td ><?php echo $data['nm_obat']?>
	            <td align="center"><?php echo $data['jumlah']?></td>
	            <td align="center"><?php echo $data['dosis']?> x 1&nbspHari</td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
	<br>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApoteker,
	<br><br><br><br>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp____________
	<br><br><br><br><br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">