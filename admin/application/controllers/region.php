<?php
class region extends Controller {
    function  __construct() {
        parent::Controller();
        $this->load->model('mod_region');
    }
    function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridObj->cellEdit = true;
        $gridColumn = array('ID', 'Name','language','Status');
        $gridColumnModel = array(
            array("name" => "id",
                "index" => "id",
                "width" => 150,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "neme",
                "index" => "name",
                "width" => 150,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "language",
                "index" => "language",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => FALSE
            )
        );
        $gridObj->setGridOptions("Region List", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url("region/load_all_region"), true);
        $data['grid_data'] = $gridObj->getGrid();
        $data['nav_array'] = array(
            array('title' => 'Region List', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'region';
        $data['page'] = 'index';
        $this->load->view('main', $data);

    }
    function load_all_region(){
        $this->mod_region->get_all_region();
      }


      function add_region(){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_region')){
                $this->mod_region->add_region();
                $this->session->set_flashdata('msg','region added Successfully!!!');
                redirect('region');
            }
        }
        $data['action'] = 'region/add_region';
        $data['dir'] = 'region';
        $data['page'] = 'add_region_form';
        $this->load->view('main', $data);
    }

    function edit_region($id=''){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_region')){
                $this->mod_region->update_region($id);
                $this->session->set_flashdata('msg','Region Updated Successfully!!!');
                redirect('region');
            }
        }
        $data['region_data']=sql::row("region","id=$id");
        $data['action'] = 'region/edit_region/'.$id;
        $data['dir'] = 'region';
        $data['page'] = 'add_region_form';
        $this->load->view('main', $data);
    }

    function delete_region($id=''){
        if ($id == ''){
            redirect('region');
        }
        sql::delete("region", "id=$id");
        $this->session->set_flashdata('msg', 'Region Deleted Successfully!!!');
        redirect('region');

    }

    function status_update($status='', $id=''){
        $this->db->query("update region set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', 'Region Status Changed Successfully');
        redirect("region");
    }
}
?>
