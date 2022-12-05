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
                        <label for="">No. ID</label>
                        <div class="row clearfix">
                            <div class="col-md-2">
                            <input type="text" name="kode" value="<?php echo $tampil['no_rm']; ?>" class="form-control" readonly="" />
                            </div>

                            <!--<div class="col-md-2 ">
                                <input type="text" name="no_pasien" class="form-control" />
                            </div>
                            <div class="col-md-2 ">
                            <input type="submit" name="simpan" value="Cari Pasien" class="btn btn-primary">
                            </div>-->
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
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Kelamin</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Agama</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
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
                        <input type="text" name="txtbb" class="form-control" value="<?php echo $tampil['bb'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">            
                        <input type="text" name="txttb" class="form-control" value="<?php echo $tampil['tb'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">            
                        <input type="text" name="txtlp" class="form-control" value="<?php echo $tampil['lp'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">  
                        <input type="text" name="txtsuhu" class="form-control" value="<?php echo $tampil['suhu'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">            
                        <input type="text" name="txttd" class="form-control" value="<?php echo $tampil['td'];?>" readonly="" />
                        </div>
                    </div>
                    <label for="">2. Alergi Obat, Kolesterol, Asam Urat, Glukosa dan Hemoglobin</label>
                    <div class="row clearfix">
                        <div class="col-sm-1">  
                        <input type="text" name="txtao" class="form-control" value="<?php echo $tampil['ao'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">  
                        <input type="text" name="txtkol" class="form-control" value="<?php echo $tampil['kol'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">            
                        <input type="text" name="txtau" class="form-control" value="<?php echo $tampil['au'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">  
                        <input type="text" name="txtglu" class="form-control" value="<?php echo $tampil['glu'];?>" readonly="" />
                        </div>
                        <div class="col-sm-1">            
                        <input type="text" name="txthb" class="form-control" value="<?php echo $tampil['hb'];?>" readonly="" />
                        </div>
                    </div>
                    <label for="">3. Keluhan-Keluhan</label>
                    <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." readonly=""><?php echo $tampil['keluhan'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <!--<div class="demo-checkbox">-->
                        <!--awal tanpa database
                        
                        <input type="checkbox" class="checkbox" id="keluhan[]" name="keluhan[]" value="Batuk" />BATUK
                        <input type="checkbox" name="keluhan[]" value="Flu" />FLU
                        <input type="checkbox" name="keluhan[]" value="Demam" />DEMAM
                        <input type="checkbox" name="keluhan[]" value="Pusing" />PUSING
                        <input type="checkbox" name="keluhan[]" value="Mual" />MUAL
                        <input type="checkbox" name="keluhan[]" value="Muntah" />MUNTAH
                        <br>
                        <input type="submit" name="simpanawal" value="Simpan">-->
                        <!--awal tanpa database
                        <input type="checkbox" id="batuk" name="keluhan[]" value="Batuk" class="chk-col-red" />
                        <label for="batuk">BATUK</label>
                        <input type="checkbox" id="flu" name="keluhan[]" value="Flu" class="chk-col-red"  />
                        <label for="flu">FLU</label>
                        <input type="checkbox" id="demam" name="keluhan[]" value="Demam" class="chk-col-red"  />
                        <label for="demam">DEMAM</label>
                        <input type="checkbox" id="pusing" name="keluhan[]" value="Pusing" class="chk-col-red"  />
                        <label for="pusing">PUSING</label>
                        <input type="checkbox" id="mual" name="keluhan[]" value="Mual" class="chk-col-red"  />
                        <label for="mual">MUAL</label>
                        <input type="checkbox" id="muntah" name="keluhan[]" value="Muntah" class="chk-col-red"  />
                        <label for="muntah">MUNTAH</label>
                        <br>
                        <input type="submit" name="simpanawal" value="Simpan">-->
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
                    <!--</div>-->

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
        window.location.href="";
        </script>
        <?php
    }
        }       
?>