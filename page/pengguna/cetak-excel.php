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
	header("Content-Disposition: attachment; filename=Data Pengguna.xls");
?>

<table border="1">
	
	<h1>dr.Febby Astari</br></h1>
	<font size="6" color="red"><b>dr.Febby Astari</b></font><br>
	Jl. Swatantra V no 10 Rt 09/03 Jatirasa jatiasih Kota Bekasi<br>Telp:0878-8730-5379</div>
	
	<caption>Laporan Data Pengguna</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama Pengguna</th>
			<th>Password</th>
			<th>Level</th>
			<th>Foto</th>
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select * from tb_pengguna");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo $data['username']?></td>
	            <td><?php echo $data['nama']?></td>
	            <td align="center"><?php echo $data['password']?></td>
	            <td align="center"><?php echo $data['level']?></td>
	            <td align="center"><?php echo $data['foto']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">