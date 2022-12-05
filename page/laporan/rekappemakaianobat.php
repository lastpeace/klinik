<?php

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi=new mysqli("localhost","root","","klinik");

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

	<caption>Laporan Pemakaian Obat Periode: <b><?php echo $_POST['tgl_awal']?></b> s/d <b><?php echo $_POST['tgl_akhir']?></b>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        ?>
	</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Pemakaian</th>
			<th>Kode Obat</th>
			<th>Nama Obat</th>
			<th>Jumlah</th>
		</tr>		
	</thead>
	<tbody>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        $no=1;
	        $sql= $koneksi->query("select tgl_pemeriksaan,tb_obat.kd_obat,tb_obat.nm_obat,sum(jumlah)as jmlTotal 
									from tb_obat,tb_rekam_medis, tb_rekam_medis_detail2 
									where tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and
									      tb_rekam_medis.no_rm=tb_rekam_medis_detail2.no_rm and
									      tgl_pemeriksaan between '$tgl_awal' and '$tgl_akhir'
									      group by kd_obat ");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo date ('d F Y',strtotime($data['tgl_pemeriksaan']))?></td>
	            <td align="center"><?php echo $data['kd_obat']?></td>
	            <td align="center"><?php echo $data['nm_obat']?></td>
	            <td align="center"><?php echo $data['jmlTotal']?></td>
	        </tr>
	        <?php 

	        //$total_pj=$total_pj+$data['total'];
	        //$total_profit=$total_profit+$profit;

	    	} 

	    	?>        
	</tbody>

</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">