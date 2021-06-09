<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pesan extends CI_Model {

	public function add($alert,$msg,$judul='',$isi='',$url='',$html='')
	{
    $this->session->set_flashdata($msg,
      '
      <div class="alert alert-'.$alert.' alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;&nbsp;</span>
         </button>
         <strong>'.$judul.'</strong> '.$isi.'
      </div>
			'.$html.''
    );
    return redirect($url);
  }

  public function get($msg)
	{
    echo $this->session->flashdata($msg);
  }

	public function alert($alert,$msg,$judul='',$isi='')
	{
		return '<div class="alert alert-'.$alert.' alert-dismissible" role="alert">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;&nbsp;</span>
			 </button>
			 <strong>'.$judul.'</strong> '.$isi.'
		 </div>';
	}

}
