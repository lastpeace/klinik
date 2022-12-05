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
                                DATA DIAGNOSA
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>Kode Diagnosa</th>
                                            <th>Nama Diagnosa</th>
                                            <th>Diagnosa ICD 10</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select * from tb_diagnosa");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td width="20px"><?php echo $no++;?></td>
                                        <td width="30px"><?php echo $data['kd_diagnosa']?></td>
                                        <td width="250px"><?php echo $data['nm_diagnosa']?></td>
                                        <td width="300px"><?php echo $data['diagnosaicd10']?></td>
                                        <td width="100px"><?php echo $data['jenis']?></td>
                                        <td width="100px">
                                                <a href="?page=diagnosa&aksi=ubah&kd_diagnosa=<?php echo $data['kd_diagnosa'];?> " class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                                <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=diagnosa&aksi=hapus&kd_diagnosa=<?php echo $data['kd_diagnosa'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                            </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <a href="?page=diagnosa&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a>
                            <a href="page/diagnosa/cetak.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Cetak</a>
                            <a href="page/diagnosa/cetak-excel.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Excel</a>
                        </div>
                    </div>
<?php 

    }

?>                          