<?php
class blog extends Controller {
    function  __construct() {
        parent::Controller();
        $this->load->model('mod_blog');
    }
    function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridObj->cellEdit = true;
        $gridColumn = array('Blog Id', 'Title','Blog Description','Blog Status');
        $gridColumnModel = array(
            array("name" => "blog_id",
                "index" => "blog_id",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "title",
                "index" => "title",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "blog_description",
                "index" => "blog_description",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            ),
            array("name" => "blog_status",
                "index" => "blog_status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            )
        );
        $gridObj->setGridOptions("Blog List", 880, 250, "blog_id", "desc", $gridColumn, $gridColumnModel, site_url("blog/load_all_blog"), true);
        $data['grid_data'] = $gridObj->getGrid();
//print_r($data['grid_data']);
//        exit();
        $data['nav_array'] = array(
            array('title' => 'blog List', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'blog';
        $data['page'] = 'index';
        $this->load->view('main', $data);

    }
    function load_all_blog(){
        $this->mod_blog->get_all_blog();
      }


      function add_blog(){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_blog')){
                $this->mod_blog->add_blog();
                $this->session->set_flashdata('msg','Blog added Successfully!!!');
                redirect('blog');
            }
        }
        $data['editor']=TRUE;
        $data['action'] = 'blog/add_blog';
        $data['dir'] = 'blog';
        $data['page'] = 'add_blog_form';
        $this->load->view('main', $data);

    }

    function edit_blog($blog_id=''){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_blog')){
                $this->mod_blog->update_blog($blog_id);
                $this->session->set_flashdata('msg','blog Updated Successfully!!!');
                redirect('blog');
            }
        }
        $data['blog_data']=sql::row("blog","blog_id=$blog_id");
//print_r($data['blog_data']);
//exit();
        $data['action'] = 'blog/edit_blog/'.$blog_id;
        $data['dir'] = 'blog';
        $data['page'] = 'add_blog_form';
        $this->load->view('main', $data);
    }

    function delete_blog($blog_id=''){
        if ($blog_id == ''){
            redirect('blog');
        }
        sql::delete("blog", "blog_id=$blog_id");
        $this->session->set_flashdata('msg', 'Blog Deleted Successfully!!!');
        redirect('blog');

    }

    function status_update($blog_status='', $blog_id=''){
        $this->db->query("update blog set blog_status='$blog_status' where blog_id='$blog_id'");
        $this->session->set_flashdata('msg', 'Blog Status Changed Successfully');
        redirect("blog");
    }
}
?>
