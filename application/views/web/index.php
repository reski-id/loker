<?php
$sesi  = $this->session->userdata('id_user');
$url_1 = strtolower($this->uri->segment(1));
$url_2 = strtolower($this->uri->segment(2));
$url_3 = strtolower($this->uri->segment(3));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $this->M_Web->view('deskripsi'); ?>">
    <meta name="keywords" content="<?php echo $this->M_Web->view('keyword'); ?>">
    <meta name="author" content="<?php echo $this->M_Web->view('autor'); ?>">
    <title><?= $judul_web; ?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="icon" href="<?php echo $this->M_Web->view('favicon'); ?>">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet">
    <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/parsley.min.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body style="background:#f1f1f1;">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">
            <img src="<?php echo $this->M_Web->view('logo'); ?>" width="30" alt="" style="margin-top:-5px;">
            <div style="margin-top:-25px;margin-left:40px;"><?php echo $this->M_Web->view('nama_app'); ?></div>
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li<?php if($url_1==''||$url_1=='web'&&$url_2==''){echo ' class="active"';}?>><a href=""><i class="fa fa-desktop"></i> Beranda</a></li>
            <li<?php if($url_1=='loker'){echo ' class="active"';}?>><a href="loker/p"><i class="fa fa-clipboard"></i> Lowongan Kerja</a></li>
            <li<?php if($url_1=='perusahaan'){echo ' class="active"';}?>><a href="perusahaan/p"><i class="fa fa-building"></i> Perusahaan</a></li>
            <?php if ($sesi==''){ ?>
              <li<?php if($url_1=='web'&&$url_2=='login'){echo ' class="active"';}?>><a href="web/login.html"><i class="fa fa-sign-in"></i> Login</a></li>
            <?php }else{ ?>
              <li><a href="beranda"><i class="fa fa-user"></i> <?php echo $this->M_User->view('nama_lengkap'); ?></a></li>
              <li><a href="web/logout.html" onclick="return confirm('Anda Yakin?');"><i class="fa fa-sign-out"></i> Logout</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <?php if ($url_1==''||$url_1=='web'&&$url_2==''): ?>
      <?php $this->load->view('web/slide'); ?>
    <?php endif; ?>
    <div class="container">
      <?php $this->load->view($content); ?>
    </div>

    <center><?php echo $this->M_Web->view('footer'); ?></center>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/parsley.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.default-select2').select2();
    });

    $(document).ready( function() {
      $( '#data_tables' ).dataTable( {
        "bDestroy": true,
        "aLengthMenu": [[10, 30, 50, 100, -1], [10, 30, 50, 100, "All"]],
        "iDisplayLength": 10,
        "columnDefs": [ {
          "targets": [0],
          "orderable": false,
          }],
        "order": []
      } );
    } );
    </script>
  </body>
</html>
