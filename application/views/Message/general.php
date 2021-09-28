<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QRTaxi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- lottie player -->
  <script src="<?php echo base_url('assets/admin/build/js/lottie/LottiePlayer.js') ?>"></script>
</head>
<body class="hold-transition login-page">



<div class="row">
  <?php if($status){ ?>
    <lottie-player class="col-12 text-center" src="<?php echo base_url('assets/admin/build/js/lottie/success.json') ?>"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
  <?php }else{ ?>
    <lottie-player class="col-12 text-center" src="<?php echo base_url('assets/admin/build/js/lottie/failed.json') ?>"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
  <?php } ?>
  <h3 class="text-center col-12"><?php echo $title ?></h3>
  <div class="col-12 text-center d-flex justify-content-center">
     <h5 class="font-weight-bold col-12 col-md-6"><?php echo $message ?></h5>
  </div>
  <div class="col-12 text-center">
    <a class="btn btn-primary col-6" href="<?php echo $link_redirect ?>"><?php echo $button_text ?></a>
  </div>
</div>
<!-- /.register-box -->



<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/build/js/admin/SweetAlertOffline.js"></script>
<script src="<?php echo base_url() ?>assets/admin/build/js/admin/Jquery3Offline.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/admin/build/js/admin/AdminLogin.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
