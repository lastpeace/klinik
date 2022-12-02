<?php
    
    $no_pasien = $_GET['no_pasien'];
    $sql = $koneksi->query("select * from tb_pasien where no_pasien='$no_pasien'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PASIEN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['no_pasien'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_pasien'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="j_kel" value="<?php echo $tampil['j_kel'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Pekerjaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="pekerjaan" value="<?php echo $tampil['pekerjaan'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Agama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="agama" value="<?php echo $tampil['agama'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Tanggal Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl" value="<?php echo $tampil['tgl_lhr'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Usia</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="usia" value="<?php echo $tampil['usia'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">No Telpone</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telp" value="<?php echo $tampil['no_tlp'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">GOL DARAH</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="status" value="<?php echo $tampil['status'];?>" class="form-control" />
                            </div>
                        </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$pekerjaan=$_POST['pekerjaan'];
$j_kel=$_POST['j_kel'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$tgl = $_POST['tgl'];
$usia = $_POST['usia'];
$telp = $_POST['telp'];
$status = $_POST['status'];


    $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama',pekerjaan='$pekerjaan',j_kel='$j_kel',agama='$agama',alamat='$alamat',tgl_lhr='$tgl',usia='$usia',no_tlp='$telp', status='$status' where no_pasien='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Pasien Berhasil di Ubah");
        window.location.href="?page=pasien";
        </script>
        <?php
    }
}

?>