<?php 
    $kode = $_GET['no_rm'];
    $sql = $koneksi->query("SELECT tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,`tgl_pemeriksaan`,`tb_rekam_medis_detail3`.`keluhan`,bb,tb,lp,suhu,td,ao,kol,glu,au,hb
FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
      tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien` and  tb_rekam_medis.no_rm='$kode'");
    $tampil = $sql->fetch_assoc();
    //$kasir = $data['nama'];
?>

<!-- Select -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <form method="POST">
                    <div>
                        <label for="">No. ID ------------------------------ Nomor RM ------------------------ Nama Pasien</label>
                        <div class="row clearfix">
                            <div class="col-md-2">
                            <input type="text" name="kode" value="<?php echo $tampil['no_rm']; ?>" class="form-control" readonly="" />
                            </div>

                           <div class="col-md-2 ">
                                <input type="text" name="no_pasien" value="<?php echo $tampil['no_pasien']; ?>" class="form-control" readonly="" />
                            </div>
                            <div class="col-md-2 ">
                                <input type="text" name="nm_pasien" value="<?php echo $tampil['nm_pasien']; ?>" class="form-control" readonly="" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    <?php 
    if (isset($_POST['simpan'])){

    date_default_timezone_set('Asia/Jakarta');
    $date=date("Y-m-d H:i:s");
    $kd_st=$_POST['kode'];
    $nopasien=$_POST['no_pasien'];
    //$datekeluar=date("Y-m-d");
        
    $pasien2=$koneksi->query("select * from tb_pasien where no_pasien='$nopasien'");
    while ($data_pasien2=$pasien2->fetch_assoc()){
       $status=$data_pasien2['status'];

       if($status==0){
        
            $koneksi->query("insert into tb_rekam_medis(no_rm,no_pasien,diagnosa,tgl_pemeriksaan,ket)values('$kd_st','$nopasien','-','$date','-')");
            $koneksi->query("update tb_pasien set status='A' where no_pasien='$nopasien'");

       
        }
        else{
            ?>
            <script type="text/javascript">
             alert ("Nomor atau Nama Pasien Sudah Terdaftar");
             window.location.href="?page=rekam_medis&koderm=<?php echo $kode; ?> ";
            </script>
             <?php
        }

       }
    }
           
?>

<!-- Select -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA OBAT SETELAH PEMERIKSAAN <small>oleh:Dokter</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!--<div class="card">-->
                        <div class="body">
                            <form method="POST">
                                <div>
                                    <label for="">Kode Obat</label>
                                    <div class="row clearfix">
                                        <div class="col-md-2 ">
                                            <input type="text" id="kd_obat" name="kd_obat" class="form-control" data-toggle="modal" data-target="#myModal">
                                        </div>
                                        <div class="col-md-2 ">
                                        <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
<?php 
    if (isset($_POST['simpan'])){

    //$date=date("Y-m-d");
    //$kd_rm=$_POST['kode'];
    $kdobat=$_POST['kd_obat'];
    
    $obat=$koneksi->query("select * from tb_obat where kd_obat='$kdobat'");
    $data_obat=$obat->fetch_assoc();
    $harga=$data_obat['harga'];
    $jumlah=1;
    $total=$jumlah*$harga;
  
    
    $obat2=$koneksi->query("select * from tb_obat where kd_obat='$kdobat'");
    while ($data_obat2=$obat2->fetch_assoc()){
       $sisa=$data_obat2['stok'];

       if($sisa==0){
        ?>
            <script type="text/javascript">
             alert ("Stok Obat Habis..Tidak Dapat Dipilih");
             window.location.href="";
            </script>
        <?php
        }
        else{
            $koneksi->query("insert into tb_rekam_medis_detail2 (no_rm,kd_obat,jumlah,dosis)values('$kode','$kdobat','$jumlah','1')");
        }

       }
    }
           
?>
            <form method="POST">
            <div class="body">
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Isi</th>
                            <th>Jumlah Obat</th>
                            <th>Dosis Per Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                    <?php
                    $no=1;
                    $sql= $koneksi->query("SELECT id,no_rm,tb_obat.kd_obat,nm_obat,satuan,isi,jumlah,dosis FROM tb_obat,tb_rekam_medis_detail2 where tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat AND 
                    	      no_rm='$kode'");
                    while($data= $sql->fetch_assoc()){

                    ?>
                    
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['kd_obat'];?></td>
                        <td><?php echo $data['nm_obat']?></td>
                        <td><?php echo $data['satuan']?></td>
                        <td><?php echo $data['isi']?></td>
                        <td><?php echo $data['jumlah']?></td>
                        <td><?php echo $data['dosis']?></td>
                        <!--<td><input type="number" name="jmlobat" value="<?php echo $data['jumlah']?>" style="width:80px;"></td>
                        <td>
                        	<input type="text" name="jmldosis" value="<?php echo $data['dosis']?>" style="width:80px;">
                        </td>-->
                        <td>
                        
                        <a href="?page=pemeriksaan_dokter&aksi=tambah&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Tambah Obat" class="btn btn-success">+ obat</i></a>

                        <a href="?page=pemeriksaan_dokter&aksi=kurang&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Kurangi Obat" class="btn btn-success">- obat</a>

                        <a href="?page=pemeriksaan_dokter&aksi=tambahdosis&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Tambah Dosis" class="btn btn-success">+ dosis</a>

                        <a href="?page=pemeriksaan_dokter&aksi=kurangdosis&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Kurangi Dosis" class="btn btn-success">- dosis</a>

                        <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=pemeriksaan_dokter&aksi=hapus&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>&jumlah=<?php echo $data['jumlah']; ?>" title="Hapus" class="btn btn-danger">Hapus</a>
                            </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>

                    <!--<tr>
                        
                        <td colspan="6" >Hasil Pemeriksaan
                        <input type="text" style="text-align: left;" name="diagnosa" id="diagnosa" placeholder="Diagnosa" class="form-control">
                        <input type="text" style="text-align: left;" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control">
                        <input type="submit" name="simpan_pj" value="Simpan" class="btn btn-info">

                        <input type="submit" value="Cetak" class="btn btn-success" onclick="window.open('page/penjualan/struk.php?kode_pjl=<?php echo $kode; ?>&kasir=<?php echo $kasir; ?>','mywindow','width-600px, heigh=600px, left=300px;')">

                        </td>
                    </tr>-->
                </table>
            </form>
                <div>
                	<form method="POST">
                    <label for="">Hasil Pemeriksaan</label>
                    <div class="row clearfix">
                        <div class="col-md-3 ">
                            <input type="text" id="diagnosa" name="diagnosa" class="form-control" data-toggle="modal" data-target="#myModaldiag" placeholder="Kode Diagnosa" />
                        </div>
                        <div class="col-md-3 ">
                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" />
                        </div>
                        <div class="col-md-3 ">
                        <input type="submit" name="simpanakhir" value="Simpan" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>    
    </div>
    </div>        
    </div>
</form>
<!-- #END# Select -->
<?php 

        if (isset($_POST['simpanakhir'])){

        $dosis=$_POST['dosis'];
        $diagnosa=$_POST['diagnosa'];
        $keterangan=$_POST['keterangan'];
       

        //$koneksi->query("update tb_rekam_medis_detail2 set dosis='$dosis' where no_rm='$kode'");
        $sql=$koneksi->query("update tb_rekam_medis set diagnosa='$diagnosa', ket='$keterangan', status='Selesai',statusobat='Dalam Antrian' where no_rm='$kode'");

        if($sql){

		?>
			<script>
				alert ("Data Berhasil Disimpan");
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
                                DATA OBAT
                            </h2>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>Isi</th>
                                            <th>Stok</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from tb_obat");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-kdobat="<?php echo $data['kd_obat']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td><?php echo $data['kd_obat']?></td>
                                        <td><?php echo $data['nm_obat']?></td>
                                        <td><?php echo $data['satuan']?></td>
                                        <td><?php echo $data['isi']?></td>
                                        <td><?php echo $data['stok']?></td>
                                                                                
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
                document.getElementById("kd_obat").value = $(this).attr('data-kdobat');
                $('#myModal').modal('hide');
            });
            

//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

            
        
        </script>
        <!--modal obat-->
        <!-- Modal Diagnosa-->
<div class="modal fade" id="myModaldiag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" id="myModalLabel">
                                DATA DIAGNOSA
                            </h2>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookupdiag" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Kode </th>
                                            <th>Nama Diagnosa</th>
                                            <th>Diagnosa ICD 10</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from tb_diagnosa");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilihdiag" data-kddiag="<?php echo $data['kd_diagnosa']; ?>" data-diag="<?php echo $data['nm_diagnosa']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td><?php echo $data['kd_diagnosa']?></td>
                                        <td><?php echo $data['nm_diagnosa']?></td>
                                        <td><?php echo $data['diagnosaicd10']?></td>
                                                                                
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                       
            </div>
        
        <script type="text/javascript">
                //            jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihdiag', function (e) {
                document.getElementById("diagnosa").value = $(this).attr('data-kddiag');
                document.getElementById("keterangan").value = $(this).attr('data-diag');
                $('#myModaldiag').modal('hide');
            });
            

//            tabel lookup diagnosa
            $(function () {
                $("#lookupdiag").dataTable();
            });

            
        
        </script>