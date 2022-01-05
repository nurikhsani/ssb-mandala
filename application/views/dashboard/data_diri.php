<div class="title_right">
    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
    </div>
</div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Diri</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 ">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view" src="<?= base_url('foto/' . tampilSession('foto')); ?>" width="100%" alt="Avatar" title="Change the avatar">
                        </div>
                    </div>
                    <h3><?= $col['nama_siswa']; ?></h3>

                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $col['alamat']; ?>
                        </li>
                        <li>
                            <i class="fa fa-circle"></i> Tanggal Lahir : <?= $col['tanggal_lahir']; ?>
                        </li>
                        <li>
                            <i class="fa fa-circle"></i> Posisi : <?= tampilSession('posisi') ?>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> <?= $col['no_hp']; ?>
                        </li>
                        <li>
                            <i class="fa fa-circle"></i> Tinggi Badan : <?= $col['tinggi_badan']; ?>
                        </li>
                        <li>
                            <i class="fa fa-circle"></i> Berat Badan : <?= $col['berat_badan']; ?>
                        </li>
                        <li>
                            <i class="fa fa-circle"></i> Usia : <?= $col['usia']; ?>
                        </li>
                    </ul>

                    <a class="btn btn-success" href="<?= base_url('dashboard/e_DataDiri/' . tampilSession('id_user')) ?>"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                    <a class="btn btn-success" href="<?= base_url('dashboard/cetak/' . tampilSession('id_user')) ?>"><i class="fa fa-print m-right-xs"></i> Cetak Kartu Anggota</a>
                    <br />
                </div>
                <div class="col-md-3 p-10">
                    <ul class="list-unstyled user_data">
                        <li>Tes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>