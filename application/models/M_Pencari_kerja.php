<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pencari_kerja extends CI_Model {

  var $tabel = "tbl_pencari_kerja";
  var $id_pk = "id_pencari_kerja";
  var $tabel2 = "tbl_user";
  var $id_pk2 = "id_user";

  public function get($id='',$order='',$by='',$limit='')
	{
    // $this->db->join("$this->tabel2","$this->table.$this->id_pk2=$this->tabel2.$this->id_pk2");
    if ($id!='') { $this->db->where("$this->tabel.$this->id_pk2","$id"); }
    if ($order!='' AND $by!='') { $this->db->order_by($order,$by); }
    if ($limit!='') { $this->db->limit($limit); }
    $v = $this->db->get($this->tabel);
    return $v;
	}

  public function where($where)
	{
    $this->db->join("$this->tabel2","$this->table.$this->id_pk2=$this->tabel2.$this->id_pk2");
    return $this->db->get_where($this->tabel,$where);
	}

  public function field($field,$id='')
	{
    $this->db->select($this->id_pk);
    $this->db->select($field);
    if ($id!='') { $this->db->where("$this->tabel.$this->id_pk2","$id"); }
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
    $this->db->delete($this->tabel2,$where);
    return $this->db->delete($this->tabel,$where);
  }

}
