<?php
/**
 * @author Holy
 */
class news extends Controller{

    public function __construct() {
        parent::Controller();
        $this->load->Model('mod_news');
    }

    function index(){
      $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array("Category Name","Status");
        $gridColumnModel = array(
            array("name" => "category_name",
                "index" => "category_name",
                "width" => 180,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            )
            
        );
        
        $gridObj->setGridOptions("All Categories", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url('news/load_all_news_category'), true);
      
        $data['nav_array'] = array(
            array('title' => 'All Categories', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'news';
        $data['page'] = 'category_index';
        $this->load->view('main', $data);
    }

    function load_all_news_category() {
        $this->mod_news->get_all_news_category();
    }

    function add_news_category(){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_category')){
                $this->mod_news->add_news_category();
                $this->session->set_flashdata('msg','News Category added Successfully!!!');
                redirect('news');
            }
        }
        $data['category_option'] = $this->mod_news->get_category_option($_POST['parent_id']);
        $data['action'] = 'news/add_news_category';
        $data['dir'] = 'news';
        $data['page'] = 'category_form';
        $this->load->view('main', $data);
    }

    function edit_news_category($id=''){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_category')){
                $this->mod_news->update_news_category($id);
                $this->session->set_flashdata('msg','News Category edited Successfully!!!');
                redirect('news');
            }
        }
        
        $data['category_option'] = $this->mod_news->get_category_option($_POST['parent_id']);
        $data['category_data']=sql::row('news_category',"id=$id");
        $data['action'] = 'news/edit_news_category/'.$id;
        $data['dir'] = 'news';
        $data['page'] = 'category_form';
        $this->load->view('main', $data);
    }


    function status_update($status='', $id='') {
        $this->db->query("update news_category set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', 'Status Changed Successfully');
        redirect("news");
    }

    function delete_news_category($id=''){
        if ($id == ''){
            redirect('news');
        }
        sql::delete("news_category", "id=$id");
        $this->session->set_flashdata('msg', 'Category Deleted Successfully!!!');
        redirect('news');

    }

    /*---------------------------------category part ended--------------------------------*/

    function news_list(){
      $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array("Category Name","Headline","Description","Reporter","Region","Date","status");
        $gridColumnModel = array(
            array("name" => "category_name",
                "index" => "category_name",
                "width" => 180,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "headline",
                "index" => "headline",
                "width" => 180,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),

             array("name" => "description",
                "index" => "description",
                "width" => 180,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),

            array("name" => "reporter",
                "index" => "reporter",
                "width" => 180,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),

            array("name" => "region",
                "index" => "region",
                "width" => 180,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),

            array("name" => "date",
                "index" => "date",
                "width" => 180,
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
            )

        );
        $gridObj->setGridOptions("All News", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url('news/load_all_news'), true);

        $data['nav_array'] = array(
            array('title' => 'All News', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'news';
        $data['page'] = 'news_index';
        $this->load->view('main', $data);
    }

    function load_all_news(){
        $this->mod_news->get_all_news();
    }

     function news_status_update($status='', $id=''){
        $this->db->query("update news set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', 'Status Changed Successfully');
        redirect("news/news_list");
    }

    function delete_news($id=''){
        if ($id == ''){
            redirect('news/news_list');
        }
        $data['news']=sql::row("news","id=$id");
        $this->mod_news->delete_image($data['news']['image']);
        sql::delete("news", "id=$id");
        
        $this->session->set_flashdata('msg', 'Category Deleted Successfully!!!');
        redirect('news/news_list');

    }

    function add_news(){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_news')){
                $this->mod_news->add_news();
                $this->session->set_flashdata('msg','News added Successfully!!!');
                redirect('news/news_list');
            }
        }
        $data['editor']=TRUE;
        $data['sub_category_option'] = $this->mod_news->sub_category_option($_POST['parent_id']);
        $data['reporter_option']=$this->mod_news->get_reporter_name($_POST['reporter_id']);
        $data['region_option']=  $this->mod_news->get_region_option($_POST['region_id']);
        $data['position_option']=  $this->mod_news->get_position_option($_POST['position_id']);
        $data['news_type_option']=  $this->mod_news->get_news_type_option($_POST['news_type']);
        $data['action'] = 'news/add_news';
        $data['dir'] = 'news';
        $data['page'] = 'news_form';
        $this->load->view('main', $data);
    }

    function edit_news($id=''){
		  $data['news_data']=sql::row("news","id=$id");
        if ($_POST['save']){
            if ($this->form_validation->run('valid_news')){
                $this->mod_news->update_news($id,$data['news_data']['image']);
                $this->session->set_flashdata('msg','News Updated Successfully!!!');
                redirect('news/news_list');
            }
        }
        $data['editor']=TRUE;
        $data['sub_category_option'] = $this->mod_news->sub_category_option($data['news_data']['category_id']);
        $data['reporter_option']=$this->mod_news->get_reporter_name($data['news_data']['reporter_id']);
        $data['region_option']=  $this->mod_news->get_region_option($data['news_data']['region_id']);
        $data['position_option']=  $this->mod_news->get_position_option($data['news_data']['position_id']);
        $data['news_type_option']=  $this->mod_news->get_news_type_option($data['news_data']['news_type_id']);
        
        $data['action'] = 'news/edit_news/'.$id;
        $data['dir'] = 'news';
        $data['page'] = 'news_form';
        $this->load->view('main', $data);
    }

    function image_position_check(){
        
        if($_FILES['image']['name']!=''&&$_REQUEST['position_id']==''){
            $this->form_validation->set_message('image_position_check','You must select your image position');
            return FALSE;
        }
        return true;
    }
}
?>
