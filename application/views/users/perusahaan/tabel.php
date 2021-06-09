<a href="perusahaan/v/t" class="btn btn-primary">+ <?php echo $judul_web; ?></a>
<hr>
<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="10%">Logo</th>
      <th width="40%">Nama Perusahaan</th>
      <th width="19%">Email</th>
      <th width="15%">Telp</th>
      <th width="15%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach ($query->result() as $key => $value) {?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-center"><img src="<?php echo $this->M_Web->cek_file($value->logo); ?>" alt="" width="50" height="50"></td>
        <td><?php echo $value->nama; ?></td>
        <td><?php echo $value->email; ?></td>
        <td><?php echo $value->telp; ?></td>
        <td class="text-center">
          <a href="perusahaan/v/d/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-list"></i></a>
          <a href="perusahaan/v/e/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
          <a href="perusahaan/v/h/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
