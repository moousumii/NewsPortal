<?php
class reporter extends Controller {
    function  __construct() {
        parent::Controller();
        $this->load->model('mod_reporter');
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
        $gridObj->setGridOptions("Reporter List", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url("reporter/load_all_reporter"), true);
        $data['grid_data'] = $gridObj->getGrid();
        $data['nav_array'] = array(
            array('title' => 'Reporter List', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'reporter';
        $data['page'] = 'index';
        $this->load->view('main', $data);

    }
    function load_all_reporter(){
        $this->mod_reporter->get_all_reporter();
      }


      function add_reporter(){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_reporter')){
                $this->mod_reporter->add_reporter();
                $this->session->set_flashdata('msg','Reporter added Successfully!!!');
                redirect('reporter');
            }
        }
        $data['action'] = 'reporter/add_reporter';
        $data['dir'] = 'reporter';
        $data['page'] = 'add_reporter_form';
        $this->load->view('main', $data);
    }

    function edit_reporter($id=''){
        if ($_POST['save']){
            if ($this->form_validation->run('valid_reporter')){
                $this->mod_reporter->update_reporter($id);
                $this->session->set_flashdata('msg','Reporter Updated Successfully!!!');
                redirect('reporter');
            }
        }
        $data['reporter_data']=sql::row("reporter","id=$id");
        $data['action'] = 'reporter/edit_reporter/'.$id;
        $data['dir'] = 'reporter';
        $data['page'] = 'add_reporter_form';
        $this->load->view('main', $data);
    }

    function delete_reporter($id=''){
        if ($id == ''){
            redirect('reporter');
        }
        sql::delete("reporter", "id=$id");
        $this->session->set_flashdata('msg', 'reporter Deleted Successfully!!!');
        redirect('reporter');

    }

    function status_update($status='', $id=''){
        $this->db->query("update reporter set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', 'reporter Status Changed Successfully');
        redirect("reporter");
    }
}
?>
