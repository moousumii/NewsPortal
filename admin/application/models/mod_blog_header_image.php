<?php

class mod_blog_header_image extends Model{

    public function __construct() {
        parent:: Model();
    }

    function get_all_image(){
      $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
        $sql = "select * from blog_header_image";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = count($query->result_array());
        if ($count > 0){
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 1;
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
		$responce = new stdClass();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row){
            $status = $row['status'] == 1 ? 'Active' : 'Inactive';
            $image = "<img src='../uploads/blog/" . $row['image'] . "' alt='image' style='width:64px;height:64px;'/>";
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['id'],$image,$status);
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

    function add_image($file='', $pre_image=''){

        $param['dir'] = UPLOAD_PATH."blog/";
        $param['type'] = IMG_EXT;

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'blog/');
        } else {
            $this->load->library('zupload', $param);
        }

        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("234_80_" . $pre_image);

        }
        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();



        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }

        //$this->zthumb->createThumb($img, "234_80_" . $img, $param['dir'], $param['dir'], 234, 80, false);
        return $img;
    }
//
//
//
//    function delete_image($image_url){
//        $param['dir'] = UPLOAD_PATH . "project/";
//        $param['type'] = FILE_TYPE;
//        $this->load->library('zupload', $param);
//        $this->zupload->delFile($image_url);
//        $this->zupload->delFile("234_80_" . $image_url);
//        return true;
//    }
//
    function save_image(){
        $file = 'image';
        $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }
//        echo $image;
//        exit();

        $data = array(
            'image' => $image,
            'status'=>'1'
        );

        $this->db->insert("blog_header_image", $data);
        return true;
    }

    function update_image($id=''){
        $file = 'image';
        $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }

        $data = array(
            'image' => $image,
            'status'=>'1'
        );

        $this->db->update("blog_header_image", $data,$data=array('id'=>$id));
        return true;
    }
}
?>
