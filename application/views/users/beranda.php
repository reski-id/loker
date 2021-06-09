<?php $level = $this->session->userdata('level'); ?>
<div class="wrap">
<?php if ($level=='admin'): ?>
  <div class="col-md-6">
    <a href="perusahaan.html">
      <div class="box bg-blue">
        <div class="bg-icon"><i class="fa fa-building"></i></div>
        <label>Data Perusahaan</label>
      </div>
    </a>
  </div>

  <div class="col-md-6">
    <a href="pencari_kerja.html">
      <div class="box bg-cyan">
        <div class="bg-icon"><i class="fa fa-users"></i></div>
        <label>Data Pencari Kerja</label>
      </div>
    </a>
  </div>

  <div class="col-md-6">
    <a href="laporan/perusahaan.html">
      <div class="box bg-white">
        <div class="bg-icon"><i class="fa fa-print"></i></div>
        <label>Laporan Data Perusahaan</label>
      </div>
    </a>
  </div>

  <div class="col-md-6">
    <a href="laporan/pencari_kerja.html">
      <div class="box bg-white">
        <div class="bg-icon"><i class="fa fa-print"></i></div>
        <label>Laporan Data Pencari Kerja</label>
      </div>
    </a>
  </div>
<?php endif; ?>

<?php if ($level!='admin'): ?>
  <div class="col-md-6">
    <a href="loker.html">
      <div class="box bg-blue">
        <div class="bg-icon"><i class="glyphicon glyphicon-briefcase"></i></div>
        <label>Data Loker</label>
      </div>
    </a>
  </div>

  <?php if ($level=='perusahaan'): ?>
  <div class="col-md-6">
    <a href="seleksi.html">
      <div class="box bg-cyan">
        <div class="bg-icon"><i class="fa fa-clipboard"></i></div>
        <label>Seleksi</label>
      </div>
    </a>
  </div>
  <?php endif; ?>

  <div class="col-md-<?php if ($level=='perusahaan'){echo "12";}else{echo "6";} ?>">
    <a href="penerimaan/v.html">
      <div class="box bg-green">
        <div class="bg-icon"><i class="fa fa-check"></i></div>
        <label>Penerimaan</label>
      </div>
    </a>
  </div>

<?php endif; ?>

  <div class="col-md-4">
    <a href="users/profile">
      <div class="box bg-purple">
        <div class="bg-icon"><i class="fa fa-user"></i></div>
        <label>Profile</label>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="users/ubah_pass">
      <div class="box bg-yellow">
        <div class="bg-icon"><i class="fa fa-key"></i></div>
        <label>Ubah Password</label>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="web/logout" onclick="return confirm('Anda Yakin?');">
      <div class="box bg-black">
        <div class="bg-icon"><i class="fa fa-sign-out"></i></div>
        <label>Logout</label>
      </div>
    </a>
  </div>

</div>
