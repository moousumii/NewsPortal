<?php 
/**
 * Description of ads
 *
 * @author anwar
 */
class ads extends Controller {
    private $dir='ads';
    function ads() {
        parent::Controller();
        $this->load->model('mod_ads');
        $this->load->library('upload');
        common::is_logged();
    }
    function index() {
        if($_POST['set']) {
            $this->mod_ads->updateAdsSort();
            $this->session->set_flashdata('msg','Ads Sorted Successfully!');
            common::redirect();
        }

        if($_POST['publish']) {
            $this->mod_ads->showAds();
            $this->session->set_flashdata('msg','Selected Ads is Shown!');
            common::redirect();
        }

        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array(lang('label_ads_title'),lang('label_ads_position'), lang('label_ads_url'),'Ads Image','Start Date','Expire Date');
        $gridColumnModel = array(
            array("name" => "ads_title",
                "index" => "ads_title",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
             array("name" => "ads_position",
                "index" => "ads_position",
                "width" => 40,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "ads_url",
                "index" => "ads_url",
                "width" => 60,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            
            
            ),
			array("name" => "ads_image",
                "index" => "ads_image",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
			array("name" => "start_date",
                "index" => "start_date",
                "width" => 30,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
			array("name" => "expire_date",
                "index" => "expire_date",
                "width" => 30,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
			
        );
        if ($_POST['apply_filter']) {
            $gridObj->setGridOptions(lang('menu_manage_ads'), 880, 200, "ads_title", "asc", $gridColumn, $gridColumnModel, site_url("?c=ads&m=load_ads&searchField={$_POST['searchField']}&searchValue={$_POST['searchValue']}&status={$_POST['status']}"), true);
        } else {
            $gridObj->setGridOptions(lang('menu_manage_ads'), 880, 200, "ads_title", "asc", $gridColumn, $gridColumnModel, site_url('ads/load_ads'), true);
        }
        $data['grid_data'] = $gridObj -> getGrid();
        
        $data['nav_array']=array(
                array('title'=>lang('menu_manage_ads'),'url'=>'')
        );
        $data['msg']=$this->session->flashdata('msg');
        $data['dir']=$this->dir;
        $data['page']='index';
        $data['page_title']=lang('menu_manage_ads');
        $this->load->view('main',$data);
    }
    
	
	function load_ads(){
        $this->mod_ads->get_ads_grid();
    }
	
	
     function new_ads_stopped() {
       
        $error_msg='';
        if($_POST['save']) {
             if($this->form_validation->run('valid_ads')) {

                if($_POST['ads_type'] ==1 && !$this->mod_ads->isValidType('.jpg|.gif',$_FILES['ads_image']['name'])) {
                    $error_msg = 'Please select a JPG/GIF file for this type of add.';
                }
                else if($_POST['ads_type'] ==2 && !$this->mod_ads->isValidType('.swf',$_FILES['ads_image']['name'])) {

                    $error_msg = 'Please select a Flash( .swf) file for this type of add.';
                }
                else if($_POST['ads_type'] ==3 && trim($_POST['ads_code'])=='') {
                    $error_msg = 'Please insert some HTML in the text field for this type of add.';
                }
                else if($_POST['ads_type'] ==4 && trim($_POST['ads_code'])=='') {
                    $error_msg = 'Please insert JavaScript / Google Code in the text field for this type of add.';
                } 
                else {
                    $this->mod_ads->save_ads(); //Don't Change
                    $this->session->set_flashdata('msg',lang('msg_add_success'));
                    redirect('ads');
                }
            }
        }

        $data['nav_array']=array(
                array('title'=>lang('menu_manage_ads'),'url'=>site_url('ads')),
                array('title'=>lang('menu_new_ads'),'url'=>'')
        );
        $data['msg']=$this->session->flashdata('msg');
        $data['dir']=$this->dir;
        $data['error_msg'] = $error_msg;
        $data['page']='new_ads'; //Don't Change
        $data['page_title']=lang('menu_new_ads');
        $this->load->view('main',$data);
    }
	 
	
	
	function new_ads() {
       
        //$error_msg='';
        if($_POST['save']) {
            //print_r($_POST); exit;
         
                    $this->mod_ads->save_ads(); //Don't Change
                    $this->session->set_flashdata('msg',lang('msg_add_success'));
                    redirect('ads');
                }
            
        

        $data['nav_array']=array(
                array('title'=>lang('menu_manage_ads'),'url'=>site_url('ads')),
                array('title'=>lang('menu_new_ads'),'url'=>'')
        );
        $data['msg']=$this->session->flashdata('msg');
        $data['dir']=$this->dir;
        $data['error_msg'] = $error_msg;
        $data['page']='new_ads'; //Don't Change
        $data['page_title']=lang('menu_new_ads');
        $this->load->view('main',$data);
    }
	
	
	
	
	
	
	
/*     function edit_ads($ads_id='') {
        if($ads_id==''||!is_numeric($ads_id)) {
            redirect('ads');
        }
        if($_POST['update']) {
            if($this->form_validation->run('valid_ads')) {
                if(($_POST['ads_type'] ==1 && $_FILES['ads_image']['name'] !='' && !$this->mod_ads->isValidType('.jpg|.gif',$_FILES['ads_image']['name'])) || ($_POST['ads_type'] ==1 && $_FILES['ads_image']['name'] =='' && !$this->mod_ads->isValidType('.jpg|.gif',$_POST['h_image']))) {
                    $error_msg = 'Please select a JPG/GIF file for this type of add.';
                }
                elseif(($_POST['ads_type'] ==2 && $_FILES['ads_image']['name'] !='' && !$this->mod_ads->isValidType('.swf',$_FILES['ads_image']['name'])) || ($_POST['ads_type'] ==2 && $_FILES['ads_image']['name'] =='' && !$this->mod_ads->isValidType('.swf',$_POST['h_image']))) {

                    $error_msg = 'Please select a Flash( .swf) file for this type of add.';
                }
                elseif($_POST['ads_type'] ==3 && trim($_POST['ads_code'])=='') {
                    $error_msg = 'Please insert some HTML in the text field for this type of add.';
                }
                elseif($_POST['ads_type'] ==4 && trim($_POST['ads_code'])=='') {
                    $error_msg = 'Please insert JavaScript / Google Code in the text field for this type of add.';
                }
                else {
                    $this->mod_ads->update_ads(); //Don't Change
                    $this->session->set_flashdata('msg',lang('msg_update_success'));
                    redirect('ads');
                }
            }
        }
        $data=sql::row('ads',"ads_id=$ads_id");
        $this->session->set_userdata('ads_id',$data['ads_id']); //Don't Change
        $data['nav_array']=array(
                array('title'=>lang('menu_manage_ads'),'url'=>site_url('ads')),
                array('title'=>  lang('menu_edit_ads'),'url'=>'')
        );
        $data['dir']=$this->dir;
        $data['page']='edit_ads'; //Don't Change
        $data['page_title']=lang('menu_edit_ads');
        $data['error_msg'] = $error_msg;
        $this->load->view('main',$data);
    } */
	
	
	
	
	
	
	    function edit_ads($ads_id='') {
        if($ads_id==''||!is_numeric($ads_id)) {
            redirect('ads');
        }
		
        if($_POST['update']) {
            if($this->form_validation->run('edit_ads')) {
                
                    $this->mod_ads->update_ads(); //Don't Change
                    $this->session->set_flashdata('msg',lang('msg_update_success'));
                    redirect('ads');
			}
		}
            
        
        //$data=sql::row('ads',"ads_id=$ads_id");
		$data = $this -> mod_ads -> edit_an_ad($ads_id); 
        $this->session->set_userdata('ads_id',$data['ads_id']); //Don't Change
        
		$data['nav_array']=array(
                array('title'=>lang('menu_manage_ads'),'url'=>site_url('ads')),
                array('title'=>  lang('menu_edit_ads'),'url'=>'')
        );
        $data['dir']=$this->dir;
        $data['page']='edit_ads'; //Don't Change
        $data['page_title']=lang('menu_edit_ads');
        $data['error_msg'] = $error_msg;
        $this->load->view('main',$data);
    }
	
	
	
	
	

	
	
	
    function delete_ads($ads_id='') {
        if($ads_id==''||!is_numeric($ads_id)) {
           common::redirect();
        }
        $file=sql::row("ads","ads_id=$ads_id");
        $param['dir']=UPLOAD_PATH."ads/";
        $param['type']=IMG_EXT;
        $this->load->library('zupload',$param);
        $this->zupload->delFile($file['ads_image']);
        $this->zupload->delFile("n".$file['ads_image']);

        sql::delete('ads',"ads_id=$ads_id");
        $this->session->set_flashdata('msg','Successfully Deleted!!!');
        common::redirect();
    }
    function ads_status($status='enabled',$ads_id='') {
        if($ads_id==''||!is_numeric($ads_id)) {
            redirect('ads');
        }
        common::change_status('ads','ads_id='.$ads_id,$status);
        $this->session->set_flashdata('msg',lang('msg_status_success'));
        common::redirect();
    }
	function ad_image_check(){
		$str = $_POST['user_name'];
      if($_FILES['ads_image']['name']==""){
		   $this->form_validation->set_message('ad_image_check', 'Please select photo to upload');
            return FALSE;
	  }
         else {
            return TRUE;
        }
	}
}?>