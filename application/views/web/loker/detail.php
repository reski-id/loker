<div class="col-md-3"></div>
<div class="col-md-6">
  <center>
    <?php $d_p=$this->M_Perusahaan->get_field($query['id_perusahaan']); ?>
    <img src="<?php echo $this->M_Web->cek_file($d_p['logo']); ?>" alt="" width="150">
    <hr style="margin:5px;">
    <b><?php echo $d_p['nama']; ?></b>
  </center>
  <br>
  <table class="table table-bordered table-striped table-hover" width="100%">
    <tbody>
      <tr>
        <th width="120">Judul</th>
        <th width="1">:</th>
        <td><?php echo $query['judul']; ?></td>
      </tr>
      <tr>
        <th>Kategori</th>
        <th>:</th>
        <td><?php echo $query['loker']; ?></td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <th>:</th>
        <td><?php echo $query['ket_loker']; ?></td>
      </tr>
      <tr>
        <th>Tgl. Input</th>
        <th>:</th>
        <td><?php echo date('d-m-Y H:i:s',strtotime($query['tgl_loker'])); ?></td>
      </tr>
    </tbody>
  </table>

    <a href="loker/p" class="btn btn-default" title="Kembali"><i class="fa fa-angle-double-left"></i> </a>
    <a href="loker/p/t/<?php echo hashids_encrypt($query['id_loker']); ?>" class="btn btn-success" style="float:right" title="Melamar Kerja"><i class="fa fa-pencil"></i> Melamar Kerja Sekarang</a>

</div>
<div class="col-md-3"></div>
