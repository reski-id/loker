<?php $this->M_Pesan->get('msg'); ?>
<div class="col-md-3"></div>
<div class="col-md-6">
  <form class="form-horizontal" action="" method="post" data-parsley-validate="true">
    <div class="form-group">
      <div class="col-md-12">
        <label>Nama Perusahaan</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $query['nama']; ?>" required autofocus onfocus="this.value=this.value">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Email</label>
        <input type="email" name="email" id="harga" class="form-control" value="<?php echo $query['email']; ?>" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Telp</label>
        <input type="number" name="telp" class="form-control" value="<?php echo $query['telp']; ?>" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $query['alamat']; ?>" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Pendiri</label>
        <input type="text" name="pendiri" class="form-control" value="<?php echo $query['pendiri']; ?>" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" cols="80" required><?php echo $query['deskripsi']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php if($query['id_user']!=''){echo $this->M_User->get_field($query['id_user'])['username'];} ?>" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <label>Password</label>
        <input type="text" name="password" class="form-control" value="<?php if($query['id_user']!=''){echo $this->M_User->get_field($query['id_user'])['password'];} ?>" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <a href="perusahaan/v" class="btn btn-default"><i class="fa fa-angle-double-left"></i> </a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right">Simpan</button>
      </div>
    </div>
  </form>
</div>
<div class="col-md-3"></div>
