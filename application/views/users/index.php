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
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body style="background:#999;">

    <!-- Fixed navbar -->
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
            <li class="active"><a href="users/profile"><i class="fa fa-user"></i> <?php echo $this->M_User->view('nama_lengkap'); ?></a></li>
            <li><a href="web/logout.html" onclick="return confirm('Anda Yakin?');"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid" style="margin-top:70px;">
      <?php $this->M_Pesan->get('msg_beranda'); ?>
      <div class="col-md-3">
        <?php $this->load->view("users/menu"); ?>
      </div>
      <div class="col-md-9">
        <?php $this->load->view($content); ?>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><?php echo $this->M_Web->view('footer'); ?></p>
      </div>
    </footer>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/parsley.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/plugin/datetimepicker/jquery.datetimepicker.css"/>
    <script src="assets/plugin/datetimepicker/jquery.datetimepicker.js"></script>
    <script>
    $('#tgl_1').datetimepicker({
      lang:'en',
      timepicker:false,
      format:'d-m-Y'
    });
    $('#tgl_2').datetimepicker({
      lang:'en',
      timepicker:false,
      format:'d-m-Y'
    });
    </script>
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

    function formatRupiah(angka, prefix)
    {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
    }

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }

    function limit(element, max_chars)
    {
        if(element.value.length > max_chars) {
            element.value = element.value.substr(0, max_chars);
        }
    }

    function cek_angka(data)
    {
      x      = $('[name="'+data+'"]').val();
    	string = x.replace(/[^0-9]/g,'');
    	$('[name="'+data+'"]').val(string);
    }
    </script>
  </body>
</html>
