<?php

class blog_header_image extends Controller{

    public function __construct(){
        parent::Controller();
        $this->load->Model('mod_blog_header_image');
        if (!common::is_logged_in()) {
            common::redirect("login");
        }
    }

    function index(){
      $this->load->library('grid');
        $gridObj = new grid();
        $gridObj->cellEdit = true;
        $gridColumn = array('Id','Image','Status');
        $gridColumnModel = array(
            array("name" => "id",
                "index" => "id",
                "width" => 150,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),    
            array("name" => "image",
                "index" => "image",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        $gridObj->setGridOptions("Manage Blog Header Image", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url("blog_header_image/load_all_image"), true);
        $data['grid_data'] = $gridObj->getGrid();
        $data['nav_array'] = array(
            array('title' => 'Manage Blog Header Image', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'blog_header_image';
//        $data['page_title'] = 'All Projects';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function load_all_image(){
        $this->mod_blog_header_image->get_all_image();
      }

     function update_status($status='',$id=''){
        $query = $this->db->update("blog_header_image", array('status' => $status), array('id' => $id));
        $this->session->set_flashdata('msg','Status Updated Successfully!!!');
        redirect('blog_header_image');
    }

   function add_image(){
        if ($_POST['save']){
                $this->mod_blog_header_image->save_image();
                 $this->session->set_flashdata('msg','Image Added Successfully!!!');
                redirect('blog_header_image');
        }
        $data['editor']=TRUE;
        $data['dir'] = 'blog_header_image';
        $data['page'] = 'image_form';
        $data['action'] = 'blog_header_image/add_image';
        $this->load->view('main', $data);
    }

    function edit_image($id=''){
        $data['blog_data']=sql::row("blog_header_image","id=$id");
        if ($_POST['save']){
                $this->mod_blog_header_image->update_image($id);
                 $this->session->set_flashdata('msg','image Updated Successfully!!!');
                redirect('blog_header_image');
            }
        $data['editor']=TRUE;
        $data['dir'] = 'blog_header_image';
        $data['page'] = 'image_form';
        $data['action'] = 'blog_header_image/edit_image/'.$id;
        $this->load->view('main', $data);
    }

    function delete_image($id=''){
        if ($id == ''){
            redirect('blog_header_image');
        }
        sql::delete("blog_header_image", "id=$id");
        $this->session->set_flashdata('msg', 'Image Deleted Successfully!!!');
        redirect('blog_header_image');

    }


}
?>
