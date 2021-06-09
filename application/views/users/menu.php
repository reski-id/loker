<?php
$url_1 = strtolower($this->uri->segment(1));
$url_2 = strtolower($this->uri->segment(2));
$url_3 = strtolower($this->uri->segment(3));
$level = $this->session->userdata('level');
?>
<style>
  .panel-collapse > ul > li{padding-left:20px;}
  .menu_active{background:#337ab7;color:#fff;}
  .submenu_active{background:#f1f1f1;color:#2196f3;}
</style>
<div id="navbar" class="panel panel-default collapse navbar-collapse" style="padding:0px;">
  <div class="panel-heading collapse navbar-collapse">
    <center>
      <?php if ($level=='admin'){ ?>
        <img src="<?php echo $this->M_Web->view('logo'); ?>" class="img-responsive img-circle" width="150" style="height:145px;" alt="">
      <?php }elseif ($level=='perusahaan'){ ?>
        <img src="<?php echo $this->M_Web->cek_file($this->M_User->view('logo'),'foto'); ?>" class="img-responsive img-circle" width="150" style="height:145px;" alt="">
      <?php }elseif ($level=='user'){ ?>
        <img src="<?php echo $this->M_Web->cek_file($this->M_User->view('foto'),'foto'); ?>" class="img-responsive img-circle" width="150" style="height:145px;" alt="">
      <?php } ?>
    </center>
    <br>
  </div>
  <div class="panel-body">
    <ul class="nav nav-pills nav-stacked">
      <li<?php if($url_1=='beranda' or $url_1=='users' AND $url_2==''){echo ' class="active"';}?>>
        <a href="beranda"><i class="fa fa-home"></i> Beranda</a>
      </li>
      <?php if ($level=='admin'): ?>
        <li<?php if($url_1=='perusahaan'){echo ' class="active"';}?>>
          <a href="perusahaan"><i class="fa fa-building"></i> Data Perusahaan</a>
        </li>
        <li<?php if($url_1=='pencari_kerja'){echo ' class="active"';}?>>
          <a href="pencari_kerja"><i class="fa fa-users"></i> Data Pencari Kerja</a>
        </li>
      <?php endif; ?>
      <?php if ($level!='admin'): ?>
        <li<?php if($url_1=='loker'){echo ' class="active"';}?>>
          <a href="loker.html"><i class="glyphicon glyphicon-briefcase"></i> Data Loker</a>
        </li>
      <?php endif; ?>
      <?php if ($level=='perusahaan'): ?>
        <li<?php if($url_1=='seleksi'){echo ' class="active"';}?>>
          <a href="seleksi.html"><i class="fa fa-clipboard"></i> Seleksi</a>
        </li>
      <?php endif; ?>
      <?php if ($level!='admin'): ?>
        <li<?php if($url_1=='penerimaan'){echo ' class="active"';}?>>
          <a href="penerimaan/v.html"><i class="fa fa-check"></i> Penerimaan</a>
        </li>
      <?php endif; ?>
      <?php if ($level=='admin'): ?>
      <li><hr style="margin:0px;"> </li>
      <li id="dropdown">
				<a data-toggle="collapse" href="#dropdown-lvl1-2" class="collapsed<?php if($url_1=='laporan'){echo ' menu_active';}?>" aria-expanded="false">
					<span class="fa fa-print"></span>  Laporan <span class="caret" style="float:right;margin-top:5px;"></span>
				</a>
				<div id="dropdown-lvl1-2" class="panel-collapse collapse" aria-expanded="false" style="height:0px;">
					<ul class="nav">
						<li<?php if($url_1=='laporan' AND $url_2=='perusahaan'){echo ' class="submenu_active"';}?>><a href="laporan/perusahaan.html"> Data Perusahaan </a></li>
						<li<?php if($url_1=='laporan' AND $url_2=='pencari_kerja'){echo ' class="submenu_active"';}?>><a href="laporan/pencari_kerja.html"> Data Pencari Kerja </a></li>
					</ul>
				</div>
			</li>
      <?php endif; ?>
      <li><hr style="margin:0px;"> </li>
      <li<?php if($url_1=='users' AND $url_2=='profile'){echo ' class="active"';}?>>
        <a href="users/profile"><i class="fa fa-user"></i> Profile</a>
      </li>
      <li<?php if($url_1=='users' AND $url_2=='ubah_pass'){echo ' class="active"';}?>>
        <a href="users/ubah_pass"><i class="fa fa-key"></i> Ubah Password</a>
      </li>
      <li><hr style="margin:0px;"> </li>
      <li>
        <a href="web/logout.html" onclick="return confirm('Anda Yakin?');"><i class="fa fa-sign-out"></i> Logout</a>
      </li>
    </ul>
  </div>
</div>
