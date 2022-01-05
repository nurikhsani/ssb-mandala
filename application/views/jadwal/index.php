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
                <a href="<?= base_url() ?>jadwal/i_jadwal" class="btn btn-primary"> Tambah Data </a>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"">
                            <thead class=" thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Kelompok Usia</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Pelatih</th>
                        <th scope="col">Pelatih Kiper</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal as $t) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['hari'] ?></td>
                                <td><?= $t['waktu_mulai'] . " - " . $t['waktu_selesai'] ?></td>
                                <td><?= $t['kelompok_usia'] ?></td>
                                <td><?= $t['tempat'] ?></td>
                                <td><?= $t['pelatih'] ?></td>
                                <td><?= $t['pelatih_gk'] ?></td>
                                <td> <a href="<?= base_url('jadwal/del_jadwal/' . $t['id_jadwal']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Dihapus?')"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('jadwal/update_jadwal/' . $t['id_jadwal']); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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
<!-- /page content -->