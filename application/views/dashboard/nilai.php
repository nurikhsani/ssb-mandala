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

            <div class="col-sm-4 mb-4">
                <select class="form-control" id="cari_tahun" name="cari_tahun">
                    <option value="0">-Pilih-</option>
                    <?php foreach ($list_tahun as $row) { ?>
                        <option value="<?php echo $row ?>" <?php if ($row == $select_tahun) echo 'selected="selected"'; ?>><?php echo $row ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="hidden" id="idsiswa" value="<?php echo $col['id_siswa']; ?>" />

            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Teknik</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama_teknik'] ?></td>
                                <td><?= $t['nilai_1'] ?></td>
                                <!-- date('Y') - date("Y", strtotime($t['tanggal_lahir'])) -->
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Teknik</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama_teknik'] ?></td>
                                <td><?= $t['nilai_2'] ?></td>
                                <!-- date('Y') - date("Y", strtotime($t['tanggal_lahir'])) -->
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Teknik</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama_teknik'] ?></td>
                                <td><?= $t['nilai_3'] ?></td>
                                <!-- date('Y') - date("Y", strtotime($t['tanggal_lahir'])) -->
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Teknik</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama_teknik'] ?></td>
                                <td><?= $t['nilai_4'] ?></td>
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
        $('select').on('change', function() {
            var tahun = this.value;
            var idsiswa = $("#idsiswa").val();
            window.location.href = "<?php echo base_url() ?>Dashboard/nilai?idsiswa=" + idsiswa + "&tahun=" + tahun;
        });
    </script>
</div>
</div>
</div>
</div>

<!-- /page content -->