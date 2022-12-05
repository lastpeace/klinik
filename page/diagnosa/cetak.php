<?php

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

	<caption>Laporan Data Diagnosa</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Diagnosa</th>
			<th>Nama Diagnosa</th>
			<th>Diagnosa ICD 10</th>
			<th>Jenis</th>
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select * from tb_diagnosa");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo $data['kd_diagnosa']?></td>
	            <td><?php echo $data['nm_diagnosa']?></td>
	            <td align="center"><?php echo $data['diagnosaicd10']?></td>
	            <td align="center"><?php echo $data['jenis']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">