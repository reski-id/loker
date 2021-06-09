<div class="panel panel-default">
  <div class="panel-heading">
    <b><i class="fa fa-user"></i> Profile</b>
  </div>
  <div class="panel-body">
    <?php $this->M_Pesan->get('msg');
    $level = $this->session->userdata('level');
    ?>

    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form class="form-horizontal" action="" method="post" data-parsley-validate="true" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-md-12">
            <label>Nama Lengkap</label>
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;</span>
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $this->M_User->view('nama_lengkap'); ?>" placeholder="Nama Lengkap" required autofocus onfocus="this.value=this.value">
            </div>
          </div>
        </div>
        <?php if ($level!='admin'): ?>
          <?php if ($level=='user'): ?>
            <div class="form-group">
              <div class="col-md-12">
                <label>Jenis Kelamin</label> <br>
                  <label>
                    <input type="radio" name="jk" class="" value="Laki-Laki" <?php if($this->M_User->view('jk')=="Laki-Laki"){echo "checked";} ?> required> Laki-Laki
                  </label>
                  <label>
                    <input type="radio" name="jk" class="" value="Perempuan" <?php if($this->M_User->view('jk')=="Perempuan"){echo "checked";} ?> required> Perempuan
                  </label>
              </div>
            </div>
          <?php endif; ?>
        <div class="form-group">
          <div class="col-md-12">
            <label>Email</label>
            <div class="input-group input-group">
              <span class="input-group-addon">@</span>
              <input type="email" name="email" class="form-control" value="<?php echo $this->M_User->view('email'); ?>" placeholder="Email" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Telephone</label>
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i>&nbsp;</span>
              <input type="number" name="telp" class="form-control" value="<?php echo $this->M_User->view('telp'); ?>" placeholder="Telp" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Alamat</label>
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i>&nbsp;</span>
              <input type="text" name="alamat" class="form-control" value="<?php echo $this->M_User->view('alamat'); ?>" placeholder="Alamat" required>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if ($level=='perusahaan'): ?>
          <div class="form-group">
            <div class="col-md-12">
              <label>Pendiri</label>
              <div class="input-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;</span>
                <input type="text" name="pendiri" class="form-control" value="<?php echo $this->M_User->view('pendiri'); ?>" placeholder="Pendiri" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label>Deskripsi</label>
              <div class="input-group input-group">
                <span class="input-group-addon"><i class="fa fa-folder"></i>&nbsp;</span>
                <textarea name="deskripsi" class="form-control" rows="4" cols="80" required><?php echo $this->M_User->view('deskripsi'); ?></textarea>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($level!='admin'): ?>
          <div class="form-group">
            <div class="col-md-12">
              <label>Gambar</label>
              <div class="input-group input-group">
                <span class="input-group-addon"><i class="fa fa-image"></i>&nbsp;</span>
                <input type="file" name="file" class="form-control">
              </div>
            </div>
          </div>
          <hr>
        <?php endif; ?>
        <div class="form-group">
          <div class="col-md-12">
            <label>Username</label>
            <div class="input-group input-group">
              <span class="input-group-addon"><b>@</b></span>
              <input type="text" name="username" class="form-control" value="<?php echo $this->M_User->view('username'); ?>" placeholder="Username" title="Username" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Level</label>
            <div class="input-group input-group">
              <span class="input-group-addon">&nbsp;<i class="fa fa-map-marker"></i>&nbsp;</span>
              <input type="text" name="level" class="form-control" value="<?php echo ucwords($this->M_User->view('level')); ?>" placeholder="Level" title="Level" readonly>
            </div>
          </div>
        </div>
        <button type="submit" name="btnsimpan" class="btn btn-primary" style="width:100%">Update</button>
      </form>
    </div>

  </div>
</div>
