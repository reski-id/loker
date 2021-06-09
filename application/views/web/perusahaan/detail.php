<div class="col-md-3"></div>
<div class="col-md-6">

  <center>
    <img src="<?php echo $this->M_Web->cek_file($query['logo']); ?>" alt="" width="100" height="100">
  </center>
  <br>
  <table class="table table-bordered table-striped table-hover" width="100%">
    <tbody>
      <tr>
        <th width="120">Nama&nbsp;Perusahaan</th>
        <th width="1">:</th>
        <td><?php echo $query['nama']; ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <th>:</th>
        <td><?php echo $query['email']; ?></td>
      </tr>
      <tr>
        <th>Telp.</th>
        <th>:</th>
        <td><?php echo $query['telp']; ?></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <th>:</th>
        <td><?php echo $query['alamat']; ?></td>
      </tr>
      <tr>
        <th>Pendiri</th>
        <th>:</th>
        <td><?php echo $query['pendiri']; ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <th>:</th>
        <td><?php echo $query['deskripsi']; ?></td>
      </tr>
      <tr>
        <th>Username</th>
        <th>:</th>
        <td><?php echo $this->M_User->get_field($query['id_user'])['username']; ?></td>
      </tr>
      <tr>
        <th>Password</th>
        <th>:</th>
        <td><?php echo $this->M_User->get_field($query['id_user'])['password']; ?></td>
      </tr>
    </tbody>
  </table>

    <a href="perusahaan/p" class="btn btn-default" title="Kembali"><i class="fa fa-angle-double-left"></i> </a>
    
</div>
<div class="col-md-3"></div>
