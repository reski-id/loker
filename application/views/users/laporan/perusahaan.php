<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="icon" type="image/png" href="<?php echo $this->M_Web->view('favicon'); ?>"/>
    <link rel="stylesheet" href="assets/css/style_print.css">
    <style type="text/css" media="print">
      @page { size: landscape; }
    </style>
  </head>
  <body onload="window.print();">

    <center>
      <h2 style="margin-bottom:5px;"><?php echo strtoupper($judul_web); ?></h2>
      <b><?php echo $tgl; ?></b>
    </center>

    <br>

    <table class="table table-bordered table-striped" width="100%">
      <thead>
        <tr>
          <th width="1%">No.</th>
          <th width="19%">Nama Perusahaan</th>
          <th width="12%">Email</th>
          <th width="10%">Telp.</th>
          <th width="22%">Alamat</th>
          <th width="18%">Pendiri</th>
          <th width="25%">Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($query->result() as $key => $value) {?>
          <tr>
            <td align="center"><b><?php echo $no++; ?></b> </td>
            <td><?php echo $value->nama; ?></td>
            <td><?php echo $value->email; ?></td>
            <td><?php echo $value->telp; ?></td>
            <td><?php echo $value->alamat; ?></td>
            <td><?php echo $value->pendiri; ?></td>
            <td><?php echo $value->deskripsi; ?></td>
          </tr>
        <?php
        } ?>
      </tbody>
    </table>

  </body>
</html>
