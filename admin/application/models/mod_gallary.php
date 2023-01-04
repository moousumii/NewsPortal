<?php

/**
 * Description of mod_gallary
 */
class mod_gallary extends Model {
    function __construct() {
        parent::__construct();
    }
    function get_all_gallary() {
        $sortname = common::getVar('sidx', 'gallary_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
		if($_REQUEST['gallary_title'])
			$con.=" and gallary_title like '%$_REQUEST[gallary_title]%'";
		if($_REQUEST['date_from']&&$_REQUEST['date_to'])
			$con.=" and create_date between '$_REQUEST[date_from]' and '$_REQUEST[date_to]'";
        $sql = "select * from image_gallery where 1 $con $sort";
		
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $query = $this->db->query($sql);
        $count = count($query->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
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
        $i = 0;
		$responce = new stdClass();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $status = $row[gallary_status] == 1 ? 'Active' : 'Inactive';
            $responce->rows[$i]['id'] = $row['gallary_id'];
			if($row['gallary_profile_image']!=""){
				$pimage="<img src='".base_url().UPLOAD_PATH.'gallary/'.$row['gallary_id']."/thumb/160_140_".$row['gallary_profile_image']."' width=80>";
			}
			else{
				$pimage="N/A";
			}
			$count_image=sql::count("gallery_images","gallary_id={$row[gallary_id]}");
            $responce->rows[$i]['cell'] = array($row['gallary_title'],$pimage,$count_image,$row['create_date'], $status);
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
    function save_gallary() {
        $user_id = $this->session->userdata('user_id');
        $insdata = array(
            'user_id' => $user_id,
            'gallary_title' => $_POST['gallary_title'],
            'create_date' => date('Y-m-d')
        );
        $this->db->insert('image_gallery', $insdata);
		$gallary_id=$this->db->insert_id();
		$k=1;
		if($_REQUEST['num_image']>0){
			for($i=1;$i<=$_REQUEST['num_image'];$i++){
				if($_FILES['upload_file_'.$i]['name']!=""){
					 $file=$this->add_file($i,$gallary_id);
					if($k==1){
						$profile_image=$file;
						$k++;
					}
					$this->db->insert("gallery_images",array('image_name'=>$file,'gallary_id'=>$gallary_id));
				}
			}
		}
		if($profile_image)
			$this->db->update("image_gallery",array('gallary_profile_image'=>$profile_image),array('gallary_id'=>$gallary_id));
        return true;
    }
    
	function update_gallary() {
	$gallary_id= $this->session->userdata('edit_gallary_id', $data['gallary_id']);
        $data = array(
        'gallary_title' => $_POST['gallary_title'],
        'create_date' => date('Y-m-d')
        );
        $this->db->update('image_gallery', $data,array('gallary_id'=>$gallary_id));
		if($_REQUEST['num_image']>0){
			for($i=1;$i<=$_REQUEST['num_image'];$i++){
				if($_FILES['upload_file_'.$i]['name']!=""){
					$file=$this->add_file($i,$gallary_id);
					$this->db->insert("gallery_images",array('image_name'=>$file,'gallary_id'=>$gallary_id));
				}
			}
		}
		if(count($_REQUEST['del_photo'])>0){
			$image_id=implode(",",$_REQUEST['del_photo']);
			$query=$this->db->query("select * from  gallery_images where image_id in($image_id)");
			$image=$query->result_array();
			foreach($image as $img){
				$file_name=$img['image_name'];
				$img_id=$img['image_id'];
				$this->delete_file($gallary_id,$file_name);
				$this->db->query("delete  from  gallery_images where image_id='$img_id'");
			}
			
		}
        return true;
    }
	function save_profile_image($id=''){
		$img=sql::row("gallery_images","image_id=$_REQUEST[profile_photo]");
		$img_name=$img['image_name'];
		$this->db->update("image_gallery",array('gallary_profile_image'=>$img_name),array('gallary_id'=>$id));
		return $id;
	}

	function add_file($index,$title='') {
        $file_name = "";
		if($title)
			$param['dir'] = UPLOAD_PATH."gallary/".$title."/";
		else
			$param['dir'] = UPLOAD_PATH."gallary";
         
        $param['type'] = IMG_EXT;
        $this->load->library('zupload', $param);
        $this->zupload->setUploadDir($param['dir']);
        $this->zupload->setFileInputName("upload_file_".$index);
        $this->zupload->upload(true);
        $file_name = $this->zupload->getOutputFileName();
		 if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        $this->zthumb->createThumb($file_name, "160_140_" . $file_name, $param['dir'], $param['dir']."thumb/", 160, 140, true);
		$this->zthumb->createThumb($file_name, "600_500_" . $file_name, $param['dir'], $param['dir'], 600, 500, true);
        $this->zupload->delFile($file_name);
        return $file_name;
    }
	function delete_file($title,$file_name=''){
		$param['dir'] = UPLOAD_PATH."gallary/".$title."/";
		$this->load->library('zupload', $param);
        $this->zupload->setUploadDir($param['dir']);
        $this->zupload->delFile('600_500_'.$file_name);
        $this->zupload->setUploadDir($param['dir'].'thumb/');
        $this->zupload->delFile('160_140_'.$file_name);
	}

        function get_all_video(){
        $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
		if($_REQUEST['title'])
		$con.=" and title like '%$_REQUEST[title]%'";
		if($_REQUEST['date_from']&&$_REQUEST['date_to'])
		$con.=" and add_date between '$_REQUEST[date_from]' and '$_REQUEST[date_to]'";
        $sql = "select * from video_files where 1 $con $sort";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $query = $this->db->query($sql);
        $count = count($query->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
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
        $i = 0;
		$responce = new stdClass();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $status = $row[status] == 1 ? 'Active' : 'Inactive';
            $responce->rows[$i]['id'] = $row['id'];
			if($row['video_name']!=""){
			$pimage="<img src='".base_url().UPLOAD_PATH.'video/thumb/112_63_'.$row['video_name']."'>";
			}
			else{
			$pimage="N/A";
			}
			//$count_image=sql::count("gallery_images","gallary_id={$row[gallary_id]}");
            $responce->rows[$i]['cell'] = array($row['title'],strip_tags($row['description']),$pimage,$status);
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

        function delete_image($image_url){
        $param['dir'] = UPLOAD_PATH . "news/";
        $param['type'] = IMG_EXT;
        $this->load->library('zupload', $param);
        $this->zupload->delFile($image_url);
        $this->zupload->delFile("thumb_" . $image_url);
        $this->zupload->delFile("full_" . $image_url);
        return true;
    }


        function save_video(){
        $file = 'video_name';
        $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_video($file);
        }

       $sql = "insert into video_files set
        title={$this->db->escape($_POST['title'])},
        description={$this->db->escape($_POST['description'])},
        add_date={$this->db->escape($_POST['add_date'])},
        language_id={$this->db->escape($_POST['language_id'])},
        video_name='$image',
        status=1
        ";
        return $this->db->query($sql);
        }

        function add_video($file='', $pre_image=''){
 
        $param['dir'] = UPLOAD_PATH."video/";
        $param['type'] = VIDEO_EXT;

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'video/');
        } else {
            $this->load->library('zupload', $param);
        }

        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("thumb_" . $pre_image);

        }

        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();

//        if (!class_exists('zthumb')) {
//            $this->load->library('zthumb');
//        }
//
//        $this->zthumb->createThumb($img, "thumb_" . $img, $param['dir'], $param['dir'], 112, 63, false);
        //$this->zthumb->createThumb($img, "full_" . $img, $param['dir'], $param['dir'], 305, 179, false);
        return $img;


  }
  
  // Functions do not need to be inline with the rest of the code

  

    function update_video(){
       $file = 'video_name';
        $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_video($file);
        }

       $sql = "update video_files set
        title={$this->db->escape($_POST['title'])},
        description={$this->db->escape($_POST['description'])},
        add_date={$this->db->escape($_POST['add_date'])},
        language_id={$this->db->escape($_POST['language_id'])},
        video_name='$image' where id=$id
        ";
        return $this->db->query($sql);
    }

    
}

?>
