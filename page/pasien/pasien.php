<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi=new mysqli("localhost","root","","klinik");

if($_SESSION['dokter'] || $_SESSION['apoteker']){
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
                                DATA PASIEN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Kelamin</th>
                                            <th>Pekerjaan</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Tgl Lahir</th>
                                            <th>Usia</th>
                                            <th>Telp</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select * from tb_pasien");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td width="30px"><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['j_kel']?></td>
                                        <td><?php echo $data['pekerjaan']?></td>
                                        <td><?php echo $data['agama']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        <td><?php echo $data['tgl_lhr']?></td>
                                        <td><?php echo $data['usia']?></td>
                                        <td><?php echo $data['no_tlp']?></td>
                                        <td><img src="images/<?php echo $data['foto']?>" width="50" height="50" alt=""></td>
                                        <td>
                                                <a href="?page=pasien&aksi=ubah&no_pasien=<?php echo $data['no_pasien'];?> " class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                                <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=pasien&aksi=hapus&no_pasien=<?php echo $data['no_pasien'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                            </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <a href="?page=pasien&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a>
                            <a href="page/pasien/cetak.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Cetak</a>
                            <a href="page/pasien/cetak-excel.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Excel</a>
                        </div>
                    </div>
<?php 

    }

?>                          