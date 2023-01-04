<?php
class store_notice extends Controller{
    public function __construct() {
        parent::Controller();

        if (!common::is_logged_in()) {
            common::redirect("login");
        }
        $this->load->Model('mod_store_notice');

    }

    function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridObj->cellEdit = true;
        $gridColumn = array('Title','Description','Status');
        $gridColumnModel = array(

            array("name" => "title",
                "index" => "title",
                "width" => 90,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            ),
            array("name" => "description",
                "index" => "description",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            ),
             array("name" => "status",
                "index" => "status",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            )
        );
        $gridObj->setGridOptions("Manage Notice", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url("store_notice/load_notice"), true);
        $data['grid_data'] = $gridObj->getGrid();
        $data['nav_array'] = array(
            array('title' => 'Manage Store Notice', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'notice';
        $data['page_title'] = 'Store Notice';
        $data['page'] = 'index';
        $this->load->view('main', $data);

    }

    function load_notice(){
        $this->mod_store_notice->load_all_notice();
    }

    function add_notice(){
         if ($_POST['save']) {
            if ($this->form_validation->run('valid_testimonial')) {

                $this->mod_store_notice->add_notice();
                $this->session->set_flashdata('msg','Notice added Successfully!!!');
                redirect('store_notice/index');
            }
        }

        $data['nav_array'] = array(
            array('title' => 'Notice', 'url' => site_url('store_notice/index')),
            array('title' => 'Add New Notice', 'url' => '')
        );

        $data['action'] = 'store_notice/add_notice';
        $data['dir'] = 'notice';
        $data['page'] = 'notice_form';
        $this->load->view('main', $data);
    }

    function edit_notice($id){
        $this->session->set_userdata('notice_id',$id);
        if ($_POST['save']){
            if ($this->form_validation->run('valid_notice')){
                $this->mod_store_notice->update_notice();
                $this->session->set_flashdata('msg','Notice Edited Successfully!!!');
                redirect('store_notice/index');
            }
        }

        $data['nav_array'] = array(
            array('title' => 'Store notice', 'url' => site_url('store_notice/index')),
            array('title' => 'Edit Options', 'url' => '')
        );
        $data = sql::row('notice', "id=$id");
        $data['action'] = 'store_notice/edit_notice/'.$id;
        $data['dir'] = 'notice';
        $data['page'] = 'notice_form';
        $this->load->view('main', $data);

    }

    function status_update($status='', $id='') {
        $this->db->query("update notice set status='$status' where id='$id'");
        redirect("store_notice");
    }

    function delete_notice($id=''){
        if ($id == ''){
            redirect('store_notice');
        }
        sql::delete("notice", "id=$id");
        $this->session->set_flashdata('msg', 'Notice Deleted Successfully!!!');
        redirect('store_notice');       

    }

    


}


?>