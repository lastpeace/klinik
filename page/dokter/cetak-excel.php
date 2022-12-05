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
	header("Content-Disposition: attachment; filename=Data Dokter.xls");
?>

<table border="1">
	
	<h1>dr. Febby Astari</br></h1>
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa jatiasih Kota Bekasi<br>Telp:0878-8730-5379
	
	<caption>Laporan Data Dokter</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Dokter</th>
			<th>Nama Dokter</th>
			<th>Tempat Lahir</th>
			<th>Telpon</th>
			<th>Alamat</th>
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select * from tb_dokter");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo $data['kd_dokter']?></td>
	            <td><?php echo $data['nm_dokter']?></td>
	            <td align="center"><?php echo $data['tmp_lhr']?></td>
	            <td align="center"><?php echo $data['tlp']?></td>
	            <td><?php echo $data['alamat']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">