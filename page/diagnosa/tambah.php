<script>
function jumlah(){
    
var hrg_beli = document.getElementById('harga_beli').value;
var hrg_jual = document.getElementById('harga_jual').value;
var rslt = parseInt(hrg_jual) - parseInt(hrg_beli);
if(!isNaN(rslt)){
    document.getElementById('profit').value = rslt;
}

}
</script>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA DIAGNOSA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode"class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Diagnosa ICD-10</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama10"class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jdiagnosa" class="form-control show-tick">
                                <option value="">---Pilih Diagnosa---</option>
                                <option value="TELINGA">Telinga</option>
                                <option value="HIDUNG">Hidung</option>
                                <option value="LARING FARING">Laring Faring</option>
                                <option value="TUMOR">Tumor</option>
                                <option value="LAIN-LAIN">Lain-Lain</option>
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

    $sql=$koneksi->query("insert into tb_diagnosa values('$kode','$nama','$nama10','$jdiagnosa')");
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