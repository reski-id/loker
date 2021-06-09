<?php $baris = $query->row(); ?>
<div class="col-md-2"></div>
<div class="col-md-8">
  <center>
    <?php
    $data_loker = $this->M_Loker->get($baris->id_loker)->row();
    $d_p=$this->M_Perusahaan->get_field($data_loker->id_perusahaan); ?>
    <img src="<?php echo $this->M_Web->cek_file($d_p['logo']); ?>" alt="" width="150">
    <hr style="margin:5px;">
    <b><?php echo $d_p['nama']; ?></b>
  </center>
  <table class="table table-bordered table-striped table-hover" width="100%">
    <tbody>
      <tr>
        <th width="150">Judul</th>
        <th width="1">:</th>
        <td><?php echo $baris->judul; ?></td>
      </tr>
      <tr>
        <th>Kategori</th>
        <th>:</th>
        <td><?php echo $baris->loker; ?></td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <th>:</th>
        <td><?php echo $baris->ket_loker; ?></td>
      </tr>
      <tr>
        <th>Tgl. Lowongan Kerja</th>
        <th>:</th>
        <td><?php echo date('d-m-Y H:i:s',strtotime($baris->tgl_loker)); ?></td>
      </tr>
    </tbody>
  </table>
  <hr>
  <center>
    <?php
    $d_u=$this->M_Pencari_kerja->get_field($baris->id_user); ?>
    <img src="<?php echo $this->M_Web->cek_file($d_u['foto'],'foto'); ?>" alt="" width="150">
    <br>
    <b>BIODATA PELAMAR</b>
  </center>
  <table class="table table-bordered table-striped table-hover" width="100%">
    <tbody>
      <tr>
        <th width="150">Nama</th>
        <th width="1">:</th>
        <td><?php echo $baris->nama; ?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <th>:</th>
        <td><?php echo $baris->jk; ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <th>:</th>
        <td><?php echo $baris->email; ?></td>
      </tr>
      <tr>
        <th>Telp/HP</th>
        <th>:</th>
        <td><?php echo $baris->telp; ?></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <th>:</th>
        <td><?php echo $baris->alamat; ?></td>
      </tr>
      <tr>
        <th>File CV</th>
        <th>:</th>
        <td>
          <a href="<?php echo $baris->file_cv; ?>" target="_blank"><?php echo $baris->file_cv; ?></a>
        </td>
      </tr>
      <tr>
        <th>Keterangan Mendaftar</th>
        <th>:</th>
        <td><?php echo $baris->ket_daftar_loker; ?></td>
      </tr>
      <tr>
        <th>Status Penerimaan</th>
        <th>:</th>
        <td> <?php $stt=$baris->status; ?>
          <?php if ($stt==2){ ?>
            <a class="btn btn-success btn-xs" title="Diterima"><i class="fa fa-check"></i> Diterima</a>
          <?php }elseif ($stt==1){ ?>
            <a class="btn btn-danger btn-xs" title="Tidak Diterima"><i class="fa fa-close"></i> Tidak Diterima</a>
          <?php }else{?>
            <a class="btn btn-warning btn-xs" title="Proses . . ."><i class="fa fa-clock-o"></i> Proses . . .</a>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <th>Tgl. Dikirim</th>
        <th>:</th>
        <td><?php echo date('d-m-Y H:i:s',strtotime($baris->tgl_daftar_loker)); ?></td>
      </tr>
    </tbody>
  </table>

    <a href="javascript:window.history.back();" class="btn btn-default" title="Kembali"><i class="fa fa-angle-double-left"></i> </a>


</div>
<div class="col-md-3"></div>
