<?php $this->M_Pesan->get('msg'); ?>
<table id="data_tables" class="table table-bordered table-striped table-hover" width="100%">
  <thead>
    <tr>
      <th width="1%">No.</th>
      <th width="10%">Logo</th>
      <th width="50%">Nama Perusahaan</th>
      <th width="19%">Email</th>
      <th width="15%">Telp</th>
      <th width="5%">Opsi</th>
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
          <a href="perusahaan/p/d/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-list"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
