<?php $this->M_Pesan->get('msg'); ?>
<div class="col-md-3"></div>
<div class="col-md-6">
  <form class="form-horizontal" action="" method="post" data-parsley-validate="true">
    <div class="form-group">
      <div class="col-md-12">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?php echo $query['judul']; ?>" placeholder="Judul" title="Judul" required autofocus onfocus="this.value=this.value">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Kategori</label>
        <input type="text" name="loker" class="form-control" value="<?php echo $query['loker']; ?>" placeholder="Kategori Lowongan Kerja" title="Kategori Lowongan Kerja" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Keterangan</label>
        <textarea name="ket_loker" class="form-control" rows="3" cols="80" placeholder="Keterangan" required><?php echo $query['ket_loker']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Status</label>
        <?php echo $this->M_Select->status_loker($query['status_loker'],'required'); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <a href="loker/v" class="btn btn-default"><i class="fa fa-angle-double-left"></i> </a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right">Simpan</button>
      </div>
    </div>
  </form>
</div>
<div class="col-md-3"></div>
