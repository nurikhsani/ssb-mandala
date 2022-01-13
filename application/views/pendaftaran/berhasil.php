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
  <title>Document</title>
</head>
<div class="alert alert-info" role="alert">
  Pendaftaran Berhasil, silahkan transfer ke no rekening 12345678 & kirim bukti pembayaran ke <a href="https://wa.me/6289666051770?text=Silahkan%20kirim%20bukti%20transfer%20pembayaran%20dan%20formulir%20pendaftaran" target="_blank">WhatsApp Admin</a>
</div>
<a href="<?php echo base_url('pendaftaran/cetak/' . $id) ?>" target="_blank">Klik Di Sini Untuk mencetak bukti pendaftaran</a>