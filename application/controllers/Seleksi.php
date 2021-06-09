<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksi extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "seleksi";
	var $judul  = "Data Seleksi";

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
		if ($level!='perusahaan') { redirect('404'); }

    if ($aksi=='1' || $aksi=='2') {
			if ($level!='perusahaan') { redirect('404'); }
			$cek_data = $this->M_Loker->where_DL(array('id_daftar_loker'=>$id));
      if ($cek_data->num_rows()!=0) {
				$data = array('status'=>$aksi);
        $this->M_Loker->update_DL($data,array('id_daftar_loker'=>$id));
        $this->M_Pesan->add('success','msg','Sukses!',"Berhasil disimpan","$this->folder/v");
      }else {
        redirect('404');
      }
    }else {
      $judul = $this->judul;
      $p = "tabel";
		}
		$this->db->join('tbl_pencari_kerja','tbl_pencari_kerja.id_pencari_kerja=tbl_daftar_loker.id_pencari_kerja');
		$this->db->join('tbl_loker','tbl_loker.id_loker=tbl_daftar_loker.id_loker');
		$query = $this->M_Loker->get_DL($id);

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);

	}


}
