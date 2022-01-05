<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Design <small>different form elements</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="#">Settings 1</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="post" action="<?php echo base_url('nilai/update_nilai/' . $col['id_nilai']) ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Siswa</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" disabled class="form-control" id="nama" name="nama_siswa" aria-describedby="emailHelp" value="<?= $sis['nama_siswa']; ?>">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Posisi</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" disabled class="form-control" id="nama" name="nama_siswa" aria-describedby="emailHelp" value="<?= $sis['posisi']; ?>">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Teknik</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" disabled class="form-control" id="nama" name="Teknik" aria-describedby="emailHelp" value="<?= $tek['nama_teknik']; ?>">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Triwulan 1</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="posisi" name="nilai_1">
                            <option hidden value="<?= $col['nilai_1']; ?>"> <?= $col['nilai_1']; ?> </option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Triwulan 2</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="posisi" name="nilai_2">
                            <option hidden value="<?= $col['nilai_2']; ?>"> <?= $col['nilai_2']; ?> </option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Triwulan 3</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="posisi" name="nilai_3">
                            <option hidden value="<?= $col['nilai_3']; ?>"> <?= $col['nilai_3']; ?> </option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Triwulan 4</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="posisi" name="nilai_4">
                            <option hidden value="<?= $col['nilai_4']; ?>"> <?= $col['nilai_4']; ?> </option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>