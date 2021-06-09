<div class="col-md-4"></div>
<div class="col-md-4">

  <center>
    <img src="<?php echo $this->M_Web->view('logo'); ?>" class="img-responsive" width="200" alt="">
    <b>Form Login</b>
  </center>
  <br>
  <div class="panel panel-info">
    <div class="panel-body">
      <?php $this->M_Pesan->get('msg'); ?>
      <form class="form-horizontal" action="" method="post" data-parsley-validate="true">
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;</span>
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="input-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
          </div>
        </div>
        <button type="submit" name="btnlogin" class="btn btn-primary" style="width:100%">Login</button>
      </form>
    </div>
    <div class="panel-footer">
      <a href="web/daftar.html">Belum punya akun? silahkan daftar disini!</a>
    </div>
  </div>

</div>
<div class="col-md-4"></div>
