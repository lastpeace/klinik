
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
                        <form method="POST" enctype="multipart/form-data">
                        <label for="">Kode Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['no_pasien'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_pasien'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jkel" class="form-control show-tick">
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="L"<?php if ($tampil['j_kel']=='L'){echo "selected";}?>>Laki-Laki</option>
                                <option value="P"<?php if ($tampil['j_kel']=='P'){echo "selected";}?>>Perempuan</option>
                            </select>
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
                            <select name="agama" class="form-control show-tick">
                                <option value="">---Pilih Agama---</option>
                                <option value="Islam"<?php if ($tampil['agama']=='Islam'){echo "selected";}?>>Islam</option>
                                <option value="Kristen Katolik"<?php if ($tampil['agama']=='Kristen Katolik'){echo "selected";}?>>Kristen Katolik</option>
                                <option value="Kristen Protestan"<?php if ($tampil['agama']=='Kristen Protestan'){echo "selected";}?>>Kristen Protestan</option>
                                <option value="Konghucu"<?php if ($tampil['agama']=='Konghucu'){echo "selected";}?>>Konghucu</option>
                                <option value="Hindu"<?php if ($tampil['agama']=='Hindu'){echo "selected";}?>>Hindu</option>
                                <option value="Budha"<?php if ($tampil['agama']=='Budha'){echo "selected";}?>>Budha</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Tgl Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lhr'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Usia</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="usia" value="<?php echo $tampil['usia'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telpon" value="<?php echo $tampil['no_tlp'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <img src="images/<?php echo $tampil['foto'];?>" width="50" height="50" alt="">
                            </div>
                        </div>

                        <label for="">Ganti Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="foto" class="form-control" />
                            </div>
                        </div>

                        <label for="">Status</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="status" class="form-control show-tick">
                                <option value="">---Pilih Jenis Status---</option>
                                <option value="A"<?php if ($tampil['status']=='A'){echo "selected";}?>>Aktif</option>
                                <option value="TA"<?php if ($tampil['status']=='TA'){echo "selected";}?>>Tidak Aktif</option>
                            </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jkel=$_POST['jkel'];
$pekerjaan=$_POST['pekerjaan'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$tgl_lahir=$_POST['tgl_lahir'];
$usia=$_POST['usia'];
$telpon=$_POST['telpon'];
$status=$_POST['status'];
$foto=$_FILES['foto']['name'];
$lokasi=$_FILES['foto']['tmp_name'];

if (!empty($lokasi)){

    $upload=move_uploaded_file($lokasi, "images/".$foto);

    $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama',j_kel='$jkel',pekerjaan='$pekerjaan',agama='$agama',alamat='$alamat', tgl_lhr='$tgl_lahir', usia='$usia', no_tlp='$telpon', foto='$foto',status='$status' where no_pasien='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Ubah");
        window.location.href="?page=pasien";
        </script>
        <?php
    }
    }else{
      $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama',j_kel='$jkel',pekerjaan='$pekerjaan',agama='$agama',alamat='$alamat', tgl_lhr='$tgl_lahir', usia='$usia', no_tlp='$telpon', status='$status' where no_pasien='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Ubah");
        window.location.href="?page=pasien";
        </script>
        <?php
    }  
}
}

?>