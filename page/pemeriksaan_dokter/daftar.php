<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                DAFTAR PASIEN YANG BEROBAT
                </h2>
            </div>
<div class="body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped
table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tgl Periksa</th>
                    <th>No RM</th>
                    <th>No. Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Berat Badan</th>
                    <th>Keluhan</th>
                    <th>Status Pemeriksaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    $sql=$koneksi->query("select*from view_rm");
                    while ($data= $sql->fetch_assoc()){
                    ?>
                    <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['tgl_pemeriksaan']?></td>
                    <td><?php echo $data['no_rm']?></td>
                    <td><?php echo $data['no_pasien']?></td>
                    <td><?php echo $data['nm_pasien']?></td>
                    <td><?php echo $data['bb']?></td>
                    <td><?php echo $data['keluhan']?></td>
                    <td><?php echo $data['status']?></td>
                        <td>
                        <a href="?page=pemeriksaan_dokter&aksi=pemeriksaan_dokter&no_rm=<?php echo $data['no_rm'];?>" class="
                        btn btn-success">Lihat</a>
                        <a href="?page=pemeriksaan_dokter&aksi=tambah_obat&no_rm=<?php echo$data['no_rm'];?>"
                        class="btn btn-danger">+Obat</a>
                        <a href="?page=cetakobat&no_rm=<?php echo$data['no_rm'];?>"
                        class="btn btn-danger">cetak</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
                             </div>
                         </div>
                     </div>
                 </div>
</div>
