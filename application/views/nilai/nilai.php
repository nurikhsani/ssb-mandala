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


            <h5 class="prod_title"> NAMA : <?= $siswa->nama_siswa; ?></h5>
            <h5 class="prod_title"> POSISI : <?= $siswa->posisi ?></h5>
            <input type="hidden" id="idsiswa" value="<?php echo $siswa->id_siswa; ?>" />
            <div class="col-sm-4">
                <select class="form-control" id="cari_tahun" name="cari_tahun">
                    <option value="0">-Pilih-</option>
                    <?php foreach ($list_tahun as $row) { ?>
                        <option value="<?php echo $row ?>" <?php if ($row == $select_tahun) echo 'selected="selected"'; ?>><?php echo $row ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="table-responsive mt-4">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class=" thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Teknik</th>
                            <th scope="col">Triwulan 1</th>
                            <th scope="col">Triwulan 2</th>
                            <th scope="col">Triwulan 3</th>
                            <th scope="col">Triwulan 4</th>
                            <th scope="col">Aksi</th>
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
                                <td><?= $t['nilai_2'] ?></td>
                                <td><?= $t['nilai_3'] ?></td>
                                <td><?= $t['nilai_4'] ?></td>
                                <td>

                                    <?php if (!isset($t['nilai_1']) && !isset($t['nilai_2']) && !isset($t['nilai_3']) && !isset($t['nilai_4'])) { ?>
                                        <a href="<?= base_url('nilai/i_nilai?idsiswa=' . $siswa->id_siswa . '&idteknik=' . $t['idteknik'] . '&tahun=' . $select_tahun); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('nilai/update_nilai/' . $t['id_nilai']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    <a href="<?= base_url('nilai/del_nilai/' . $t['id_nilai']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Dihapus?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('select').on('change', function() {
        var tahun = this.value;
        var idsiswa = $("#idsiswa").val();
        window.location.href = "<?php echo base_url() ?>nilai/nilai?idsiswa=" + idsiswa + "&tahun=" + tahun;
    });
</script>
<!-- /page content -->