<?php 
	$kode = $_GET['koderm'];
    //$kdpasie = $_GET['no_pasien'];
    //$kasir = $data['nama'];
?>

<!DOCTYPE html>
<html>
<head>
    <title> </title>
    
</head>
<body>


<!-- Select -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <form method="POST">
                	<div>
	                	<label for="">No. ID</label>
	                	<div class="row clearfix">
				        	<div class="col-md-2">
				            <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly="" />
					        </div>

					    	<div class="col-md-2 ">
					            <input type="text" id="no_pasien" name="no_pasien"  class="form-control" data-toggle="modal" data-target="#myModal" required="">
					        </div>
					    	<div class="col-md-2 ">
					        <input type="submit" name="simpan" value="Cari Pasien" class="btn btn-primary">
					    	</div>
                        
                        </div>
                        <label for="">Pilih Dokter</label>
                        <div class="row clearfix">
                            <div class="col-sm-6">             
                                <select class="form-control show-tick" name="dokter" />
                                     <?php
                                        $lbl = '<option value=""> - Pilih Dokter - </option>';
                                         $dokter=$koneksi->query("select * from tb_dokter order by kd_dokter");
                                         
                                         while ($d_dokter=$dokter->fetch_assoc()) {
                                            
                                            echo "<option value='$d_dokter[kd_dokter]'>$d_dokter[nm_dokter]</option>
                                                ";
                                            }
                                       ?>
                                </select>
					       </div>

                       </div>
				    </div>
		    	</form>
            </div>
        </div>
    </div>
</div>
    <?php 
    if (isset($_POST['simpan'])){

    date_default_timezone_set('Asia/Jakarta');
    $date=date("Y-m-d H:i:s");
    $no_rm=$_POST['kode'];
    $nopasien=$_POST['no_pasien'];
    $kddokter=$_POST['dokter'];
    //$datekeluar=date("Y-m-d");
        
    $pasien=$koneksi->query("select * from tb_pasien where no_pasien='$nopasien'");
    while ($data_pasien=$pasien->fetch_assoc()){
       $status=$data_pasien['status'];
       if($status=='TA'){
            $koneksi->query("INSERT INTO tb_rekam_medis(no_rm,no_pasien,diagnosa,tgl_pemeriksaan,ket,status,statusobat,statuspembayaran,kd_dokter,biayaperiksa)values('$no_rm','$nopasien','-','$date','-','Dalam Antrian','Dalam Antrian','Belum Dibayarkan','$kddokter','30000')");
            $koneksi->query("update tb_pasien set status='A' where no_pasien='$nopasien'");   
        }
        else{
        	?>
            <script type="text/javascript">
             alert ("Nomor atau Nama Pasien Sudah Terdaftar<?= $status;?>");
             window.location.href="?page=rekam_medis&koderm=<?php echo $kode; ?> ";
            </script>
             <?php
        }

       }
    }
           
?>

<!--<br><br><br>-->
<form method="POST">
    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                DATA PASIEN
            </h2>
            
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Kelamin</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Agama</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    
                    <?php
                    $no=1;
                    $sql= $koneksi->query("SELECT tb_pasien.no_pasien,nm_pasien,j_kel,tgl_lhr,usia,agama,no_tlp,alamat FROM tb_pasien, tb_rekam_medis where tb_rekam_medis.no_pasien=tb_pasien.no_pasien AND no_rm='$kode'");
                    while($data= $sql->fetch_assoc()){

                    ?>
                    
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['no_pasien'];?></td>
                        <td><?php echo $data['nm_pasien']?></td>
                        <td><?php echo $data['j_kel']?></td>
                        <td><?php echo $data['tgl_lhr']?></td>
                        <td><?php echo $data['usia']?></td>
                        <td><?php echo $data['agama']?></td>
                        <td><?php echo $data['no_tlp']?></td>
                        <td><?php echo $data['alamat']?></td>
                        <td>
                            <a href="?page=rekam_medis&aksi=hapus&no_pasien=<?php echo $data['no_pasien'];?>&no_rm=<?php echo $data['no_rm'];?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    </div>        
    </div>
</form>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					DATA PEMERIKSAAN AWAL <small>oleh:Perawat</small>
				</h2>
			</div>
			<div class="body">
				<form method="POST">
				    

				    <label for="">1. Berat Badan, Tinggi Badan, Lingkar Perut, Suhu Badan dan Tekanan Darah</label>
				    <div class="row clearfix">
				        <div class="col-sm-1">  
				        <input type="text" name="txtbb" class="form-control" placeholder="BB" />
				        </div>
				        <div class="col-sm-1">            
				        <input type="text" name="txttb" class="form-control" placeholder="TB" />
				        </div>
				        <div class="col-sm-1">            
				        <input type="text" name="txtlp" class="form-control" placeholder="LP" />
				        </div>
				        <div class="col-sm-1">  
				        <input type="text" name="txtsuhu" class="form-control" placeholder="Suhu" />
				        </div>
				        <div class="col-sm-1">            
				        <input type="text" name="txttd" class="form-control" placeholder="TD" />
				        </div>
				    </div>
				    <label for="">2. Alergi Obat, Kolesterol, Asam Urat, Glukosa dan Hemoglobin</label>
				    <div class="row clearfix">
				    	<div class="col-sm-1">  
				        <input type="text" name="txtao" class="form-control" placeholder="AO" />
				        </div>
				        <div class="col-sm-1">  
				        <input type="text" name="txtkol" class="form-control" placeholder="Kol" />
				        </div>
				        <div class="col-sm-1">            
				        <input type="text" name="txtau" class="form-control" placeholder="AU" />
				        </div>
				        <div class="col-sm-1">  
				        <input type="text" name="txtglu" class="form-control" placeholder="Glu" />
				        </div>
				        <div class="col-sm-1">            
				        <input type="text" name="txthb" class="form-control" placeholder="HB" />
				        </div>
				    </div>
				    <label for="">3. Keluhan-Keluhan</label>
				    <div class="demo-checkbox">
                        <!--awal tanpa database
                        
                        <input type="checkbox" class="checkbox" id="keluhan[]" name="keluhan[]" value="Batuk" />BATUK
                        <input type="checkbox" name="keluhan[]" value="Flu" />FLU
                        <input type="checkbox" name="keluhan[]" value="Demam" />DEMAM
                        <input type="checkbox" name="keluhan[]" value="Pusing" />PUSING
                        <input type="checkbox" name="keluhan[]" value="Mual" />MUAL
                        <input type="checkbox" name="keluhan[]" value="Muntah" />MUNTAH
                        <br>
                        <input type="submit" name="simpanawal" value="Simpan">-->
                        <!--awal tanpa database-->
                        <!-- <input type="checkbox" id="batuk" name="keluhan[]" value="Batuk" class="chk-col-red" />
                        <label for="batuk">BATUK</label>
                        <input type="checkbox" id="flu" name="keluhan[]" value="Flu" class="chk-col-red"  />
                        <label for="flu">FLU</label>
                        <input type="checkbox" id="demam" name="keluhan[]" value="Demam" class="chk-col-red"  />
                        <label for="demam">DEMAM</label>
                        <input type="checkbox" id="pusing" name="keluhan[]" value="Pusing" class="chk-col-red"  />
                        <label for="pusing">PUSING</label>
                        <input type="checkbox" id="mual" name="keluhan[]" value="Mual" class="chk-col-red"  />
                        <label for="mual">MUAL</label> -->
                        <!-- <input type="checkbox" id="muntah" name="keluhan[]" value="Muntah" class="chk-col-red"  /> -->
                        <textarea name="keluhan[]" id="" cols="30" rows="10"></textarea>
                        <br>
                        <input type="submit" name="simpanawal" value="Simpan" class="btn btn-primary">
                       <!--end tanpa database-->
						<!--awal dengan database
						//<?php 
						//  $keluhan=$koneksi->query("select * from tb_keluhan order by kd_keluhan");
				        //         while ($d_keluhan=$keluhan->fetch_assoc()) {
						// ?>
						  
						   <input type="checkbox" name="keluhan[]" id="keluhan[]" class="filled-in" value="<?=$d_keluhan['kd_keluhan']?>">
						   
						//  <label for="keluhan[]"><?=$d_keluhan['[nm_keluhan']?></label>
						// <?php
						//  }
						// ?>
						//  <input type="submit" name="simpan" value="Simpan">
						  end dengan database-->
                    </div>

				</form>
			</div>
		</div>
	</div>
</div>
<?php 
    if (isset($_POST['simpanawal'])){

    $keluhan = implode(",", $_POST['keluhan']);
    $bb=$_POST['txtbb'];
    $tb=$_POST['txttb'];
    $lp=$_POST['txtlp'];
    $suhu=$_POST['txtsuhu'];
    $td=$_POST['txttd'];
    $ao=$_POST['txtao'];
    $kol=$_POST['txtkol'];
    $au=$_POST['txtau'];
    $glu=$_POST['txtglu'];
    $hb=$_POST['txthb'];

    $sql=$koneksi->query("insert into tb_rekam_medis_detail3(no_rm,bb,tb,lp,suhu,td,ao,kol,au,glu,hb,keluhan)values('$kode','$bb','$tb','$lp','$suhu','$td','$ao','$kol','$au','$glu','$hb','".$keluhan."')");
    //$koneksi->query("update tb_pasien set status='A' where no_pasien='$nopasien'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=pemeriksaan_dokter";
        </script>
        <?php
    }
        }       
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" id="myModalLabel">
                                DATA PASIEN
                            </h2>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Kelamin</th>
                                            <th>Usia</th>
                                             <th>Alamat</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from tb_pasien");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-nopasien="<?php echo $data['no_pasien']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['j_kel']?></td>
                                        <td><?php echo $data['usia']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                       
            </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
                //            jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("no_pasien").value = $(this).attr('data-nopasien');
                $('#myModal').modal('hide');
            });
            

//            tabel lookup pasien
            $(function () {
                $("#lookup").dataTable();
            });

            
        
        </script>
    