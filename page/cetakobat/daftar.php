<?php

    $no_pasien = $_GET['no_pasien'];
    //$sql = $koneksi->query("delete from tb_barang where kode_barcode='$kode_barcode'");

?>
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR REKAM MEDIS PASIEN
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("SELECT `tgl_pemeriksaan`,tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,bb,`keluhan`,tb_rekam_medis.status FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
                                        WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
                                              tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien` and tb_rekam_medis.no_pasien='$no_pasien'
                                              order by tgl_pemeriksaan DESC");
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
                                        <td>
                                            <input type="submit" value="Cetak Rekam Medis" class="btn btn-success" onclick="window.open('page/laprm/cetak.php?no_rm=<?php echo $data['no_rm']; ?>','mywindow','width=600px, height=600px, left=400px;')">
                                        </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <!--<a href="?page=pemeriksaan_dokter&aksi=tambah" class="btn btn-primary">Tambah</a>
                            <a href="page/pemeriksaan_dokter/cetak.php" target="blank" class="btn btn-primary">Cetak</a>-->
                        </div>
                    </div>
                       