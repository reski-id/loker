<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

  var $tabel = "tbl_user";
  var $id_pk = "id_user";
  var $level = "level";

  public function get($id='',$level='')
	{
    $s_level = $this->session->userdata('level');
    if ($s_level=='perusahaan') {
      $this->db->join("tbl_perusahaan","tbl_perusahaan.$this->id_pk=$this->tabel.$this->id_pk");
    }elseif ($s_level=='user') {
      $this->db->join("tbl_pencari_kerja","tbl_pencari_kerja.$this->id_pk=$this->tabel.$this->id_pk");
    }
    if ($id!='') { $this->db->where("$this->tabel.$this->id_pk","$id"); }
    if ($level!='') { $this->db->where("$this->level","$level"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

  public function get_un($un='',$un2='')
	{
    if ($un!='') { $this->db->where("username","$un"); }
    if ($un2!='') { $this->db->where("username!=","$un2"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

	public function view($data='')
	{
    $id_user = $this->session->userdata('id_user');
    if ($data!='') {
      $v = $this->get($id_user);
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

  public function field($field,$id='')
	{
    $this->db->select($this->id_pk);
    $this->db->select($field);
    if ($id!='') { $this->db->where("$this->id_pk","$id"); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

  public function get_field($id='')
	{
    $fields = $this->db->list_fields($this->tabel);
    $field_ar = array();
    foreach ($fields as $field)
    {
      $field_ar [$field] = '';
      if ($id!='') {
        $data=$this->field($field,$id);
        if ($data->num_rows()!=0) {
          $field_ar [$field] = $data->row()->$field;
        }
      }
    }
    return $field_ar;
  }

  public function save($data,$tbl='')
  {
    if ($tbl=='') {
      $tbl=$this->tabel;
    }
    return $this->db->insert($tbl,$data);
  }

  public function update($data,$where,$tbl='')
  {
    if ($tbl=='') {
      $tbl=$this->tabel;
    }
    return $this->db->update($tbl,$data,$where);
  }

  public function delete($where,$tbl='')
  {
    if ($tbl=='') {
      $tbl=$this->tabel;
    }
    return $this->db->delete($tbl,$where);
  }

}
