<div class="container">
    <div class="row my-3">
        <div class="card col-md-8">
            <div class="card-body">

                <div style="max-height: 500px; overflow:hidden;">
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
                    Posted by : <?= $col['nama_admin'] ?></br>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <h4>Kegiatan Terbaru</h4>
                <?php foreach ($kegiatan as $t) { ?>
                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?= base_url("foto kegiatan/" . $t['foto_kegiatan']) ?>');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                                    <a href="<?= base_url("Ssb/show_post/" . $t['id_kegiatan']) ?>" class="text-decoration-none text-white">
                                        <?= $t['nama_kegiatan'] ?>
                                    </a>
                                </h2>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto">
                                        <!-- <img src="#" alt="#" width="32" height="32" class="rounded-circle border border-white"> -->
                                    </li>
                                    <li class="d-flex align-items-center me-3">
                                        <svg class="bi me-2" width="1em" height="1em">
                                            <use xlink:href="#geo-fill" />
                                        </svg>
                                        <small><?= $t['tanggal'] ?></small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </br>
                <?php } ?>
            </div>
        </div>
    </div>