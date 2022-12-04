<?php
    
    $kd_obat = $_GET['kd_obat'];
    $sql = $koneksi->query("select * from tb_obat where kd_obat='$kd_obat'");
    $tampil = $sql->fetch_assoc();
?>
    <script>
function jumlah(){
    
var hrg_beli = document.getElementById('harga_beli').value;
var hrg_jual = document.getElementById('harga_jual').value;
var hasil = parseInt(hrg_jual) - parseInt(hrg_beli);
if(!isNaN(hasil)){
    document.getElementById('profit').value = hasil;
}

}
</script>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA OBAT
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode OBAT</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['kd_obat'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama OBAT</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_obat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label>Satuan</label>
                        <div class= "form-group">
                            <div class="form-line">
                                <select name="satuan" class="form-control show-tick">
                                <option value=""><?php echo $tampil['satuan'];?></option>
                                <option value= "Boto1">--Botol--</option>
                                <option value= "Butir">--Butir--</option>
                                <option value= "Tablet">--Tablet--</option>
                                </select>
                            </div>
                        </div>

                        <label for="">isi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="isi" value="<?php echo $tampil['isi'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Stok</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="stok" value="<?php echo $tampil['stok'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Harga Beli</label>
                            <div class= "form-group">
                                <div class="form-line">
                                    <input type="number" id="harga_beli" onkeyup="jumlah()" value="<?php echo $tampil['harga_beli'];?>"
                                    name= "harga_beli" class="form-control" /> 
                                </div>
                            </div>

                            <label for="">Harga Jual</label>
                                <div class= "form-group">
                                    <div class="form-line">
                                        <input type= "number" id= "harga_jual" name="harga_jual"onkeyup="jumlah()" value="<?php echo $tampil['harga_jual'];?>" class="form-control" />
                                    </div>
                                </div>



                            <label for="">Profit</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="profit" name="profit" class="form-control" value="<?php echo $tampil['profit'];?>" readonly/>
                                </div>
                            </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
    $kode=$_POST['kode' ];
    $nama =$_POST[ 'nama'];
    $satuan= $_POST[ 'satuan'];
    $isi= $_POST[ 'isi'];
    $stok = $_POST['stok'];
    $harga_beli =$_POST['harga_beli'];
    $harga_jual =$_POST[ 'harga_jual'];
    $profit= $_POST[ 'profit'];


    $sql=$koneksi->query("update tb_obat set nm_obat='$nama',satuan='$satuan',isi='$isi',stok='$stok',harga_beli='$harga_beli',harga_jual='$harga_jual',profit ='$profit' where kd_obat='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Obat Berhasil di Ubah");
        window.location.href="?page=obat";
        </script>
        <?php
    }
}

?>