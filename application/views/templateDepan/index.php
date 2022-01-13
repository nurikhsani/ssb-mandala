<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/') ?>css/slg.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/carousel.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/features.css" rel="stylesheet">

    <script src="<?= base_url() ?>vendors/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/build/toastr.min.css">
    <script src="<?= base_url() ?>assets/toastr/build/toastr.min.js"></script>
    <title>Document</title>
</head>

<body class="pt-0">
    <?php $this->load->view('templateDepan/navbar'); ?>
    <main style="margin-top:0px">

        <?php $this->load->view('templateDepan/' . $file) ?>
    </main>
    <?php $this->load->view('templateDepan/footer'); ?>


    <script src="<?= base_url() ?>assets/bootstrap.bundle.min.js"></script>
</body>

</html>