<?php

    $kd_diagnosa = $_GET['kd_diagnosa'];
    $sql = $koneksi->query("select * from tb_diagnosa where kd_diagnosa='$kd_diagnosa'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA DIAGNOSA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['kd_diagnosa'];?>" class="form-control" readonly/>
                            </div>
                        </div>

                        <label for="">Nama Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_diagnosa'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Diagnosa ICD-10</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama10" value="<?php echo $tampil['diagnosaicd10'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jdiagnosa" class="form-control show-tick">
                                <option value="">---Pilih Diagnosa---</option>
                                <option value="TELINGA"<?php if ($tampil['jenis']=='TELINGA'){echo "selected";}?>>Telinga</option>
                                <option value="HIDUNG"<?php if ($tampil['jenis']=='HIDUNG'){echo "selected";}?>>Hidung</option>
                                <option value="LARING FARING"<?php if ($tampil['jenis']=='LARING FARING'){echo "selected";}?>>Laring Faring</option>
                                <option value="TUMOR"<?php if ($tampil['jenis']=='TUMOR'){echo "selected";}?>>Tumor</option>
                                <option value="LAIN-LAIN"<?php if ($tampil['jenis']=='LAIN-LAIN'){echo "selected";}?>>Lain-Lain</option>
                            </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$nama10=$_POST['nama10'];
$jdiagnosa=$_POST['jdiagnosa'];

    $sql=$koneksi->query("update tb_diagnosa set nm_diagnosa='$nama',diagnosaicd10='$nama10',jenis='$jdiagnosa' where kd_diagnosa='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=diagnosa";
        </script>
        <?php
    }
}

?>