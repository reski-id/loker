<div class="col-md-3"></div>
<div class="col-md-6">

  <center>
    <img src="<?php echo $this->M_Web->cek_file($query['foto']); ?>" alt="" width="100" height="100">
  </center>
  <br>
  <table class="table table-bordered table-striped table-hover" width="100%">
    <tbody>
      <tr>
        <th width="120">Nama</th>
        <th width="1">:</th>
        <td><?php echo $query['nama']; ?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <th>:</th>
        <td><?php echo $query['jk']; ?></td>
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
        <th>Username</th>
        <th>:</th>
        <td><?php echo $this->M_User->get_field($query['id_user'])['username']; ?></td>
      </tr>
      <tr>
        <th>Password</th>
        <th>:</th>
        <td><?php echo $this->M_User->get_field($query['id_user'])['password']; ?></td>
      </tr>
      <tr>
        <th>Tanggal Terdaftar</th>
        <th>:</th>
        <td><?php echo $this->M_Web->tgl_id(date('d-m-Y H:i:s',strtotime($query['tgl_pencari_kerja']))); ?></td>
      </tr>
    </tbody>
  </table>

    <a href="pencari_kerja/v" class="btn btn-default" title="Kembali"><i class="fa fa-angle-double-left"></i> </a>
    <a href="pencari_kerja/v/h/<?php echo hashids_encrypt($query['id_user']); ?>" class="btn btn-danger" style="float:right" title="Hapus"><i class="fa fa-trash"></i> </a>

</div>
<div class="col-md-3"></div>
