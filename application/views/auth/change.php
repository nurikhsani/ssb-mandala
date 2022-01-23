<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?= $title ?> </title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <script src="<?= base_url() ?>vendors/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/build/toastr.min.css">
    <script src="<?= base_url() ?>assets/toastr/build/toastr.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>/build/css/custom.min.css" rel="stylesheet">


</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <h5><?= $this->session->flashdata('reset_email'); ?></h5>
                    <form method="POST" action="<?= base_url('Auth/changePassword') ?>">
                        <h1>Ubah Password</h1>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="masukan password baru" />
                            <?= form_error('password', ' <p class="text-danger">', ' </p>') ?>
                            <input type="password" class="form-control" name="confirm" placeholder="konfirmasi password" />
                            <?= form_error('confirm', ' <p class="text-danger">', ' </p>') ?>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Ubah Password</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['notifikasi'])) { ?>
        <script type="text/javascript">
            toastr.options.closeButton = true;
            toastr.<?= $_SESSION['warna'] ?>('<?= $_SESSION['judul'] ?>', '<?= $_SESSION['pesan'] ?>');
        </script>
    <?php } ?>

</body>

</html>