<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencari_kerja extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "pencari_kerja";
	var $judul  = "Data Peserta Kerja";

  public function index()
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }else {
      redirect("$this->folder/v");
    }
	}

	public function v($aksi='',$id='')
	{
    $id = hashids_decrypt($id);
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }
		if($level!='admin'){redirect('404');}
    $query = $this->M_Pencari_kerja->get_field($id);
    if ($aksi=='d') {
      $p = "detail";
      $judul = "Detail ";
      $judul .= $this->judul;
    }elseif ($aksi=='h') {
      if ($this->M_Pencari_kerja->get($id)->num_rows()!=0) {
        $foto = $query['foto'];
        if (file_exists($foto)) {
          if ($foto!='') {
            unlink($foto);
          }
        }
        $this->M_Pencari_kerja->delete(array('id_user'=>$id));
        $this->M_Pesan->add('success','msg','Sukses!',"Data berhasil dihapus","$this->folder/v");
      }else {
        redirect('404');
      }
    }else {
      $judul = $this->judul;
      $p = "tabel";
      $query = $this->M_Pencari_kerja->get($id);
    }

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);
	}

}
