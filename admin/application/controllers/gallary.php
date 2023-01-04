<?php

/**
 * Description of gallary
 */
class gallary extends Controller {
    private $dir = 'gallary';
    function __construct() {
        parent::__construct();
        $this->load->model('mod_gallary');
        common::is_logged();
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage gallary', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Gallary Title', 'Profile Image',"Images","Created",'Status');
        $gridColumnModel = array(
            array("name" => "gallary_title",
                "index" => "gallary_title",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => false,
                "align" => "center",
                "editable" => true
            ),
			array("name" => "",
                "index" => "",
                "width" => 80,
                "sortable" => false,
                "align" => "center",
                "editable" => true
            ),
			array("name" => "create_date",
                "index" => "create_date",
                "width" => 50,
                "sortable" => false,
                "align" => "center",
                "editable" => true,
				"formatter" => "date",
                "formatoptions" => array("srcformat" => "Y-m-d H:i:s", "newformat" => "d/m/Y")
            ),
            array("name" => "gallary_status",
                "index" => "gallary_status",
                "width" => 80,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions('Manage gallary', 900, 200, "gallary_id", "desc", $gridColumn, $gridColumnModel, site_url("?c=gallary&m=load_data&gallary_title={$_POST['gallary_title']}&date_from={$_POST['date_from']}&date_to={$_POST['date_to']}"), true);
        } else {
            $gridObj->setGridOptions('Manage gallary', 900, 200, "gallary_id", "desc", $gridColumn, $gridColumnModel, site_url('gallary/load_data'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Gallary';
        $this->load->view('main', $data);
    }
    public function load_data() {
        $this->mod_gallary->get_all_gallary();
    }

    function view_image($id=''){
		$data=sql::row("image_gallery","gallary_id='$id'");
		if($_REQUEST['save']&&$_REQUEST['profile_photo']){
			if($this->mod_gallary->save_profile_image($id)){
				redirect("gallary/view_image/".$id);
			}
		}
	$data['image']=sql::rows("gallery_images","gallary_id='$id'");
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'gallary_image';
        $data['page_title'] = 'Manage Gallary Image';
        $this->load->view('main', $data);
	}

    function new_gallary(){
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_gallary')) {
                $this->mod_gallary->save_gallary(); //Don't Change
                $this->session->set_flashdata('msg', 'Content Added Successfully');
                redirect('gallary');
            }
        }

        $data['nav_array'] = array(
            array('title' => 'Manage gallary', 'url' => site_url('gallary')),
            array('title' => 'Add New gallary', 'url' => '')
        );
        $this->session->unset_userdata('edit_gallary_id'); //Don't Change
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['editor']=TRUE;
        $data['page'] = 'gallary_form'; //Don't Change
        $data['page_title'] = 'Add New gallary';
        $data['action'] = 'gallary/new_gallary';
        $this->load->view('main', $data);
    }

    function edit_gallary($gallary_id='') {
        if ($gallary_id == '' || !is_numeric($gallary_id)) {
            redirect('gallary');
        }
        $data = sql::row('image_gallery', "gallary_id='$gallary_id'");
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_gallary')) {
                $this->mod_gallary->update_gallary(); //Don't Change
                $this->session->set_flashdata('msg', 'Content Updated Successfully');
                redirect('gallary');
            }
        }
        $this->session->set_userdata('edit_gallary_id', $data['gallary_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Gallary', 'url' => site_url('gallary')),
            array('title' => 'Edit Gallary', 'url' => '')
        );
		$data['image']=sql::rows("gallery_images","gallary_id='$gallary_id'");
        $edit_gallary_id = $this->session->userdata('edit_gallary_id');
        $data['editor']=TRUE;
        $data['dir'] = $this->dir;
        $data['action'] = 'gallary/edit_gallary/' . $data['gallary_id'];
        $data['page'] = 'gallary_form'; //Don't Change
        $data['page_title'] = 'Edit gallary';
        $this->load->view('main', $data);
    }

    function delete_gallary($id) {
        if ($id== '') {
            common::redirect();
        }
        
        $query=$this->db->query("select * from gallery_images  where gallary_id in('$id')");
        $row=$query->result_array();
        foreach($row as $img){
        $this->mod_gallary->delete_file($id,$img['image_name']);
        }
        $this->db->query("delete from gallery_images  where gallary_id in('$id')");
        $this->db->query("delete from image_gallery  where gallary_id in('$id')");
        $this->session->set_flashdata('msg', 'Content Deleted Successfully!');
        common::redirect();
    }

    function gallary_status($status,$id) {
        if ($id== '' || $status == '') {
            common::redirect();
        }
        $this->db->query("update image_gallery set gallary_status=$status where gallary_id in($id)");
        $this->session->set_flashdata('msg', 'Content Status Updated Successfully!');
        common::redirect();
    }

    function my_videos(){
       $data['nav_array'] = array(
            array('title' => 'Manage gallary', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Video Title','Video Description','Image','Status');
        $gridColumnModel = array(
            array("name" => "title",
                "index" => "title",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "description",
                "index" => "description",
                "width" => 100,
                "sortable" => false,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "image",
                "index" => "image",
                "width" => 80,
                "sortable" => false,
                "align" => "center",
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
        if ($_POST['search']){
            $gridObj->setGridOptions('Video Gallery', 900, 200, "id", "desc", $gridColumn, $gridColumnModel, site_url("?c=gallary&m=load_all_video&title={$_POST['title']}&date_from={$_POST['date_from']}&date_to={$_POST['date_to']}"), true);
        } else {
            $gridObj->setGridOptions('Video Gallery', 900, 200, "id", "desc", $gridColumn, $gridColumnModel, site_url('gallary/load_all_video'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'video_index';
        $data['page_title'] = 'Video Gallary';
        $this->load->view('main', $data);
    }

    function load_all_video(){
        $this->mod_gallary->get_all_video();
    }

    function new_video(){
      if ($_POST['save']) {
            if ($this->form_validation->run('valid_video')) {
                $this->mod_gallary->save_video(); //Don't Change
                $this->session->set_flashdata('msg', 'Content Added Successfully');
                redirect('gallary/my_videos');
            }
        }

        $data['nav_array'] = array(
            array('title' => 'Manage video gallary', 'url' => site_url('gallary/my_videos')),
            array('title' => 'Add New Video', 'url' => '')
        );
        $this->session->unset_userdata('edit_video_id'); //Don't Change
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['editor']=TRUE;
        $data['page'] = 'video_form'; //Don't Change
        $data['page_title'] = 'Add New Video';
        $data['action'] = 'gallary/new_video';
        $this->load->view('main', $data);
    }

    function video_status($status='', $id='') {
        $this->db->query("update video_files set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', 'Status Changed Successfully');
        redirect("gallary/my_videos");
    }

    function delete_video($id=''){
        if ($id == ''){
            redirect('gallary/my_videos');
        }
        sql::delete("video_files", "id=$id");
        $this->session->set_flashdata('msg', 'Category Deleted Successfully!!!');
        redirect('gallary/my_videos');

    }

    function edit_video($id=''){
       if ($_POST['save']) {
            if ($this->form_validation->run('valid_video')) {
                $this->mod_gallary->update_video(); //Don't Change
                $this->session->set_flashdata('msg', 'Content Updated Successfully');
                redirect('gallary/my_videos');
            }
        }

        $data['nav_array'] = array(
            array('title' => 'Manage video gallary', 'url' => site_url('gallary/my_videos')),
            array('title' => 'Edit Video', 'url' => '')
        );
        $this->session->unset_userdata('edit_video_id'); //Don't Change
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['editor']=TRUE;
        $data['page'] = 'video_form'; //Don't Change
        $data['page_title'] = 'Edit Video';
        $data['action'] = 'gallary/edit_video/'.$id;
        $this->load->view('main', $data);
    }

}

?>
