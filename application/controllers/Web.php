<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	var $view = "web";

	public function index()
	{
		$data = array(
			'judul_web' => "Selamat datang di ".$this->M_Web->view('judul_web')." ".$this->M_Web->view('judul_web2'),
			'content'		=> "$this->view/beranda"
		);
		$this->load->view("$this->view/index", $data);
	}

	public function daftar()
	{
		$id_user = $this->session->userdata('id_user');
		if(isset($id_user)) { redirect(""); }

		$data = array(
			'judul_web' => "Pendaftaran ".$this->M_Web->view('judul_web')." ".$this->M_Web->view('judul_web2'),
			'content'		=> "$this->view/daftar"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btndaftar'])) {
			$username = htmlentities(strip_tags($this->input->post('username')));
			$password = htmlentities(strip_tags($this->input->post('password')));
			$password2 = htmlentities(strip_tags($this->input->post('password2')));
			$cek_data = $this->M_User->get_un($username);
			if ($cek_data->num_rows()!=0) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Username <b>'$username'</b> sudah terdaftar","$this->view/daftar");
			}else {
				if ($password <> $password) {
					$this->M_Pesan->add('warning','msg','Gagal!',"Password tidak cocok","$this->view/daftar");
				}else {
					$tgl_now = $this->M_Web->tgl_now();
					$data = array('nama_lengkap'=>$username, 'username'=>$username, 'password'=>$password, 'level'=>'user', 'tgl_user'=>$tgl_now);
					$this->M_User->save($data);
					$id_new = $this->db->insert_id();
					$data2 = array('nama'=>$username, 'id_user'=>$id_new, 'tgl_pencari_kerja'=>$tgl_now);
					$this->M_User->save($data2,'tbl_pencari_kerja');
					$this->session->set_userdata('id_user', "$id_new");
					$this->session->set_userdata('username', "$username");
					$this->session->set_userdata('level', "user");
					$this->M_Pesan->add('success','msg_beranda',"Selamat Datang ".$this->M_User->view('nama_lengkap').",","Selamat beraktifitas :)",'beranda');
				}
			}
		}
	}

	public function login($aksi='',$id='')
	{
		$id_user = $this->session->userdata('id_user');
		if(isset($id_user)) { redirect("beranda"); }

		$data = array(
			'judul_web' => $this->M_Web->view('judul_web')." ".$this->M_Web->view('judul_web2'),
			'content'		=> "$this->view/login"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btnlogin'])) {
			$username = htmlentities(strip_tags($this->input->post('username')));
			$password = htmlentities(strip_tags($this->input->post('password')));
			$cek_data = $this->M_User->get_un($username);
			if ($cek_data->num_rows()==0) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Username <b>'$username'</b> belum terdaftar","$this->view/login");
			}else {
				$row = $cek_data->row();
				if ($password <> $row->password) {
					$this->M_Pesan->add('warning','msg','Gagal!',"Username atau Password salah","$this->view/login");
				}else {
					$this->session->set_userdata('id_user', "$row->id_user");
					$this->session->set_userdata('username', "$row->username");
					$this->session->set_userdata('level', "$row->level");
					if ($aksi=='loker' && $row->level=='user') {
						$url="loker/p/t/$id";
					}else {
						$url='beranda';
					}
					$this->M_Pesan->add('success','msg_beranda',"Selamat Datang ".$this->M_User->view('nama_lengkap').",","Selamat beraktifitas :)",$url);
				}
			}
		}

	}

	public function logout()
	{
     if ($this->session->has_userdata('username') and $this->session->has_userdata('id_user')) {
         $this->session->sess_destroy();
     }
		 redirect("$this->view/login");
  }

	function error_not_found(){
		$id_user = $this->session->userdata('id_user');
		// if(!isset($id_user)) { redirect("$this->view/login"); }
		$data = array(
			'judul_web' => "404 Page Not Found",
			'content'		=> "404_content"
		);
		$this->load->view("web/index", $data);
	}

}
