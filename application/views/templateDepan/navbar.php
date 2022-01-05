<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                gfnhfhnh
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <?php
                $sg = $this->uri->segment('2');
                ?>
                <li>
                    <a class="nav-link  <?= ($sg == 'posts') ? 'text-secondary' : 'text-white'; ?>" href="<?= base_url('Ssb') ?>">Beranda</a>
                </li>
                <li>
                    <a class="nav-link  <?= ($sg == 'profil') ? 'text-secondary' : 'text-white';; ?>" href="<?= base_url('Desa/profil') ?>">Profil</a>
                </li>
                <li>
                    <a class="nav-link  <?= ($sg == 'visimisi') ? 'text-secondary' : 'text-white'; ?>" href="<?= base_url('Desa/visimisi') ?>">Contact Us</a>
                </li>
                <li>
                    <a class="nav-link  <?= ($sg == 'potensi') ? 'text-secondary' : 'text-white'; ?>" href="<?= base_url('Desa/potensi') ?>">About Us</a>
                </li>
            </ul>
            <div class="text-end">
                <a href="<?= base_url('Auth'); ?>" type="button" class="btn btn-outline-light me-2">Login</a>
                <a href="<?= base_url('Pendaftaran'); ?>" type="button" class="btn btn-warning">Daftar</a>
            </div>
        </div>
    </div>
</header>