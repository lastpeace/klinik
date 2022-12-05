
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA STOK
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        
                        <label for="">Kode Obat</label>
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <input type="text" id="kode" name="kode" class="form-control" data-toggle="modal" data-target="#myModalobat" placeholder="Kode Obat" />
                            </div>
                       
                            <div class="col-md-3">
                                <input type="text" id="nama" name="nama" class="form-control" readonly="" placeholder="Nama Obat"/>
                            </div>

                            <div class="col-md-3">
                                <input type="text" id="satuan" name="satuan" class="form-control" readonly="" placeholder="Satuan Obat"/>
                            </div>

                            <div class="col-md-3">
                                <input type="text" id="isi" name="isi" class="form-control" readonly="" placeholder="Isi"/>
                            </div>
                        </div>

                        <label for="">Jumlah</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Obat"/>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){

date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");
$kode=$_POST['kode'];
$jumlah=$_POST['jumlah'];

$sql=$koneksi->query("insert into tb_pembelian_detail(id,tgl,kd_obat,jumlah) values('','$date','$kode','$jumlah')");
    if ($sql){
        ?>
        <script type="text/javascript">
        //alert ("Data Berhasil di Simpan");
        window.location.href="?page=tambahstok";
        </script>
        <?php
    }
}

?>
<!-- Modal -->
<div class="modal fade" id="myModalobat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    
                                    <tr class="pilih" data-kdobat="<?php echo $data['kd_obat']; ?>" data-nama="<?php echo $data['nm_obat']; ?>" data-satuan="<?php echo $data['satuan']; ?>" data-isi="<?php echo $data['isi']; ?>">
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
                //            jika dipilih, kd_obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kode").value = $(this).attr('data-kdobat');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("satuan").value = $(this).attr('data-satuan');
                document.getElementById("isi").value = $(this).attr('data-isi');
                $('#myModalobat').modal('hide');
            });
            

//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

            
        
        </script>
        <!--modal obat-->