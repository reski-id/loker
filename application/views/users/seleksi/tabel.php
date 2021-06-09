<?php $level = $this->session->userdata('level'); ?>

<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="20%">Judul</th>
      <th width="19%">Kategori Loker</th>
      <th width="35%">Keterangan</th>
      <th width="5%">Status</th>
      <th width="12%">Dikirim</th>
      <th width="8%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach ($query->result() as $key => $value) {
      $stt=$value->status; ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $value->judul; ?></td>
        <td><?php echo $value->loker; ?></td>
        <td><?php echo $value->ket_daftar_loker; ?></td>
        <td class="text-center">
          <?php if ($stt==2){ ?>
            <a class="btn btn-success btn-xs" title="Diterima"><i class="fa fa-check"></i></a>
          <?php }elseif ($stt==1){ ?>
            <a class="btn btn-danger btn-xs" title="Tidak Diterima"><i class="fa fa-close"></i></a>
          <?php }else{?>
            <a class="btn btn-warning btn-xs" title="Proses . . ."><i class="fa fa-clock-o"></i></a>
          <?php } ?>
        </td>
        <td><?php echo date('d-m-Y H:i:s',strtotime($value->tgl_daftar_loker)); ?></td>
        <td class="text-center">
          <a href="penerimaan/v/d/<?php echo hashids_encrypt($value->id_daftar_loker); ?>" class="btn btn-info btn-xs" title="Detail" style="margin-bottom:5px;"><i class="fa fa-list"></i></a>
          <br>
          <a href="seleksi/v/2/<?php echo hashids_encrypt($value->id_daftar_loker); ?>" class="btn btn-success btn-xs" title="Diterima" onclick="return confirm('Anda Yakin?');"><i class="fa fa-check"></i></a>
          <a href="seleksi/v/1/<?php echo hashids_encrypt($value->id_daftar_loker); ?>" class="btn btn-danger btn-xs" title="Tidak Diterima" onclick="return confirm('Anda Yakin?');"><i class="fa fa-close"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
