 <?php
    foreach ($tampil as $t) { ?>
     <div class="col-md-4 col-sm-4 ">
         <div class="x_panel tile fixed_height_320">
             <div class="x_title">
                 <h2><?= $t['hari']; ?></h2>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">
                 <table border="0">
                     <tr>
                         <td>
                             <h2>Pelatih</h2>
                         </td>
                         <td>
                             <h2> : <?= $t['pelatih']; ?></h2>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <h2>Kelompok Usia</h2>
                         </td>
                         <td>
                             <h2> : <a href="<?= base_url('Dashboard/KelompokSiswa/' . tampilSession('usia')) ?>"><?= $t['kelompok_usia']; ?></h2>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <h2>Lokasi Latihan</h2>
                         </td>
                         <td>
                             <h2> : <?= $t['tempat']; ?></h2>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <h2>Waktu Latihan</h2>
                         </td>
                         <td>
                             <h2> : <?= $t['waktu_mulai'] . ' - ' . $t['waktu_selesai']; ?></h2>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <h2>Pelatih Kiper</h2>
                         </td>
                         <td>
                             <h2> : <?= $t['pelatih_gk']; ?></h2>
                         </td>
                     </tr>
                 </table>
             </div>
         </div>
     </div>
 <?php } ?>