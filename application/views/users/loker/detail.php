<div class="col-md-3"></div>
<div class="col-md-6">

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
        <th>Status</th>
        <th>:</th>
        <td> <?php $stt=$query['status_loker']; ?>
          <?php if ($stt==1){ ?>
            <a class="btn btn-success btn-xs" title="Aktif"><i class="fa fa-check"></i> Aktif</a>
          <?php }else{?>
            <a class="btn btn-danger btn-xs" title="Tidak Aktif"><i class="fa fa-close"></i> Tidak Aktif</a>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <th>Tgl. Input</th>
        <th>:</th>
        <td><?php echo date('d-m-Y H:i:s',strtotime($query['tgl_loker'])); ?></td>
      </tr>
    </tbody>
  </table>

    <a href="loker/v" class="btn btn-default" title="Kembali"><i class="fa fa-angle-double-left"></i> </a>
    <?php if ($this->session->userdata('level')=='perusahaan'): ?>
      <a href="loker/v/e/<?php echo hashids_encrypt($query['id_loker']); ?>" class="btn btn-success" style="float:right" title="Edit"><i class="fa fa-pencil"></i> </a>
    <?php endif; ?>

</div>
<div class="col-md-3"></div>
