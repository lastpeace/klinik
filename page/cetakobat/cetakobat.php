 <?php
    if (isset($_POST['Bayar'])) {
        $norm = $_POST['norm'];
		$Qpasien = $koneksi->query("select * from tb_rekam_medis where no_rm='$norm'");
        $Rpasien= $Qpasien->fetch_assoc();
		$nopasien = $Rpasien['no_pasien'];
		$pasien=$koneksi->query("update tb_pasien set status='TA' where no_pasien = '$nopasien'");
        
        if($pasien) {
            ?>
        <script>
            window.open('page/cetakobat/cetakpembayaran.php?no_rm=<?php echo $_POST['norm']; ?>','mywindow','width=600px, height=600px, left=400px;');    
        </script>
	<?php
        } else {
            ?>
            <script>alert("gagal bayar");</script>
            <?php
        }
     } 
 ?>
 
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR PASIEN YANG BEROBAT
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tgl Periksa</th>
                                            <th>No ID</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Berat Badan</th>
                                            <th>Keluhan</th>
                                            <th>Status Periksa</th>
                                            <th>Status Obat</th>
                                            <th>Status Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("SELECT `tgl_pemeriksaan`,tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,bb,`keluhan`,tb_rekam_medis.status,tb_rekam_medis.statusobat,tb_rekam_medis.statuspembayaran FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
                                        WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
                                              tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien`
                                              order by tb_rekam_medis.id DESC");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['tgl_pemeriksaan']?></td>
                                        <td><?php echo $data['no_rm']?></td>
                                        <td><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['bb']?></td>
                                        <td><?php echo $data['keluhan']?></td>
                                        <td><font color="blue"><?php echo $data['status']?></font></td>
                                        <td><font color="blue"><?php echo $data['statusobat']?></font></td>
                                        <td><font color="blue"><?php echo $data['statuspembayaran']?></font></td>
                                        <form method="post">
                                            <td>
                                                <input type="hidden" name="norm" value="<?= $data['no_rm'] ?>">
                                                <input type="submit" value="Cetak Obat" class="btn btn-success" onclick="window.open('page/cetakobat/cetak.php?no_rm=<?php echo $data['no_rm']; ?>','mywindow','width=600px, height=600px, left=400px;')">
                                                <input type="submit" name="Bayar" value="Bayar" class="btn btn-success" onclick="">
                                            </td>
                                        </form>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <!--<a href="?page=pemeriksaan_dokter&aksi=tambah" class="btn btn-primary">Tambah</a>
                            <a href="page/pemeriksaan_dokter/cetak.php" target="blank" class="btn btn-primary">Cetak</a>-->
                        </div>
                    </div>
                       