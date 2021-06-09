<?php
$sesi  = $this->session->userdata('id_user');
$url_1 = strtolower($this->uri->segment(1));
$url_2 = strtolower($this->uri->segment(2));
$url_3 = strtolower($this->uri->segment(3));
?>
<div class="row" style="margin-top:-30px;">

  <div class="col-md-3">
    <a href="loker/p.html">
      <div class="panel panel-info">
        <div class="panel-body text-center">
          <i class="fa fa-clipboard" style="font-size:100px;"></i>
        </div>
        <div class="panel-heading text-center">
          <b>Lowongan Kerja</b>
        </div>
      </div>
    </a>
  </div>

  <div class="col-md-3">
    <a href="perusahaan/p.html">
      <div class="panel panel-success">
        <div class="panel-body text-center">
          <i class="fa fa-building" style="font-size:100px;"></i>
        </div>
        <div class="panel-heading text-center">
          <b>Perusahaan</b>
        </div>
      </div>
    </a>
  </div>

  <div class="col-md-3">
    <a href="web/daftar.html">
      <div class="panel panel-warning">
        <div class="panel-body text-center">
          <i class="fa fa-user" style="font-size:100px;"></i>
        </div>
        <div class="panel-heading text-center">
          <b>Pendaftaran</b>
        </div>
      </div>
    </a>
  </div>

  <div class="col-md-3">
    <a href="web/<?php if($sesi==''){echo "login";}else{echo "logout";} ?>.html">
      <div class="panel panel-danger">
        <div class="panel-body text-center">
          <i class="fa fa-sign-<?php if($sesi==''){echo "in";}else{echo "out";} ?>" style="font-size:100px;"></i>
        </div>
        <div class="panel-heading text-center">
          <b><?php if($sesi==''){echo "Login";}else{echo "Logout";} ?></b>
        </div>
      </div>
    </a>
  </div>

</div>

<br>
