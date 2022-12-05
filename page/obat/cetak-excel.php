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
	header("Content-Disposition: attachment; filename=Data Obat.xls");
?>

<table border="1">
	
	<h1>dr.Febby Astari</br></h1>

	Jl. Swatantra V no 10 Rt 09/03 Jatirasa jatiasih Kota Bekasi<br>Telp:0878-8730-5379
	
	<caption>Laporan Data Obat</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Obat</th>
			<th>Nama Obat</th>
			<th>Satuan</th>
			<th>Isi</th>
			<th>Stok Obat</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Profit</th>
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select * from tb_obat");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo $data['kd_obat']?></td>
	            <td><?php echo $data['nm_obat']?></td>
	            <td align="center"><?php echo $data['satuan']?></td>
	            <td align="center"><?php echo $data['isi']?></td>
	            <td align="center"><?php echo $data['stok']?></td>
	            <td align="center"><?php echo $data['harga_beli']?></td>
	            <td align="center"><?php echo $data['harga_jual']?></td>
	            <td align="center"><?php echo $data['profit']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">