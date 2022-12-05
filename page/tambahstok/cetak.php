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
	<img src="../../images/logo.png" width="75" height="75" style="float:left;margin:0 8px 4px 0;">
	<font size="6" color="red"><b>dr.Febby Astari</b></font><br>
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa Jatiasih Kota Bekasi<br>Telp: 0878-8730-5379 </div>
	
	<caption>Laporan Data Penambahan Stok</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Input</th>
			<th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Isi</th>
            <th>Jumlah</th>
			
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select id,tgl,tb_pembelian_detail.`kd_obat`,`nm_obat`,`satuan`,`isi`,jumlah from tb_pembelian_detail,tb_obat
                where tb_pembelian_detail.kd_obat=tb_obat.kd_obat");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl']?></td>
                <td><?php echo $data['kd_obat']?></td>
                <td><?php echo $data['nm_obat']?></td>
                <td><?php echo $data['satuan']?></td>
                <td><?php echo $data['isi']?></td>
                <td><?php echo $data['jumlah']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">