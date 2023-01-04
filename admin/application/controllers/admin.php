<?php

class admin extends Controller {

    function __construct() {
        parent::Controller();
        $this->load->model('mod_admin');
        if (!common::is_logged_in()) {
            common::redirect("login");
        }
    }

    function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array("First Name", "Last Name", "User Name", "Email", "status");
        $gridColumnModel = array(
            array("name" => "first_name",
                "index" => "first_name",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "last_name",
                "index" => "last_name",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "user_name",
                "index" => "user_name",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "email",
                "index" => "email",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
        );
        if ($_POST['search_admin']) {

            $gridObj->setGridOptions("Admin Info", 880, 200, "user_id", "desc", $gridColumn, $gridColumnModel, site_url("?c=admin&m=load_admin&user_name={$_POST['admin_name']}&status={$_POST['status']}"), true);
        } else {
            $gridObj->setGridOptions("Admin Info", 880, 250, "user_id", "desc", $gridColumn, $gridColumnModel, site_url('admin/load_admin'), true);
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Admin', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'admin';
        $data['page'] = 'admin_list';
        $this->load->view('main', $data);
    }

    function load_admin() {
        $this->mod_admin->get_adminGrid();
    }

    function add_admin() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_admin')) {
                if (!sql::count("admin", "user_name='" . $_POST['user_name'] . "'")) {
                    $this->mod_admin->add_admin();
                    $this->session->set_flashdata('msg', "<div class='success'>Content Added Successfully</div>");
                    redirect('admin');
                } else {
                    $data['msg'] = 'User Exist,Change Username';
                }
            }
        }
        if ($data['msg'] == '') {
            $data['msg'] = $this->session->flashdata('msg');
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Admin', 'url' => site_url('admin')),
            array('title' => 'Add New Admin', 'url' => '')
        );

        $data['first_name'] = $_REQUEST['first_name'];
        $data['last_name'] = $_REQUEST['last_name'];
        $data['user_name'] = $_REQUEST['user_name'];
        $data['password'] = $_REQUEST['password'];
        $data['email'] = $_REQUEST['email'];
        $data['dir'] = 'admin';
        $data['page'] = 'add_admin';
        $data['page_title'] = "ADD User";
        $data['action'] = 'admin/add_admin';
        $this->load->view('main', $data);
    }
    function edit_admin($cid='') {
        if ($cid == '') {
            redirect('admin');
        }
        $data['error'] = "";
        $data['num'] = $this->mod_admin->get_admin_info();
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_admin') && $data['num'] == 0) {
                $data = array(
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'user_name' => $_POST['user_name'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email']
                );
                $this->db->update('admin', $data, array('user_id' => $cid));
                $data['new'] = $_POST['user_name'];
                $data['current'] = $this->session->userdata('user_id');

                $this->session->set_userdata('user_id', $data['new']);

                $this->session->set_flashdata('msg', "<div class='success'>Content Changed Successfully</div>");
                redirect('admin');
            } else {
                $this->session->set_flashdata('msg', "<div class='error'>User Exist,choose another name</div>");
            }
        }


        $data = sql::row('admin', 'user_id=' . $cid);
        $data['nav_array'] = array(
            array('title' => 'Manage Admin', 'url' => site_url('admin')),
            array('title' => 'Add New Admin', 'url' => '')
        );
        $data['error'] = $err ? $err : '';
        $data['dir'] = 'admin';
        $data['action'] = 'admin/edit_admin/' . $cid;
        $data['page'] = 'add_admin'; //Don't Change
        $data['page_title'] = "Edit";
        $this->load->view('main', $data);
    }

    function delete_admin($cid='') {
        if ($cid == '') {
            redirect('admin');
        }
        sql::delete('admin', 'user_id=' . $cid);
        $this->session->set_flashdata('msg', "<div class='success'>Admin Deleted Successfully</div>");
        redirect('admin');
    }

    function status_update($status='', $id='') {
        $this->db->query("update admin set status='$status' where user_id='$id'");
        redirect("admin");
    }
    function change_password() {
        if ($_POST['change_password']) {
            if ($this->form_validation->run('valid_change_password')) {
                if ($this->mod_admin->do_update_password()) {
                    $this->session->set_flashdata('msg', 'Your Password changed Successfully!!!');
                    redirect('admin/change_password');
                }
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Change Password', 'url' => '')
        );
        $data['dir'] = "admin";
        $data['msg'] = $this->session->flashdata('msg');
        $data['page'] = 'change_password';
        $data['page_title'] = 'Change Password';
        $this->load->view('main', $data);
    }
    

    function is_valid_user_password() {
        if (!$this->mod_admin->confirm_password()) {
            $this->form_validation->set_message('is_valid_user_password', 'Invalid Old Password');
            return false;
        } else {
            return true;
        }
    }


}
?>
