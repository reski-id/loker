<?php $level = $this->session->userdata('level');
if ($level=='perusahaan') {
?>
<a href="loker/v/t" class="btn btn-primary">+ <?php echo $judul_web; ?></a>
<hr>
<?php } ?>
<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="20%">Judul</th>
      <th width="19%">Kategori Loker</th>
      <th width="40%">Keterangan</th>
      <th width="5%">Status</th>
      <th width="15%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach ($query->result() as $key => $value) {
      $stt=$value->status_loker; ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $value->judul; ?></td>
        <td><?php echo $value->loker; ?></td>
        <td><?php echo $value->ket_loker; ?></td>
        <td class="text-center">
          <?php if ($stt==1){ ?>
            <a class="btn btn-success btn-xs" title="Aktif"><i class="fa fa-check"></i></a>
          <?php }else{?>
            <a class="btn btn-danger btn-xs" title="Tidak Aktif"><i class="fa fa-close"></i></a>
          <?php } ?>
        </td>
        <td class="text-center">
          <?php if ($level=='user'): ?>
            <a href="loker/p/t/<?php echo hashids_encrypt($value->id_loker); ?>" class="btn btn-success btn-xs" title="Melamar Kerja"><i class="fa fa-pencil"></i></a>
          <?php endif; ?>
          <a href="loker/v/d/<?php echo hashids_encrypt($value->id_loker); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-list"></i></a>
          <?php if ($level=='perusahaan'): ?>
            <a href="loker/v/e/<?php echo hashids_encrypt($value->id_loker); ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
            <a href="loker/v/h/<?php echo hashids_encrypt($value->id_loker); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          <?php endif; ?>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
