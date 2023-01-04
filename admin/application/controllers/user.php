<?php

class user extends Controller {

    function __construct() {
        parent::Controller();
        if (!common::is_logged_in()) {
            common::redirect("login");
        }
        $this->load->model('mod_user');
    }

    function index() {
        if(!common::view_permit()){
            common::redirect();
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Users', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('User Name', "Full Name", "Email", "Status");
        $gridColumnModel = array(
            array("name" => "user_name",
                "index" => "user_name",
                "width" => 100,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "first_name",
                "index" => "first_name",
                "width" => 100,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "email",
                "index" => "email",
                "width" => 100,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 80,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['apply_filter']) {
            $gridObj->setGridOptions("Manage Users", 880, 200, "user_id", "asc", $gridColumn, $gridColumnModel, site_url("?c=user&m=load_users&searchField={$_POST['searchField']}&searchValue={$_POST['searchValue']}"), true);
        } else {
            $gridObj->setGridOptions("Manage Users", 880, 200, "user_id", "asc", $gridColumn, $gridColumnModel, site_url('user/load_users'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'user';
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Users';
        $this->load->view('main', $data);
    }

    function load_users() {
        $this->mod_user->get_user_grid();
    }

    function new_user() {
        if(!common::add_permit()){
            common::redirect();
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_user')) {
                $this->mod_user->save_user(); //Don't Change
                $this->session->set_flashdata('msg', 'User Added Successfully!');
                redirect('user');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Users', 'url' => site_url('user')),
            array('title' => 'Add New User', 'url' => '')
        );
        $data['dir'] = 'user';
        $data['action'] = 'user/new_user';
        $data['page'] = 'user_form'; //Don't Change
        $data['page_title'] = 'Add New User';
        $this->load->view('main', $data);
    }

    function edit_user($user_id='') {
        if(!common::update_permit()){
            common::redirect();
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_user')) {
                $this->mod_user->update_user(); //Don't Change
                $this->session->set_flashdata('msg', 'Content Updated Successfully!');
                redirect('user');
            }
        }
        $id = $user_id - ID_GENERATE;
        if ($id == '') {
            redirect('user');
        }
        $data = sql::row("user","user_id=$id");
        $this->session->set_userdata('edit_user_id', $data['user_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Users', 'url' => site_url('user')),
            array('title' => 'Add New User', 'url' => '')
        );
        $data['dir'] = 'user';
        $data['action'] = 'user/edit_user/' . $user_id;
        $data['page'] = 'user_form'; //Don't Change
        $data['page_title'] = 'Edit User';
        $this->load->view('main', $data);
    }

    function delete_user(){
        $id = $this->uri->segment(3);
        if ($id == '') {
            redirect('user');
        }
        $this->mod_user->delete_user($id); //Don't Change
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        redirect('user');
    }

    function user_status() {
        $id = $this->uri->segment(3);
        if ($id == '') {
            redirect('user');
        }
        $status = $this->uri->segment(4);
        common::change_status('user', 'user_id=' . $id, $status);
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('user');
    }

}
?>