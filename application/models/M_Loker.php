<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Loker extends CI_Model {

  var $tabel = "tbl_loker";
  var $id_pk = "id_loker";
  var $tabel2 = "tbl_daftar_loker";
  var $id_pk2 = "id_daftar_loker";

  public function get($id='',$order='',$by='',$limit='')
	{
    if ($id!='') { $this->db->where("$this->id_pk","$id"); }
    if ($order!='' AND $by!='') { $this->db->order_by($order,$by); }
    if ($limit!='') { $this->db->limit($limit); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

  public function where($where)
	{
    return $this->db->get_where($this->tabel,$where);
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


  public function save($data)
  {
    return $this->db->insert($this->tabel,$data);
  }

  public function update($data,$where)
  {
    return $this->db->update($this->tabel,$data,$where);
  }

  public function delete($where)
  {
    return $this->db->delete($this->tabel,$where);
  }


  public function get_DL($id='',$order='',$by='',$limit='')
	{
    if ($id!='') { $this->db->where("$this->id_pk2","$id"); }
    if ($order!='' AND $by!='') { $this->db->order_by($order,$by); }
    if ($limit!='') { $this->db->limit($limit); }
    $v = $this->db->get($this->tabel2);
    return $v;
	}

  public function where_DL($where)
	{
    return $this->db->get_where($this->tabel2,$where);
	}

  public function save_DL($data)
  {
    return $this->db->insert($this->tabel2,$data);
  }

  public function update_DL($data,$where)
  {
    return $this->db->update($this->tabel2,$data,$where);
  }

  public function delete_DL($where)
  {
    return $this->db->delete($this->tabel2,$where);
  }

}
