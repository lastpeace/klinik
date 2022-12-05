<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi=new mysqli("localhost","root","","klinik");

if($_SESSION['petugas'] || $_SESSION['dokter']){
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
                                TAMBAH STOK OBAT
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>Isi</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select id,tgl,tb_pembelian_detail.`kd_obat`,`nm_obat`,`satuan`,`isi`,jumlah from tb_pembelian_detail,tb_obat
                                        where tb_pembelian_detail.kd_obat=tb_obat.kd_obat");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['tgl']?></td>
                                        <td><?php echo $data['kd_obat']?></td>
                                        <td><?php echo $data['nm_obat']?></td>
                                        <td><?php echo $data['satuan']?></td>
                                        <td><?php echo $data['isi']?></td>
                                        <td><?php echo $data['jumlah']?></td>
                                        <td>
                                                <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=tambahstok&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                            </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            <a href="?page=tambahstok&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a>
                            <a href="page/tambahstok/cetak.php" target="blank" class="btn btn-primary"><img src="images/print.ico" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Cetak</a>
                        </div>
                    </div>
<?php 

    }

?>                          