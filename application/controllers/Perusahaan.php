<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "perusahaan";
	var $judul  = "Data Perusahaan";

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
    $query = $this->M_Perusahaan->get_field($id);
    if ($aksi=='t' or $aksi=='e' or $aksi=='d') {
      $p = "form";
      if ($aksi=='t') {
        $judul = "Tambah ";
      }elseif ($aksi=='e') {
        $judul = "Edit ";
      }else {
        $p = "detail";
        $judul = "Detail ";
      }
      $judul .= $this->judul;
    }elseif ($aksi=='h') {
      if ($this->M_Perusahaan->get($id)->num_rows()!=0) {
        $logo = $query['logo'];
        if (file_exists($logo)) {
          if ($logo!='') {
            unlink($logo);
          }
        }
        $this->M_Perusahaan->delete(array('id_user'=>$id));
        $this->M_Pesan->add('success','msg','Sukses!',"Data berhasil dihapus","$this->folder/v");
      }else {
        redirect('404');
      }
    }else {
      $judul = $this->judul;
      $p = "tabel";
      $query = $this->M_Perusahaan->get($id);
    }

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);

    if (isset($_POST['btnsimpan'])) {
      $nama      = htmlentities(strip_tags($this->input->post('nama')));
      $email     = htmlentities(strip_tags($this->input->post('email')));
      $telp      = htmlentities(strip_tags($this->input->post('telp')));
      $alamat    = htmlentities(strip_tags($this->input->post('alamat')));
      $pendiri   = htmlentities(strip_tags($this->input->post('pendiri')));
      $deskripsi = htmlentities(strip_tags($this->input->post('deskripsi')));
      $username  = htmlentities(strip_tags($this->input->post('username')));
      $password  = htmlentities(strip_tags($this->input->post('password')));

			if ($aksi=='t') {
        if ($this->M_User->get_un($username)->num_rows()!=0) {
          $this->M_Pesan->add('danger','msg','Gagal!',"Username <b>$username</b> sudah ada","$this->folder/v/$aksi");
          exit;
        }
        $tgl = $this->M_Web->tgl_now();
        $data_x = array('nama_lengkap'=>$nama,'username'=>$username,'password'=>$password,'level'=>'perusahaan','tgl_user'=>$tgl);
        $this->M_User->save($data_x);
        $id_new = $this->db->insert_id();
        $data = array('nama'=>$nama,'email'=>$email,'telp'=>$telp,'alamat'=>$alamat,'pendiri'=>$pendiri,'deskripsi'=>$deskripsi,'tgl_perusahaan'=>$tgl,'id_user'=>$id_new);
  			$simpan = $this->M_Perusahaan->save($data);
			}elseif ($aksi=='e') {
        $un = $this->M_User->get_field($id)['username'];
        if ($this->M_User->get_un($username,$un)->num_rows()!=0) {
          $this->M_Pesan->add('danger','msg','Gagal!',"Username <b>$username</b> sudah ada","$this->folder/v/$aksi/".hashids_encrypt($id));
          exit;
        }
        $data_x = array('nama_lengkap'=>$nama,'username'=>$username,'password'=>$password,'level'=>'perusahaan');
        $this->M_User->update($data_x, array('id_user'=>$id));
        $data = array('nama'=>$nama,'email'=>$email,'telp'=>$telp,'alamat'=>$alamat,'pendiri'=>$pendiri,'deskripsi'=>$deskripsi);
        $simpan = $this->M_Perusahaan->update($data, array('id_user'=>$id));
      }else {
        redirect('404');
      }
      if ($simpan) {
        $this->M_Pesan->add('success','msg','Sukses!',"Data berhasil disimpan","$this->folder/v");
      }else {
        $this->M_Pesan->add('danger','msg','Gagal!',"Silahkan coba lagi","$this->folder/v/$aksi/".hashids_encrypt($id));
      }
    }

	}


	public function p($aksi='',$id='')
	{
		$id=hashids_decrypt($id);
		if ($aksi=='d') {
			$p='detail';
			$query = $this->M_Perusahaan->get_field($id);
			if ($query['id_perusahaan']=='') {
				redirect('404');
			}
			$judul = 'Detail';
		}else {
			$p='tabel';
			$this->db->order_by('nama','ASC');
			$query = $this->M_Perusahaan->get($id);
			$judul = '';
		}
		$data = array(
			'judul_web' => "$judul Perusahaan",
			'content'		=> "web/perusahaan/index",
			'view'			=> "web/perusahaan/$p",
			'query'			=> $query
		);
		$this->load->view("web/index", $data);
	}


}
