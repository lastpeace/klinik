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
	            <td align="center"><?php echo number_format($data['stok']);?></td>
	            <td align="center"><?php echo number_format($data['harga_beli']);?></td>
	            <td align="center"><?php echo number_format($data['harga_jual']);?></td>
	            <td align="center"><?php echo number_format($data['profit']);?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">