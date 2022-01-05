<!-- page content -->
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $judul ?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="table-responsive mt-4">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tempat/Tanggal Lahir</th>
                            <th scope="col">Tinggi Badan</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Usia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tampil as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama_siswa'] ?></td>
                                <td><?= $t['asal'] . ", " . $t['tanggal_lahir'] ?></td>
                                <td><?= $t['tinggi_badan'] ?></td>
                                <td><?= $t['berat_badan'] ?></td>
                                <td><?= $t['posisi'] ?></td>
                                <td><?= $t['alamat'] ?></td>
                                <td><?= $t['usia'] ?></td>
                                <!-- date('Y') - date("Y", strtotime($t['tanggal_lahir'])) -->
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $("#btnCari").click(function() {
            var cari_usia = $("#cari_usia").val();
            window.location.href = "<?php echo base_url() ?>mahasiswa?usia=" + cari_usia;
        });

        $("#btnReset").click(function() {
            $("#cari_usia").val("0");
            window.location.href = "/ssb-mandala/mahasiswa";
        });
    </script>
</div>
</div>
</div>
</div>

<!-- /page content -->