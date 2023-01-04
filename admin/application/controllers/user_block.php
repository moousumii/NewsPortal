<?php
class user_block extends Controller {
    function  __construct() {
        parent::Controller();
        $this->load->model('mod_user_block');
    }
    function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridObj->cellEdit = true;
        $gridColumn = array('user_id','User Name','User Status');
        $gridColumnModel = array(
            array("name" => "user_id",
                "index" => "user_id",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "user_username",
                "index" => "user_username",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "user_status",
                "index" => "user_status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            )
        );
        $gridObj->setGridOptions("All User List", 880, 250, "user_id", "desc", $gridColumn, $gridColumnModel, site_url("user_block/load_all_user"), true);
        $data['grid_data'] = $gridObj->getGrid();
//print_r($data['grid_data']);
//exit();
        $data['nav_array'] = array(
            array('title' => 'user List', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'user_block';
        $data['page'] = 'index';
        $this->load->view('main', $data);

    }
    function load_all_user(){
        $this->mod_user_block->get_all_user();
      }


//      function add_blog(){
//        if ($_POST['save']){
//            if ($this->form_validation->run('valid_blog')){
//                $this->mod_blog->add_blog();
//                $this->session->set_flashdata('msg','Blog added Successfully!!!');
//                redirect('blog');
//            }
//        }
//        $data['editor']=TRUE;
//        $data['action'] = 'blog/add_blog';
//        $data['dir'] = 'blog';
//        $data['page'] = 'add_blog_form';
//        $this->load->view('main', $data);
//
//    }
//
//    function edit_blog($blog_id=''){
//        if ($_POST['save']){
//            if ($this->form_validation->run('valid_blog')){
//                $this->mod_blog->update_blog($blog_id);
//                $this->session->set_flashdata('msg','blog Updated Successfully!!!');
//                redirect('blog');
//            }
//        }
//        $data['blog_data']=sql::row("blog","blog_id=$blog_id");
////print_r($data['blog_data']);
////exit();
//        $data['action'] = 'blog/edit_blog/'.$blog_id;
//        $data['dir'] = 'blog';
//        $data['page'] = 'add_blog_form';
//        $this->load->view('main', $data);
//    }
//
    function delete_user($user_id=''){
        if ($user_id == ''){
            redirect('user_block');
        }
        sql::delete("user", "user_id=$user_id");
        $this->session->set_flashdata('msg', 'User Deleted Successfully!!!');
        redirect('user_block');

    }

    function status_update($user_status='', $user_id=''){
        $this->db->query("update user set user_status='$user_status' where user_id='$user_id'");
        $this->session->set_flashdata('msg', 'User Status Changed Successfully');
        redirect("user_block");
    }
}
?>
