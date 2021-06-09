<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="20%">Judul</th>
      <th width="19%">Kategori Loker</th>
      <th width="38%">Keterangan</th>
      <th width="15%">Tanggal Posting</th>
      <th width="7%">Opsi</th>
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
        <td>
          <?php echo date('d-m-Y H:i:s',strtotime($value->tgl_loker)); ?>
        </td>
        <td class="text-center">
          <a href="loker/p/t/<?php echo hashids_encrypt($value->id_loker); ?>" class="btn btn-success btn-xs" title="Melamar Kerja"><i class="fa fa-pencil"></i></a>
          <a href="loker/p/d/<?php echo hashids_encrypt($value->id_loker); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-list"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
