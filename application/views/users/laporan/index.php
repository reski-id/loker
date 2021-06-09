
<div class="panel panel-default">
  <div class="panel-heading">
    <b><i class="fa fa-print"></i> <?php echo strtoupper($judul_web); ?></b>
  </div>
  <div class="panel-body">

    <div class="col-md-3"></div>
    <div class="col-md-6">
      <br>
      <form action="javascript:;" method="post" data-parsley-validate="true">
          <div class="col-md-6">
            <label>Dari Tanggal</label>
            <input type="text" name="tgl_1" id="tgl_1" class="form-control" value="<?php echo date('01-m-Y'); ?>" required maxlength="10">
          </div>
          <div class="col-md-6">
            <label>Sampai Tanggal</label>
            <input type="text" name="tgl_2" id="tgl_2" class="form-control" value="<?php echo date('t-m-Y'); ?>" required maxlength="10">
          </div>
          <div class="col-md-12">
            <button onclick="return cetak();" class="btn btn-primary" style="width:100%;margin-top:10px;"><i class="fa fa-print"></i> Cetak</button>
            <br><br><br>
          </div>
      </form>
    </div>
    <div class="col-md-3"></div>

  </div>
</div>

<script type="text/javascript">
  function cetak()
  {
    tgl_1 = $('#tgl_1').val();
    tgl_2 = $('#tgl_2').val();
    window.open('laporan/<?php echo $aksi; ?>/'+tgl_1+'/'+tgl_2,'_blank');
  }
</script>
