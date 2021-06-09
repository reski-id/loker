<div class="panel panel-default">
  <div class="panel-heading">
    <b><i class="fa fa-key"></i> Ubah Password</b>
  </div>
  <div class="panel-body">
    <?php $this->M_Pesan->get('msg'); ?>

    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form class="form-horizontal" action="" method="post" data-parsley-validate="true">
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password1" class="form-control" value="" placeholder="Password Lama" title="Password Lama" required autofocus>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password2" class="form-control" value="" placeholder="Password Baru" title="Password Baru" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password3" class="form-control" value="" placeholder="Konfirmasi Password Baru" title="Konfirmasi Password Baru" required>
            </div>
          </div>
        </div>
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="width:100%">Update</button>
      </form>
    </div>

  </div>
</div>
