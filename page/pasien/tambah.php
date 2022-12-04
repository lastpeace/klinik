<?php
error_reporting(E_ALL ^ E_DEPRECATED AND E_NOTICE);
// menghubungkan dengan koneksi database
$koneksi=new mysqli("localhost","root","","klinik");
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_pasien) as kodeTerbesar FROM tb_pasien");
$data = mysqli_fetch_array($query);
$nopasien = $data['kodeTerbesar'];
 
// mengambil angka dari nmor pasien terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($nopasien, 5);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk nomor pasien baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "PSN";
$nopasien = $huruf . sprintf("%05s", $urutan);
?>
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
                                TAMBAH DATA PASIEN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST" action="    ">
                        <label for="">Kode Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $nopasien; ?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="j_kel"class="form-control" />
                            </div>
                        </div>

                        <label for="">Pekerjaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="pekerjaan"class="form-control" />
                            </div>
                        </div>

                        <label for="">Agama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="agama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat"class="form-control" />
                            </div>
                        </div>

                        <label for="">Tanggal Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_lhr"class="form-control" />
                            </div>
                        </div>

                        <label for="">Usia</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="usia"class="form-control" />
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="no_tlp"class="form-control" />
                            </div>
                        </div>

                        <label for="">GOL DARAH</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="status"class="form-control" />
                            </div>
                        </div>
                        <input type="submit" name="simpanpasien" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpanpasien'])){
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d H:i:s");
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$j_kel=$_POST['j_kel'];
$pekerjaan=$_POST['pekerjaan'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$tgl_lhr=$_POST['tgl_lhr'];
$usia=$_POST['usia'];
$no_tlp=$_POST['no_tlp'];
$status=$_POST['status'];
    // $tgldaftar = $_POST['tgldaftar'];

    $sql=$koneksi->query("insert into tb_pasien(no_pasien,nm_pasien,j_kel,pekerjaan,agama,alamat,tgl_lhr,usia,no_tlp,status,tgldaftar) values('$kode','$nama','$j_kel','$pekerjaan','$agama','$alamat','$tgl_lhr','$usia','$no_tlp','$status','$date')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=pasien";
        </script>
        <?php
    }
}

?>