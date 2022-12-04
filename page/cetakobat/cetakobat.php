<html>
<title>Print Resep Obat</title>
	<head>
		
		<style type="text/css">		
			
			body {
				padding-top: 20px;
				padding-bottom: 40px;
				
				color:#333;
			}
			.page-header {
					border: 0px solid #999;
					
			}
			.spc {
			padding:3px 0;
			}
</style>
<div class="header" align="center">
    <div id="logo_image1"><img src="images\logo.jpg"/></div>
                <div >
					<table border="1">
						<div style="font-size:20px;"><strong>dr.Febby Astari</strong><br></div>
						<div style="font-size:16px;">SIP:440/59.1/DU/DPM-PTSP.PPJU</div>
						<div style="font-size:14px;">Jl. Swatantra V no 10 Rt 09/03 Jatirasa Jatiasih Kota Bekasi</div>
						<div style="font-size:13px;">Telp : 0878-8730-5379</div>
						</table>
						</div><br><br>
	</div>
	</head>
	<?php
	
	$kode=$_GET['kode'];
	$no_rm = $_GET['no_rm'];
	$nama=$_GET['nama'];
	
			$koneksi=new mysqli("localhost","root","","klinik");
			
			$sql=$koneksi->query("select*from view_rm where no_rm='$no_rm'");
    			$data = $sql->fetch_assoc();
    ?>
	<body>
	<br><br><div class="span10 " style="margin-left:40px;">
				<table  border="0" style="width: 100%;">
				<thead>
					<?php
					if($data['no_rm']==true){
					?>
					<tr>
						<td class="spc">NO RM</td><td>:</td><td><?php echo $data['no_rm']?></td>
					</tr>

					<tr>
						<td class="spc">Nama</td><td>:</td><td><?php echo $data['nm_pasien']?></td>
					</tr>
					<tr>
						<td class="spc">Tanggal Lahir</td> 
						<td>:</td>
						<td><?php echo $data['tgl_lhr']?></td>				
					</tr>
						<?php }else{ ?>
							
					<tr>
						<td class="spc">Nama</td>
						<td>:</td>
						<td><input type="name" style="border: 0;"></td>
					</tr>
					<tr>
						<td class="spc">Umur</td> 
						<td>:</td>
						<td><input type="text" style="border: 0;"></td>				
					</tr>
						<?php } ?>
				</thead>
				</table>
				<br><br>
	</div>
			
		<br><div style=text-align:left;font-size:14px;font-family:arial;width:60%;color:#333;><strong>Catatan :</strong> <br><br><br></div>
		<br><div style=text-align:left;font-size:14px;font-family:arial;width:60%;color:#333;><strong>Kesimpulan :</strong> <br><br><br></div>
		<br><div style=text-align:left;font-size:14px;font-family:arial;width:60%;color:#333;><strong>Saran :</strong> <br></div>
		<br><br><div style=text-align:center;width:45%;float:right;font-size:11px;>
		<div style=font-size:16px;font-family:arial;color:#333;>Pemeriksa</div><br><br><br>
		<div style=font-size:16px;font-family:arial;color:#333;></div>
		<div style=font-size:16px;font-family:arial;color:#333;>--------------------------------</div>
		<div style=font-size:16px;font-family:arial;color:#333;>dr. Febby Astari</div>
		</div>
		</div>
		<a class="btn btn-primary" onclick="printdiv()" align="center">Cetak Resep</a>
	</body>
	
	<script>
		function printDiv(elementId) {
			var a = document.getElementById('printing-css').value;
			var b = document.getElementById(elementId).innerHTML;
			window.frames["print_frame"].document.title = document.title;
			window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
			window.frames["print_frame"].window.focus();
			window.frames["print_frame"].window.print();
		}
</script>
</html>