<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "laporan";
	var $judul  = "Laporan";

  public function index()
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }else {
      redirect("$this->folder/v");
    }
	}

	public function perusahaan($tgl_1='',$tgl_2='')
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }

    if ($tgl_1!='' AND $tgl_2!='') {
      $tgl1 = date('Y-m-d H:i:s',strtotime($tgl_1));
      $tgl2 = date('Y-m-d H:i:s',strtotime($tgl_2));
      $query = $this->db->query("SELECT * FROM tbl_perusahaan WHERE tgl_perusahaan BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_perusahaan ASC");
      if ($tgl_1==$tgl_2) {
        $tgl = $tgl_1;
      }else {
        $tgl = $tgl_1.' - '.$tgl_2;
      }
      $data = array(
  			'judul_web' => $this->judul. " Data Perusahaan",
  			'content'		=> "$this->view/$this->folder/index",
        'view'      => "$this->view/$this->folder/index",
  			'aksi'		  => "perusahaan",
        'query'     => $query,
        'tgl'       => "$tgl"
  		);
      $this->load->view("$this->view/$this->folder/perusahaan", $data);
    }else {
			$data = array(
  			'judul_web' => $this->judul. " Data Perusahaan",
  			'content'		=> "$this->view/$this->folder/index",
        'view'      => "$this->view/$this->folder/index",
  			'aksi'		  => "perusahaan"
  		);
      $this->load->view("$this->view/index", $data);
    }

	}

  public function pencari_kerja($tgl_1='',$tgl_2='')
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }

    if ($tgl_1!='' AND $tgl_2!='') {
			$tgl1 = date('Y-m-d H:i:s',strtotime($tgl_1));
      $tgl2 = date('Y-m-d H:i:s',strtotime($tgl_2));
      $query = $this->db->query("SELECT * FROM tbl_pencari_kerja WHERE tgl_pencari_kerja BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_pencari_kerja ASC");
      if ($tgl_1==$tgl_2) {
        $tgl = $tgl_1;
      }else {
        $tgl = $tgl_1.' - '.$tgl_2;
      }
      $data = array(
  			'judul_web' => $this->judul. " Data Pencari Kerja",
  			'content'		=> "$this->view/$this->folder/index",
        'view'      => "$this->view/$this->folder/index",
  			'aksi'		  => "pencari_kerja",
        'query'     => $query,
        'tgl'       => "$tgl"
  		);
      $this->load->view("$this->view/$this->folder/pencari_kerja", $data);
    }else {
			$data = array(
  			'judul_web' => $this->judul. " Data Pencari Kerja",
  			'content'		=> "$this->view/$this->folder/index",
        'view'      => "$this->view/$this->folder/index",
  			'aksi'		  => "pencari_kerja"
  		);
      $this->load->view("$this->view/index", $data);
    }
	}

}
