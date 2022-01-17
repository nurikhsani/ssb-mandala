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

            <div class="row baris">
                <div class="col-sm-6">
                    <label class="col-sm-3">Kelompok Usia</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="cari_usia" name="cari_usia">
                            <option value="0">-Pilih-</option>
                            <?php foreach ($list_usia as $row) { ?>
                                <option value="<?php echo $row->usia ?>" <?php if ($row->usia == $select_usia) echo 'selected="selected"'; ?>><?php echo $row->usia ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="btnCari">Cari</button>
                    <button class="btn btn-danger" id="btnReset">Reset</button>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <a href="<?= base_url() ?>siswa/i_siswa" class="btn btn-primary"> Tambah Data </a>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Username</th>
                            <th scope="col">Tempat/Tanggal Lahir</th>
                            <th scope="col">Tinggi Badan</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama_siswa'] ?></td>
                                <td><?= $t['username'] ?></td>
                                <td><?= $t['asal'] . ", " . $t['tanggal_lahir'] ?></td>
                                <td><?= $t['tinggi_badan'] ?></td>
                                <td><?= $t['berat_badan'] ?></td>
                                <td><?= $t['posisi'] ?></td>
                                <td><?= $t['alamat'] ?></td>
                                <td><?= $t['usia'] ?></td>
                                <td> <a href="<?= base_url('siswa/del_siswa/' . $t['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Dihapus?')"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('siswa/update_siswa/' . $t['id_siswa']); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                </td>
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
            window.location.href = "<?php echo base_url() ?>siswa?usia=" + cari_usia;
        });

        $("#btnReset").click(function() {
            $("#cari_usia").val("0");
            window.location.href = "/ssb-mandala/siswa";
        });
    </script>
</div>
</div>
</div>
</div>

<!-- /page content -->