<div class="container">
    <div class="row my-3">
        <div class="card col-md-8">
            <div class="card-body">

                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?= base_url('foto kegiatan/' . $col['foto_kegiatan']) ?>" alt="<?= $col['nama_kegiatan'] ?>" class="img-fluid mt-3">
                </div>


                <table class="table mt-4">
                    <tr>
                        <td>Nama Kegiatan</td>
                        <td>: <?= $col['nama_kegiatan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kegiatan</td>
                        <td>: <?= $col['tanggal'] ?></td>
                    </tr>
                </table>
                <article class="my-3 fs-6" style="text-align:justify;">
                    <?= $col['deskripsi'] ?>
                </article>
                <div class="text-muted text-right border-top">
                    Dibuat pada : <?= $col['tgl_upload'] ?></br>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <img src="<?= base_url('foto kegiatan/' . $col['foto_kegiatan']) ?>" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>