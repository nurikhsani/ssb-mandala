<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url() ?>assets/bootstrap.min.css" rel="stylesheet">

    <title><?php echo $judul; ?></title>
    <script src="<?php echo base_url() ?>assets/jquery.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SSB MANDALA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url() ?>">Home</a>
                    <a class="nav-link" aria-current="page" href="<?php echo base_url() ?>pendaftaran">Pendaftaran</a>
                    <a class="nav-link" href="<?php echo base_url() ?>mahasiswa">Siswa</a>
                    <a class="nav-link" href="<?php echo base_url() ?>pelatih">Pelatih</a>
                    <a class="nav-link" href="<?php echo base_url() ?>jadwal">Jadwal Latihan</a>
                </div>
            </div>
        </div>
    </nav>