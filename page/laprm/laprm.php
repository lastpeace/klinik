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
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Tgl Lahir</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("Select  tb_pasien.no_pasien, nm_pasien,tgl_lhr,agama,alamat
                                        from  tb_pasien, tb_rekam_medis
                                        where tb_pasien.no_pasien=tb_rekam_medis.no_pasien
                                        group by nm_pasien
                                        ");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['tgl_lhr']?></td>
                                        <td><?php echo $data['agama']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        <td>
                                            <a href="?page=laprm&aksi=daftar&no_pasien=<?php echo $data['no_pasien'];?> " class="btn btn-success">Lihat Rekam Medis</a>
                                        </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <!--<a href="?page=pemeriksaan_dokter&aksi=tambah" class="btn btn-primary">Tambah</a>
                            <a href="page/pemeriksaan_dokter/cetak.php" target="blank" class="btn btn-primary">Cetak</a>-->
                        </div>
                    </div>
                       