<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Astika Dharma Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.css">
  <!-- loader -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/loader/loader.css') ?>" />
  <!-- swicth toggle -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/toggle.css') ?>" />
  <!-- lottie player -->
  <script src="<?php echo base_url('assets/admin/build/js/lottie/LottiePlayer.js') ?>"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed text-sm"></body>
<div hidden class="loader"></div>
<p hidden id="base_url"><?php echo base_url() ?></p>

<div class="wrapper">



  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <lottie-player class="animation__shake" src="https://assets/admin9.lottiefiles.com/packages/lf20_x62chJ.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <h3 class="text-center">Memuat ...</h3>
  </div>



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="<?php echo base_url() ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <h4 class="brand-text font-weight-light">Astika Dharma - Admin</h4>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/user2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session['data']->username ?></a>
          <p id="id" hidden><?php echo $session['data']->id ?></p>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="<?php echo base_url('edit/add_picture') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Tambah Gambar
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('edit/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                List Gambar
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo base_url('edit/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>