 <?php
    foreach ($tampil as $t) { ?>
     <div class="col-md-4 col-sm-4 ">
         <div class="x_panel tile fixed_height_320">
             <div class="x_title">
                 <h2><?= $t['hari']; ?></h2>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">
                 <h2><?= $t['pelatih']; ?></h2>
                 <h2><a href="<?= base_url('Dashboard/KelompokSiswa/' . tampilSession('usia')) ?>"><?= $t['kelompok_usia']; ?></a></h2>
                 <h2><?= $t['tempat']; ?></h2>
                 <h2><?= $t['waktu_mulai'] . ' - ' . $t['waktu_selesai']; ?></h2>
                 <h2><?= $t['pelatih_gk']; ?></h2>


             </div>
         </div>
     </div>
 <?php } ?>