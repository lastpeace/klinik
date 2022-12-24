<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi=new mysqli("localhost","root","","klinik");

if($_SESSION['petugas'] || $_SESSION['dokter'] || $_SESSION['apoteker']){
        //header("location:index.php");
        ?>
        <script type="text/javascript">
        alert ("Anda Tidak Berhak Mengakses Halaman ini");
        window.location.href="logout.php";
        </script>
        <?php
    }else{

?>

 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA DOKTER
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>Kode Dokter</th>
                                            <th>Nama Dokter</th>
                                            <th>Tempat Lahir</th>
                                            <th>Telp</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select * from tb_dokter");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['kd_dokter']?></td>
                                        <td><?php echo $data['nm_dokter']?></td>
                                        <td><?php echo $data['tmp_lhr']?></td>
                                        <td><?php echo $data['tlp']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        <td>
                                                <a href="?page=dokter&aksi=ubah&kd_dokter=<?php echo $data['kd_dokter'];?> " class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /> Edit Data</a>
                                                <!-- <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=dokter&aksi=hapus&kd_dokter=<?php echo $data['kd_dokter'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a> -->
                                            </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <!-- <a href="?page=dokter&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a> -->
                            <a href="page/dokter/cetak.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Cetak</a>
                            <a href="page/dokter/cetak-excel.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Excel</a>
                        </div>
                    </div>
<?php 

    }

?>                          