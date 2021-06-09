<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "penerimaan";
	var $judul  = "Data Penerimaan";

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
		if ($level=='admin') { redirect('404'); }

    if ($aksi=='d') {
      $p = "detail";
      $judul = "Detail ".$this->judul;
    }elseif ($aksi=='h') {
			if ($level=='perusahaan') { redirect('404'); }
			$id2 = $this->M_Pencari_kerja->get_field($id_user)['id_pencari_kerja'];
			$cek_data = $this->M_Loker->where_DL(array('id_daftar_loker'=>$id,'id_pencari_kerja'=>$id2,'status'=>0));
      if ($cek_data->num_rows()!=0) {
				$file=$cek_data->row()->file_cv;
				if (file_exists($file)) {
					unlink($file);
				}
        $this->M_Loker->delete_DL(array('id_daftar_loker'=>$id));
        $this->M_Pesan->add('success','msg','Sukses!',"Berhasil dibatalkan","$this->folder/v");
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
