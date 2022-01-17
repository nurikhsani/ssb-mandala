<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $judul ?> </title>

  <!-- jQuery -->
  <script src="<?= base_url() ?>vendors/jquery/dist/jquery.min.js"></script>



  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="<?= base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Datatables -->

  <link href="<?= base_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url() ?>build/css/custom.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/build/toastr.min.css">
  <script src="<?= base_url() ?>assets/toastr/build/toastr.min.js"></script>

  <!-- trix -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/trix/trix.css">
  <script type="text/javascript" src="<?= base_url() ?>assets/trix/trix.js"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href='<?= base_url() ?>Home/index' class="site_title"><i class="fa fa-soccer-ball-o"></i> <span>SSB MANDALA</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('foto/' . tampilSession('foto')); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?= tampilSession('nama'); ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <?php
                if (tampilSession('role_id') == '1') : ?>
                  <li><a href='<?= base_url() ?>Home/index'><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-table"></i>Data Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href='<?= base_url('siswa/index') ?>'>Sudah Bayar</a></li>
                      <li><a href="<?= base_url('siswa/belum_bayar'); ?>">Belum Bayar</a></li>
                    </ul>
                  </li>
                  <li><a href='<?= base_url() ?>pelatih/index'><i class="fa fa-table"></i>Data Pelatih</a>
                  </li>
                  <li><a href='<?= base_url() ?>jadwal/index'><i class="fa fa-table"></i> Jadwal Latihan </a>
                  </li>
                  <li><a href='<?= base_url() ?>kegiatan/index'><i class="fa fa-table"></i> Data Kegiatan </a>
                  </li>
                  <li><a href='<?= base_url() ?>nilai/index'><i class="fa fa-table"></i> Data Nilai </a>
                  </li>
                <?php endif;

                if (tampilSession('role_id') == '2') : ?>
                  <li><a href='<?= base_url() ?>Home/index'><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href='<?= base_url() ?>dashboard/JadwalLatihan'><i class="fa fa-table"></i> Jadwal Latihan </a>
                  </li>
                  <li><a href='<?= base_url() ?>dashboard/DataDiri'><i class="fa fa-table"></i> Data Diri </a>
                  </li>
                  <li><a href='<?= base_url() ?>dashboard/nilai'><i class="fa fa-table"></i> Data Nilai </a>
                  </li>
                  <li><a href='<?= base_url() ?>dashboard/ubah_password'><i class="fa fa-table"></i> Ubah Password </a>
                  </li>

                <?php endif; ?>
                <li><a href='<?= base_url() ?>jadwal/index'><i class="fa fa-table"></i> Lihat Situs </a>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small" style="display: none;">
            <a data-toggle=" tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('foto/' . tampilSession('foto')); ?>" alt=""><?= tampilSession('nama'); ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>


              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-lg-12">



            </div>

          </div>
          <div class="row mt-3">