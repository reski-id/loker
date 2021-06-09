<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends CI_Controller {

	var $view 	= "users";
	var $re_log = "web/login";
	var $folder = "loker";
	var $judul  = "Data Loker";

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
		if ($level=='user' && $aksi=='t' || $level=='user' && $aksi=='e' || $level=='user' && $aksi=='h') {
			redirect('404');
		}
    $query = $this->M_Loker->get_field($id);
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
      if ($this->M_Loker->get($id)->num_rows()!=0) {
        $this->M_Loker->delete(array('id_loker'=>$id));
        $this->M_Pesan->add('success','msg','Sukses!',"Data berhasil dihapus","$this->folder/v");
      }else {
        redirect('404');
      }
    }else {
      $judul = $this->judul;
      $p = "tabel";
      $query = $this->M_Loker->get($id);
    }

		$data = array(
			'judul_web' => $judul,
			'content'		=> "$this->view/$this->folder/index",
      'view'      => "$this->view/$this->folder/$p",
			'query'		  => $query
		);
		$this->load->view("$this->view/index", $data);

    if (isset($_POST['btnsimpan'])) {
      $judul  = htmlentities(strip_tags($this->input->post('judul')));
			$loker  = htmlentities(strip_tags($this->input->post('loker')));
			$ket_loker = htmlentities(strip_tags($this->input->post('ket_loker')));
			$status_loker = htmlentities(strip_tags($this->input->post('status_loker')));
			$data = array('id_perusahaan'=>$id_user,'judul'=>$judul,'loker'=>$loker,'ket_loker'=>$ket_loker,'status_loker'=>$status_loker);
			if ($aksi=='t') {
      	$simpan = $this->M_Loker->save($data);
				$data2 = array('tgl_loker'=>$this->M_Web->tgl_now());
				$this->M_Loker->update($data2, array('id_loker'=>$this->db->insert_id()));
			}elseif ($aksi=='e') {
				$simpan = $this->M_Loker->update($data, array('id_loker'=>$id));
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
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		$id=hashids_decrypt($id);
		if ($aksi=='d') {
			$p='detail';
			$query = $this->M_Loker->get_field($id);
			if ($query['status_loker']==0) {
				redirect('404');
			}
			$judul = 'Detail Lowongan Pekerjaan '.ucwords($query['judul']);
		}elseif ($aksi=='t') {
			if ($level=='user') {
				$p='daftar';
				$query = $this->M_Loker->get_field($id);
				if ($query['status_loker']==0) {
					redirect('404');
				}
				$judul = 'Melamar Pekerjaan '.ucwords($query['judul']);
			}else {
				redirect('web/login/loker/'.hashids_encrypt($id));
			}
		}else {
			$p='tabel';
			$this->db->where('status_loker',1);
			$this->db->order_by('id_loker','DESC');
			$query = $this->M_Loker->get($id);
			$judul = 'Lowongan Kerja';
		}
		$data = array(
			'judul_web' => "$judul",
			'content'		=> "web/loker/index",
			'view'			=> "web/loker/$p",
			'query'			=> $query
		);
		$this->load->view("web/index", $data);

		if (isset($_POST['btnkirim'])) {
			$stt=1; $file=''; $lokasi='file/';
			$file_size = '3'; //mb
			$filename  = $_FILES['file']['name'];
			$tipe = "pdf|xls|xlsx|doc|docx";
			$this->upload->initialize($this->M_Web->set_upload_options($lokasi,$file_size,$filename,$tipe));
				if ( ! $this->upload->do_upload('file'))
				{
						$error = htmlentities(strip_tags($this->upload->display_errors()));
						$up_size = $_FILES['file']['size']/1024;
						$pesan  = $this->M_Web->cek_error_upload($up_size,$file_size,$error);
						$stt=0;
				}
				 else
				{
						$gbr = $this->upload->data();
						$file = $lokasi.$gbr['file_name'];
						$stt=1;
				}

				if ($stt==1) {
					$id_pencari_kerja = $this->M_Pencari_kerja->get_field($id_user)['id_pencari_kerja'];
					$ket_daftar_loker = htmlentities(strip_tags($this->input->post('ket_daftar_loker')));
					$data = array('id_loker'=>$id, 'id_pencari_kerja'=>$id_pencari_kerja, 'file_cv'=>$file, 'ket_daftar_loker'=>$ket_daftar_loker, 'status'=>0, 'tgl_daftar_loker'=>$this->M_Web->tgl_now());
					$this->M_Loker->save_DL($data);
					$this->M_Pesan->add('success','msg','Sukses!',"Berhasil dikirim","penerimaan/v");
					exit;
				}else {
					unlink($file);
					$this->M_Pesan->add('warning','msg','Gagal!',"$pesan","loker/p/t/".hashids_encrypt($id));
					exit;
				}
		}

	}

}
