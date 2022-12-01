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
                                UBAH DATA pasien
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">No Pasien</label>
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
                                <input type="text" name="jenis" value="<?php echo $tampil['j_kel'];?>" class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="tlp" value="<?php echo $tampil['no_tlp'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$tlp=$_POST['tlp'];
$alamat=$_POST['alamat'];


    $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama',j_kel='$jenis',no_tlp='$tlp',alamat='$alamat' where no_pasien='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Ubah");
        window.location.href="?page=pasien";
        </script>
        <?php
    }
}

?>