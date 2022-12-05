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
	header("Content-Disposition: attachment; filename=Data Pasien.xls");
?>

<table border="1">
	
	<h1>dr.Febby Astari</br></h1>
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa jatiasih Kota Bekasi<br>Telp:0878-8730-5379
	
	<caption>Laporan Data Pasien</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Pasien</th>
			<th>Nama Pasien</th>
			<th>JK</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Tgl Lahir</th>
			<th>Usia</th>
			<th>Telpon</th>
			<th>Status</th>
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select * from tb_pasien");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo $data['no_pasien']?></td>
	            <td><?php echo $data['nm_pasien']?></td>
	            <td align="center"><?php echo $data['j_kel']?></td>
	            <td align="center"><?php echo $data['agama']?></td>
	            <td><?php echo $data['alamat']?></td>
	            <td align="center"><?php echo $data['tgl_lhr']?></td>
	            <td align="center"><?php echo $data['usia']?></td>
	            <td align="center"><?php echo $data['no_tlp']?></td>
	            <td align="center"><?php echo $data['status']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">