<?
class seo extends Controller{

    public function __construct() {
        parent::Controller();
        $this->load->model('mod_seo');
        if (!common::is_logged_in()) {
            common::redirect("login");
        }
    }

     function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array("Controller Name", "Title", "Meta Tag", "Meta Keyword","Meta Description");
        $gridColumnModel = array(
            array("name" => "controller_name",
                "index" => "controller_name",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "title",
                "index" => "title",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "meta_tag",
                "index" => "meta_tag",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
             array("name" => "meta_keyword",
                "index" => "meta_keyword",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),

            array("name" => "meta_desc",
                "index" => "meta_desc",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
           
        );
     
        $gridObj->setGridOptions("SEO", 880, 200, "id", "asc", $gridColumn, $gridColumnModel, site_url('seo/load_data'), true);
  


        $data['nav_array'] = array(
            array('title' => 'Manage SEO', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'seo';
        $data['page']= 'index';
        $this->load->view('main', $data);
    }


     function load_data() {
       $this->mod_seo->get_all_seo();
    }


    function add_seo(){
        if ($_POST['save']) {
                $this->mod_seo->add_seo(); //Don't Change
                $this->session->set_flashdata('msg',lang('msg_add_success'));
                redirect('seo');

        }

        $data['nav_array'] = array(
            array('title' => lang('label_add_new_seo'), 'url' => site_url('seo/add_seo')),
            array('title' => lang('label_add_new_seo'), 'url' => '')
        );
        //$this->session->unset_userdata('edit_success_id'); //Don't Change
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'seo';
        $data['page'] = 'add_seo'; //Don't Change
        $data['page_title'] = lang('label_add_new_SEO');
        $data['action'] = 'seo/add_seo';
        $this->load->view('main', $data);


    }


    function edit_seo($id){

       $data = sql::row('seo', "id='$id'");
        if ($_POST['save']) {
            $this->mod_seo->update_seo();
            $this->session->set_flashdata('msg', lang('msg_update_success'));
            redirect('seo');
        }
     

        $this->session->set_userdata('edit_seo_id', $data['id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => lang('label_seo'), 'url' => site_url('seo')),
            array('title' => lang('label_edit_seo'), 'url' => '')
        );

        $edit_album_id = $this->session->userdata('edit_album_id');

        $data['dir'] = 'seo';
        $data['action'] = 'seo/edit_seo/' . $data['id'];
        $data['page'] = 'add_seo'; //Don't Change
        $data['page_title'] = lang('label_edit_seo');
        //$data['bidpack_image']= $bidpack_image;
        $this->load->view('main', $data);

    }

    function delete_seo($id){

        if ($id == '') {
            redirect('seo');
        }
       $this->mod_seo->delete_seo($id);
       $this->session->set_flashdata('msg', lang('msg_delete_success'));
        redirect('seo');
    }
 
}


?>