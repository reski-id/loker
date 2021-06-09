<div class="col-md-3"></div>
<div class="col-md-6">
  <center>
    <?php $d_p=$this->M_Perusahaan->get_field($query['id_perusahaan']); ?>
    <img src="<?php echo $this->M_Web->cek_file($d_p['logo']); ?>" alt="" width="150">
    <hr style="margin:5px;">
    <b><?php echo $d_p['nama']; ?></b>
    <p><?php echo $query['judul']; ?></p>
    <hr style="margin:5px;">
  </center>
  <br>
  <?php $this->M_Pesan->get('msg'); ?>
  <form class="form-horizontal" action="" method="post" data-parsley-validate="true" enctype="multipart/form-data">
    <div class="form-group">
      <div class="col-md-12">
        <label>File CV Anda</label>
        <input type="file" name="file" class="form-control" value="" required autofocus onfocus="this.value=this.value">
        <small style="color:red">*pdf, xls, xlsx, doc, docx</small>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Keterangan</label>
        <textarea name="ket_daftar_loker" class="form-control" rows="3" cols="80" placeholder="Skill, Pengalaman dll" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <a href="javascript:window.history.back();" class="btn btn-default" title="Kembali"><i class="fa fa-angle-double-left"></i> </a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="btnkirim" class="btn btn-primary" style="float:right">Kirim</button>
      </div>
    </div>
  </form>

</div>
<div class="col-md-3"></div>
