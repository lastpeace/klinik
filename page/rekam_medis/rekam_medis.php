<?php
$conn = new mysqli("localhost", "root", "", "klinik");
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <form method="POST">
                        <div>
                            <label for="">No. ID</label>
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <input type="text" name="code" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="no_pasien" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="submit" value="Cari Pasien" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                        <label for="">Pilih Dokter</label>
                        <div class="row clearfix">
                            <div class="col-md-2">
                                <select name="dokter" class="form-control show-tick">
                                    <?php
                                    $label = "<option>";
                                    $dokter = $conn->query("select * from tb_dokter order by kd_dokter");
                                    while ($dok = $dokter->fetch_assoc()) {
                                        echo "<option value='$dok[kd_dokter]' >$dok[nm_dokter]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>DATA DOKTER</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Kelamin</th>
                                <th>Tgl Lahir</th>
                                <th>Usia</th>
                                <th>Agama</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $conn->query("select tb_pasien.no_pasien, nm_pasien, j_kel, tgl_lhr,usia,agama,no_tlp,alamat from tb_pasien,tb_rekam_medis where tb_rekam_medis.no_pasien = tb_pasien.no_pasien ")
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>DATA PEMERIKSAAN AWAL</h2>
            </div>
            <div class="body">
                <form method="POST">
                    <label for="">1. Berat badan, Tinggi badan, Lingkar perut, Suhu badan dan Tekanan darah</label>
                    <div class="row clearfix">
                        <div class="col-sm-1">
                            <input type="text" name="bb" class="form-control" placeholder="BB">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="tb" class="form-control" placeholder="TB">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="lp" class="form-control" placeholder="LP">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="suhu" class="form-control" placeholder="Suhu">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="td" class="form-control" placeholder="TD">
                        </div>
                    </div>
                    <label for="">2. Alergi obat, Kolestrol, Asam urat, Glukosa dan Hemoglobin</label>
                    <div class="row clearfix">
                        <div class="col-sm-1">
                            <input type="text" name="ao" class="form-control" placeholder="AO">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="kol" class="form-control" placeholder="KOL">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="au" class="form-control" placeholder="AU">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="glu" class="form-control" placeholder="GLU">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" name="hb" class="form-control" placeholder="HB">
                        </div>
                    </div>
                    <label for="">3. Keluhan-Keluhan</label>
                    <div class="demo-checkbox">
                        <input type="checkbox" id="batuk" name="keluhan" value="Batuk" class="chk-col-red">
                        <label for="batuk">BATUK</label>
                        <input type="checkbox" id="flu" name="keluhan" value="Batuk" class="chk-col-red">
                        <label for="flu">FLU</label>
                        <input type="checkbox" id="demam" name="keluhan" value="Batuk" class="chk-col-red">
                        <label for="demam">DEMAM</label>
                        <input type="checkbox" id="pusing" name="keluhan" value="Batuk" class="chk-col-red">
                        <label for="pusing">PUSING</label>
                        <input type="checkbox" id="mual" name="keluhan" value="Batuk" class="chk-col-red">
                        <label for="mual">MUAL</label>
                        <input type="checkbox" id="muntah" name="keluhan" value="Batuk" class="chk-col-red">
                        <label for="muntah">MUNTAH</label>
                        <br>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>