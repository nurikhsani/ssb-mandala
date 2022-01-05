    <!-- top tiles -->
    <?php
    if (tampilSession('role_id') == '1') : ?>
        <div class="row" style="display: inline-block;">
            <div class="tile_count">
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
                    <?php $jumlah = $this->db->query('SELECT COUNT(id_siswa) as jml FROM tabel_siswa WHERE sudah_bayar = 1')->row_array(); ?>
                    <div class="count"><?= $jumlah['jml']; ?></div>
                    <span class="count_bottom"> SSB MANDALA</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Pelatih </span>
                    <?php $jumlah = $this->db->query('SELECT COUNT(id_pelatih) as jml FROM tabel_pelatih')->row_array(); ?>
                    <div class="count"><?= $jumlah['jml']; ?></div>
                    <span class="count_bottom"> SSB MANDALA</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
                    <div class="count green">2,500</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                    <div class="count">4,567</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                    <div class="count">2,315</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320">
            <div class="x_title">
                <h2>Selamat Datang</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h2>Sistem Informasi Manajemen</h2>
                <h2>Sekolah Sepak Bola Mandala Majalengka</h2>
                <h6>Alamat SSB</h6>

            </div>
        </div>
    </div>

    <!-- /top tiles -->