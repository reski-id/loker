<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		if(!isset($id_user)) { redirect("$this->re_log"); }

		$data = array(
			'judul_web' => $this->M_Web->view('judul_web')." ".$this->M_Web->view('judul_web2'),
			'content'		=> "$this->view/beranda"
		);
		$this->load->view("$this->view/index", $data);
	}

	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		$un 		 = $this->session->userdata('username');
		$level 	 = $this->session->userdata('level');
		if(!isset($id_user)) { redirect("$this->re_log"); }

		$data = array(
			'judul_web' => "Profile",
			'content'		=> "$this->view/profile"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btnsimpan'])) {
			$nama_lengkap = htmlentities(strip_tags($this->input->post('nama_lengkap')));
			$username 		= htmlentities(strip_tags($this->input->post('username')));
			$cek_data = $this->M_User->get_un($username,$un);
			if ($cek_data->num_rows()!=0) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Username <b>'$username'</b> sudah ada","$this->view/profile");
			}else {
				$this->session->set_userdata('username', "$username");
				$data = array('nama_lengkap'=>$nama_lengkap, 'username'=>$username);
				$this->M_User->update($data, array('id_user'=>$id_user));

				if ($level!='admin') {
					$email 	= htmlentities(strip_tags($this->input->post('email')));
					$telp 	= htmlentities(strip_tags($this->input->post('telp')));
					$alamat = htmlentities(strip_tags($this->input->post('alamat')));
					if ($level=='perusahaan') {
						$file_lama = $this->M_User->view('logo');
						$lokasi		 = 'img/perusahaan/';
					}elseif ($level=='user') {
						$file_lama = $this->M_User->view('foto');
						$lokasi		 = 'img/pencari_kerja/';
					}
					$stt=1; $file='';
					$file_size = '1'; //mb
					$filename  = $_FILES['file']['name'];
					$tipe = "jpg|jpeg|png|gif|bmp";
					$this->upload->initialize($this->M_Web->set_upload_options($lokasi,$file_size,$filename,$tipe));
					if ($_FILES['file']['error'] <> 4) {
						if ( ! $this->upload->do_upload('file'))
						{
								$error = htmlentities(strip_tags($this->upload->display_errors()));
								$up_size = $_FILES['file']['size']/1024;
								$pesan  = $this->M_Web->cek_error_upload($up_size,$file_size,$error);
								$stt=0;
						}
						 else
						{
							if (file_exists($file_lama)) {
								if ($file_lama!='') {
									unlink($file_lama);
								}
							}
								$gbr = $this->upload->data();
								$file = $lokasi.$gbr['file_name'];
								$stt=1;
						}
					}else {
						$file = $file_lama;
						$stt=1;
					}

					if ($stt==1) {
						if ($level=='perusahaan') {
							$pendiri 	 = htmlentities(strip_tags($this->input->post('pendiri')));
							$deskripsi = htmlentities(strip_tags($this->input->post('deskripsi')));
							$data2 = array('nama'=>$nama_lengkap, 'email'=>$email, 'telp'=>$telp, 'alamat'=>$alamat, 'pendiri'=>$pendiri, 'deskripsi'=>$deskripsi, 'logo'=>$file);
							$this->M_User->update($data2, array('id_user'=>$id_user),'tbl_perusahaan');
						}elseif ($level=='user') {
							$jk = htmlentities(strip_tags($this->input->post('jk')));
							$data2 = array('nama'=>$nama_lengkap, 'jk'=>$jk, 'email'=>$email, 'telp'=>$telp, 'alamat'=>$alamat, 'foto'=>$file);
							$this->M_User->update($data2, array('id_user'=>$id_user),'tbl_pencari_kerja');
						}
						$this->M_Pesan->add('success','msg','Sukses!',"Berhasil disimpan","$this->view/profile");
						exit;
					}else {
						$this->M_Pesan->add('warning','msg','Gagal!',"$pesan","$this->view/profile");
						exit;
					}
				}else {
					$this->M_Pesan->add('success','msg','Sukses!',"Berhasil disimpan","$this->view/profile");
				}


			}
		}

	}

	public function ubah_pass()
	{
		$id_user = $this->session->userdata('id_user');
		$un 		 = $this->session->userdata('username');
		if(!isset($id_user)) { redirect("$this->re_log"); }

		$data = array(
			'judul_web' => "Ubah Password",
			'content'		=> "$this->view/ubah_pass"
		);
		$this->load->view("$this->view/index", $data);

		if (isset($_POST['btnsimpan'])) {
			$password1 = htmlentities(strip_tags($this->input->post('password1')));
			$password2 = htmlentities(strip_tags($this->input->post('password2')));
			$password3 = htmlentities(strip_tags($this->input->post('password3')));

			$cek_data = $this->M_User->get_un($un)->row();
			if ($cek_data->password <> $password1) {
				$this->M_Pesan->add('danger','msg','Gagal!',"Password Lama tidak cocok","$this->view/ubah_pass");
			}else {
				if ($password2 <> $password3) {
					$this->M_Pesan->add('warning','msg','Gagal!',"Konfirmasi Password Baru tidak cocok","$this->view/ubah_pass");
				}
				$data = array('password'=>$password2);
				$this->M_User->update($data, array('id_user'=>$id_user));
				$this->M_Pesan->add('success','msg','Sukses!',"Berhasil disimpan","$this->view/ubah_pass");
			}
		}

	}

}
