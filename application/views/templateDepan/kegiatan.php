<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom"> <?= $title; ?></h2>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">

        <?php foreach ($kegiatan as $t) { ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?= base_url("foto kegiatan/" . $t['foto_kegiatan']) ?>');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <a href="<?= base_url("Ssb/show_kegiatan/" . $t['id_kegiatan']) ?>" class="text-decoration-none text-white">
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

        <?php } ?>

    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <?= $pagination; ?>
        </div>

    </div>
</div>