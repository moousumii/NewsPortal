<?php

class mod_ads extends Model {

    function __construct() {
        parent::Model();
    }
     function get_ads_grid() {

        $sortname = common::getVar('sidx', 'ads_title');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";

        $searchField = common::getVar('searchField');
        $searchValue = common::getVar('searchValue');
        $status = $_REQUEST['status'];
        $con = '1';
        
		
		if ($searchField != '' && $searchValue != '') {
            $con.=" and $searchField like '%$searchValue%'";
        }

        if ($status != '') {
            if ($status == '00') {
                $status = 0;
            }
            $con.=" and status like '%$status%'";
        }
        $sql = "select * from ads where $con $sort";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');

        $count = sql::count('ads', $con);
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 5;
        }
        if ($page > $total_pages)
            $page = $total_pages;

        if ($limit < 0)
            $limit = 0;
        $start = $limit * $page - $limit;
        if ($start < 0)
            $start = 0;

        $sql_query = $this->db->query($sql . " limit $start, $limit");
        $rows = $sql_query->result_array();

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;

		
		$responce = new stdClass();
        
		$responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        foreach ($rows as $row) {
            $status = $row[status] == 1 ? 'Active' : 'Inactive';
            $responce->rows[$i]['id'] = $row['ads_id'];
			
			$img = "<img src='../uploads/ads/".$row['ads_image']."' >";
			//$img = "<img src='../uploads/ads/1877605623_1496792863.jpg'>";
		
			
            $responce->rows[$i]['cell'] = array($row['ads_title'], $this->get_position_name($row['ads_position']), $row['ads_url'],  $img, $row['start_date'], $row['expire_date']);
            $i++;
        }
		
		
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Md. Anwar Hossain");
        header("Email: anwarworld@gmail.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }
   
   
   
   /*  function save_ads() {
        $file_name = '';
        if ($_FILES['ads_image']['name'] != '' && $_POST['ads_type'] == 1) {
            $file_name = $this->add_image();
        } elseif ($_FILES['ads_image']['name'] != '' && $_POST['ads_type'] == 2) {
            $file_name = $this->add_flash();
        }
        $url = prep_url($_POST['ads_url']);
        $sql = "insert into ads set
				ads_title={$this->db->escape($_POST['ads_title'])},
				ads_url={$this->db->escape($url)},
				ads_type={$this->db->escape($_POST['ads_type'])},
				ads_image='$file_name',
				ads_code={$this->db->escape($_POST['ads_code'])},
				ads_position={$this->db->escape($_POST['ads_position'])},
				ads_sort = '0',
				start_date = {$this->db->escape($_POST['start_date'])},
				expire_date = {$this->db->escape($_POST['expire_date'])}
				
				";
        $this->db->query($sql);
        return $this->db->insert_id();
    } */
	
	
	
	 function save_ads() {
        $file_name = '';
        if ($_FILES['ads_image']['name'] != '') {
            $file_name = $this->add_image();
        } 
		
        $url = prep_url($_POST['ads_url']);
        $sql = "insert into ads set
				ads_title={$this->db->escape($_POST['ads_title'])},
				ads_url={$this->db->escape($url)},
				ads_type={$this->db->escape($_POST['ads_type'])},
				ads_image='$file_name',
				ads_code={$this->db->escape($_POST['ads_code'])},
				ads_position={$this->db->escape($_POST['ads_position'])},
                ads_sort = '0',
				status = '1',
				start_date = {$this->db->escape($_POST['start_date'])},
				expire_date = {$this->db->escape($_POST['expire_date'])}
				
				";
        $this->db->query($sql);
        return $this->db->insert_id();
    }
	
	
	

  /*   function update_ads() {
        $ads_id = $this->session->userdata('ads_id');
        /* if($_FILES['ads_image']['name']!=''){
          $image=$this->add_image($_POST['h_image']);
          }else{
          $image=$_POST['h_image'];
          } */
        /*$file_name = '';
        if ($_FILES['ads_image']['name'] != '' && $_POST['ads_type'] == 1) {
            $file_name = $this->add_image($_POST['h_image']);
        } elseif ($_FILES['ads_image']['name'] != '' && $_POST['ads_type'] == 2) {
            $file_name = $this->add_flash($_POST['h_image']);
        } else {
            $file_name = $_POST['h_image'];
        }

        $url = prep_url($_POST['ads_url']);
        $sql = "update ads set
				ads_title={$this->db->escape($_POST['ads_title'])},
				ads_url={$this->db->escape($url)},
				ads_image='$file_name',
				ads_type={$this->db->escape($_POST['ads_type'])},
				ads_position={$this->db->escape($_POST['ads_position'])},
				ads_code={$this->db->escape($_POST['ads_code'])}
				where ads_id=$ads_id";
        return $this->db->query($sql);
    } */

	

	    function update_ads() {
        $ads_id = $this->session->userdata('ads_id');
        
        $file_name = '';
        
		if ($_FILES['ads_image']['name'] != '') {
            $file_name = $this->add_image($_POST['ads_image']);
        } 
		
		/* elseif ($_FILES['ads_image']['name'] != '' && $_POST['ads_type'] == 2) {
            $file_name = $this->add_flash($_POST['ads_image']);
        }  */
		
		else {
            $file_name = $_POST['ads_image'];
        }

        $url = prep_url($_POST['ads_url']);
        
		$sql = "update ads set
				ads_title={$this->db->escape($_POST['ads_title'])},
				ads_url={$this->db->escape($url)},
				
				ads_image='$file_name',
				
				ads_position={$this->db->escape($_POST['ads_position'])},
				ads_sort = '0',
				start_date = {$this->db->escape($_POST['start_date'])},
				expire_date = {$this->db->escape($_POST['expire_date'])}
			
				
				where ads_id=$ads_id";
        
		return $this->db->query($sql);
    } 
	
	
	
    function ads_position($sel='') {
        $arr = array('PL626' => 'Page Left Ads[ width X Height = (626 X 72)]');
        $opt = '<option value="">Select Ads Position</option>';
        foreach ($arr as $k => $val) {
            if ($k == $sel) {
                $opt.="<option value='$k' selected='selected'>$val</option>";
            }
            else
                $opt.="<option value='$k'>$val</option>";
        }
        return $opt;
    }
   

   /*  function get_position_name($position_code=''){
        
		$arr = array('PL150' => 'Page Left Ads[ width X Height = (150 X Height)]');
        //return $position_code;
        foreach ($arr as $key=>$val){
            if($key==$position_code){
                return $val.'Anwar';
            }
        }
    } 
	 */
	
	
	
     function get_position_name($position_code){
        
        
		$sql = $this->db->query("select distinct(p.position_name)  from ads a, ads_position p where a.ads_position = p.position_id and a.ads_position='$position_code'");
		
		foreach ($sql->result() as $row)
				return $row -> position_name;
    } 
	
	
    function ads_type($sel='') {
        $arr = array('1' => 'JPG / GIF Image Ads', '2' => 'Flash Ads', '3' => 'HTML Ads', '4' => 'JavaScript / Google Ads');
        $opt = '<option value="">Select Ads Type</option>';
        foreach ($arr as $k => $val) {
            if ($k == $sel) {
                $opt.="<option value='$k' selected='selected'>$val</option>";
            }
            else
                $opt.="<option value='$k'>$val</option>";
        }
        return $opt;
    }

    function add_image($pre_image='') {
        $img = "";
        $param['dir'] = UPLOAD_PATH . "ads/";
        $param['type'] = IMG_EXT;
        $this->load->library('zupload', $param);
        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile('n' . $pre_image);
        }
        $this->zupload->setFileInputName("ads_image");
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();
        
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }

        $this->zthumb->createThumb($img, "left_" . $img, $param['dir'], $param['dir'], 626, 72, true);

        return $img;
    }

    function add_flash($pre_file) {
        $flash = "";
        $param['dir'] = UPLOAD_PATH . "ads/";
        $param['type'] = 'swf';
        $this->load->library('zupload', $param);
        if ($pre_file != "") {
            $this->zupload->delFile($pre_file);
        }
        $this->zupload->setFileInputName("ads_image");
        $this->zupload->upload(true);
        $flash = $this->zupload->getOutputFileName();

        return $flash;
    }

    function isValidType($type, $file_name) {
        $ext = strtolower($this->get_extension($file_name));
        $type = strtolower($type);
        $valid_type = explode('|', $type);
        foreach ($valid_type as $type) {
            if ($type == $ext) {
                return true;
            }
        }
        return false;
    }

    function get_extension($filename) {
        $x = explode('.', $filename);
        return '.' . end($x);
    }

    function updateAdsSort() {
        $i = 0;
        while ($i < count($_POST['ads_id'])) {
            $sql = "update ads set
                ads_sort={$this->db->escape($_POST['sort'][$i])}
                where ads_id={$_POST['ads_id'][$i]}";
            $this->db->query($sql);
            $i++;
        }
        return true;
    }

    function showAds() {
        $i = 0;
        if (count($_POST['ads_id']) > 0) {
            foreach ($_POST['ads_id'] as $ads_id) {

                if ($ads_id == $_POST['st_ads_id'][$i]) {
                    $this->db->query("update ads set status='enabled' where ads_id=$ads_id");
                    //common::change_status('news',"news_id=$news_id",'disabled');
                    $i++;
                } else {
                    $this->db->query("update ads set status='disabled' where ads_id=$ads_id");
                    //common::change_status('news',"news_id=$news_id",'enabled');
                }
            }
        }
    }
    
    function get_search_options($sel='') {
        $arr = array(
            'ads_title' => 'Ads Title','ads_url'=>'Ads URL'
        );
        $opt = '';
        foreach ($arr as $key => $value) {
            if ($sel == $key) {
                $opt.="<option value='$key' selected='selected'>$value</option>";
            } else {
                $opt.="<option value='$key'>$value</option>";
            }
        }
        return $opt;
    }
	
	
	function edit_an_ad($ads_id){
		
		$sql = $this -> db -> query("select ads.*, ap.* from ads, ads_position ap where ads_id=$ads_id and ads.ads_position = ap.position_id");
		
		return $sql -> row_array();
	}
		
}
?>