<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Select extends CI_Model {

  public function bln($id='')
  {
    for ($i=1; $i <=12; $i++) { if ($i<10) { $i = "0".$i; } ?>
      <option value="<?php echo $i; ?>" <?php if($i==$id){echo "selected";} ?>><?php echo $this->M_Web->bln_id($i); ?></option> <?php
    }
  }

  public function thn($min,$max,$id='')
  {
    for ($i=$max; $i >=$min; $i--) { ?>
      <option value="<?php echo $i; ?>" <?php if($i==$id){echo "selected";} ?>><?php echo $i; ?></option> <?php
    }
  }

  public function option($data='',$id='',$html='')
	{?>
    <select class="form-control default-select2" name="<?php echo $data; ?>" <?php echo $html; ?>>
      <option value="">- Pilih <?php echo ucwords($data); ?> -</option>
      <?php
      if ($data=='bulan'){
        $this->bln($id);
      }elseif ($data=='tahun'){
        $min = $this->M_Penjualan->get('','thn','ASC','1');
        if ($min->num_rows()==0) { $min=date('Y'); }else { $min=$min->row()->thn; }
        $max = date('Y');
        $this->thn($min,$max,$id);
      } ?>
    </select> <?php
	}

  public function status_loker($id='',$html='')
	{?>
    <select class="form-control default-select2" name="status_loker" <?php echo $html; ?>>
      <option value="">- PIlih -</option>
      <option value="1" <?php if($id=='1'){echo "selected";} ?>>Aktif</option>
      <option value="0" <?php if($id=='0'){echo "selected";} ?>>Tidak Aktif</option>
    </select>
    <?php
	}

  public function barang($id='',$html='')
	{?>
    <select class="form-control default-select2" name="id_barang" <?php echo $html; ?>>
      <option value="">- Pilih Barang -</option>
      <?php foreach ($this->M_Barang->get('','nama_barang','ASC')->result() as $key => $value): ?>
        <option value="<?php echo $value->id_barang; ?>" <?php if($value->id_barang==$id){echo "selected";} ?>><?php echo $value->nama_barang; ?></option>
      <?php endforeach; ?>
    </select> <?php
	}

}
