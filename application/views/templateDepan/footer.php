<footer>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12">
                <p>&copy; copyright 2021 | build with by. Ikhsan
                <p>SEKOLAH SEPAK BOLA MANDALA MAJALENGKA</p>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['notifikasi'])) { ?>
        <script type="text/javascript">
            toastr.options.closeButton = true;
            toastr.<?= $_SESSION['warna'] ?>('<?= $_SESSION['judul'] ?>', '<?= $_SESSION['pesan'] ?>');
        </script>
    <?php } ?>
</footer>