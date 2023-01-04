<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		/*if(!$this->session->userdata('admin_id'))
		return redirect('login');*/
		/*$data=$this->session->userdata('user_role');
		if($data==1)return redirect('root_admin/index');
		else if($data==2)return redirect('supper_admin/index');
		else if($data==3)return redirect('manager/index');
		else if($data==4)return redirect('sales_counter/index');*/
		
	}

}
