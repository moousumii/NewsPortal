<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author sumon
 */
class home extends Controller {
    function  __construct() {
        parent::Controller();
//        if (!common::is_logged_in()) {
//            common::redirect("login");
//        }
    }
    function index(){
		
		//print_r($data['internal']);
        $data['dir']='home';
        $data['page']='index';
        $this->load->view('main',$data);
    }
}
?>
