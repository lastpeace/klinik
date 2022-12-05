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

<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Diagnosa.xls");
?>

<table border="1">
	
	<h1>KLINIK ABC</br></h1>
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa jatiasih Kota Bekasi<br> Telp : 0878-8730-5379

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