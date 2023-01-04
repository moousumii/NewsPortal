<?php
/**
 * Description of slider
 *
 * @author anwar
 */
class slider extends Controller{
    private $dir='slider';
    private $container='common';
    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->model('mod_slider');
    }
    function index() {
        $data['nav_array']=array(
                array('title'=>'Manage slider','url'=>'')
        );
        $data['msg']=$this->session->flashdata('msg');
        $data['dir']=$this->dir;
        $data['container']=$this->container;
        $data['page']='index';
        $data['page_title']='Manage Slider';
        $data['rows']=sql::rows('wb_slider');
        $this->load->view('main',$data);
    }
    function new_slider() {
        if($_POST['save']) {
           // if($this->form_validation->run('valid_slider')) {
                $this->mod_slider->save_slider(); //Don't Change
                $this->session->set_flashdata('msg','Successfully Added!!!');
                redirect('slider');
           // }
        }
        $data['nav_array']=array(
                array('title'=>'Manage slider','url'=>site_url('slider')),
                array('title'=>'Add New slider','url'=>'')
        );
        $data['dir']=$this->dir;
        $data['container']=$this->container;
        $data['page']='new_slider'; //Don't Change
        $data['page_title']='Add New slider';
        $this->load->view('main',$data);
    }
    function edit_slider($slider_id='') {
        if($_POST['update']) {
            //if($this->form_validation->run('valid_slider')) {
                $this->mod_slider->update_slider(); //Don't Change
                $this->session->set_flashdata('msg','Successfully Updated!!!');
                redirect('slider');
            //}
        }
        if($slider_id=='') {
            redirect('slider');
        }
        $data=sql::row('wb_slider','slider_id='.$slider_id); //Don't Change
        $this->session->set_userdata('slider_id',$data['slider_id']); //Don't Change
        $data['nav_array']=array(
                array('title'=>'Manage Slider','url'=>site_url('slider')),
                array('title'=>'Edit Slider','url'=>'')
        );
        $data['dir']=$this->dir;
        $data['container']=$this->container;
        $data['page']='edit_slider'; //Don't Change
        $data['page_title']='Edit Slider';
        $this->load->view('main',$data);
    }
    function delete_slider($slider_id='') {
        if($slider_id=='') {
            redirect('slider');
        }
        $this->mod_slider->delete_slider($slider_id); //Don't Change
        $this->session->set_flashdata('msg','Successfully Deleted!!!');
        common::redirect();
    }
    function slider_status($slider_id='',$status='1') {
        if($slider_id=='') {
            redirect('slider');
        }
        common::change_status('wb_slider','slider_id='.$slider_id,$status);
        $this->session->set_flashdata('msg','Status Updated!!!');
        common::redirect();
    }
}?>