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
            <form method="POST" action="<?= base_url("jadwal/i_jadwal") ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="item form-group ">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Pelatih</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="pelatih" name="pelatih">
                            <option hidden> Pilih Pelatih </option>
                            <?php $pelatih = $this->Jadwal_model->pelatih('umum');
                            foreach ($pelatih as $p) {
                            ?>
                                <option value="<?= $p['id_pelatih'] ?>"><?= $p['nama_pelatih'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="item form-group ">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Pelatih Kiper</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="pelatih" name="pelatih_gk">
                            <option hidden> Pilih Pelatih </option>
                            <?php $pelatih = $this->Jadwal_model->pelatih('gk');
                            foreach ($pelatih as $gk) {
                            ?>
                                <option value="<?= $gk['id_pelatih'] ?>"><?= $gk['nama_pelatih'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Waktu Mulai <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="waktu_mulai" required="required" name="waktu_mulai" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Waktu Selesai <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="waktu_selesai" name="waktu_selesai" required="required" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Kelompok Usia</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="kelompok_usia" name="kelompok_usia">
                            <option hidden> Pilih Kelompok Usia </option>
                            <option value='9'> U-9 </option>
                            <option value='10'> U-10 </option>
                            <option value='11'> U-11 </option>
                            <option value='12'> U-12 </option>
                            <option value='13'> U-13 </option>
                            <option value='14'> U-14 </option>
                            <option value='15'> U-15 </option>
                            <option value='16'> U-16 </option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tempat</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="tempat" name="tempat">
                            <option hidden> Pilih Tempat </option>
                            <option value='Lapang KPU'> Lapang KPU </option>
                            <option value='Stadion Warung Jambu'> Stadion Warung Jambu </option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Hari</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="hari" name="hari">
                            <option hidden> Pilih Hari </option>
                            <option value='Senin'> Senin </option>
                            <option value='Selasa'> Selasa </option>
                            <option value='Rabu'> Rabu </option>
                            <option value='Kamis'> Kamis </option>
                            <option value='Jumat'> Jumat </option>
                            <option value='Sabtu'> Sabtu </option>
                            <option value='Minggu'> Minggu </option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Latihan <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input id="tanggal" class="form-control" type="date" name="tanggal">
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