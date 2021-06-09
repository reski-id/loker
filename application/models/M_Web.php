<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Web extends CI_Model {

  var $tabel = "tbl_web";
  var $id_pk = "id_web";

  public function get($id='')
	{
    if ($id!='') { $this->db->where("$this->id_pk","$id"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

	public function view($data='')
	{
    if ($data!='') {
      $v = $this->get(1);
      if ($v->num_rows()==0) {
        $v = '';
      }else {
        $v = $v->row()->$data;
      }
    }else {
      $v = '';
    }
    return $v;
	}

  public static function tgl_now($aksi='')
  {
 	 date_default_timezone_set('Asia/Jakarta');
 		 if ($aksi=='tgl') {
        $v = date('Y-m-d');
     }elseif ($aksi=='jam') {
        $v = date('H:i:s');
     }else {
        $v = date('Y-m-d H:i:s');
     }
 		 return $v;
  }

  public static function tgl_id($date)
  {
 	 date_default_timezone_set('Asia/Jakarta');
     $ci =& get_instance();
 		 $str = explode('-', $date);
 		 $hasil = $str['0'] . " " . $ci->M_Web->bln_id($str[1]) . " " .$str[2];
 		 return $hasil;
  }

  public static function bln_id($bln)
  {
    date_default_timezone_set('Asia/Jakarta');
      $bulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
      );
    return $bulan[$bln];
  }

  public function hari_id($tanggal)
	{
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => "Jum'at",
			'Sat' => 'Sabtu'
		);
		return $dayList[$day];
	}

  public function waktu($data)
  {
    $tgl_n = date('d-m-Y H:i:s',strtotime($data));
    $hari = $this->hari_id($tgl_n);
    $tgl  = $this->tgl_id($tgl_n);
    return $hari.", ".$tgl;
  }

  public function cek_file($file='',$aksi='')
	{
    if ($aksi=='foto') {
      $data = "img/default.png";
  	}else {
      $data = "img/null.png";
  	}
		if ($file != '') {
			if(file_exists("$file")){
				$data = $file;
			}
		}
		return $data;
	}

  public function number_format($data,$data2='')
  {
    $v = number_format($data,0,",",".");
    if ($data2=='rp') {
      $v = "Rp. ".$v.",-";
    }
    return $v;
  }

  public function set_upload_options($lokasi,$file_size,$filename,$tipe)
	{
    $file_size = $file_size*1024;
		$data = array(
			// "file_type"     => "image/jpeg",
			"upload_path"   => "./$lokasi",
			"allowed_types" => "$tipe",
			"max_size" 			=> "$file_size",
			"file_name"			=> "$filename",
			"remove_spaces" => TRUE,
			"encrypt_name"  => TRUE
		);
		return $data;
	}

  public function cek_error_upload($up_size,$file_size,$error)
  {
    if ($up_size > ($file_size*1024)) {
      $pesan  = 'Maksimal Unggah '.$file_size.' MB.';
    }else {
      $pesan  = $error;
    }
    return $pesan;
  }

}
