<?php
/*
 * @author Holy
 */
class mod_news extends Model{
    
    public function Model() {
        parent::Model();
    }

    function get_all_news_category(){
        $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
//        $con = " where 1 and user_name<>'admin'";
//        if ($_REQUEST['name'])
//            $con.=" and user_name like '%$_REQUEST[name]%' or first_name like '%$_REQUEST[name]%' or last_name like '%$_REQUEST[name]%'";
//        if ($_REQUEST['status']!="")
//            $con.=" and status='$_REQUEST[status]'";
        $sql = "select * from news_category $con $sort";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $tmp = $this->db->query($sql);
        $count = count($tmp->result_array());
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
		$responce = new stdClass();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {

            if ($row['parent_id'] != '0') {
                $data = sql::row('news_category', 'id=' . $row['parent_id']);
                $category_name = $data['category_name'] . '->' . $row['category_name'];
            } else {
                $category_name = $row['category_name'];
            }
            $status=$row['status']==1?'Active':'Inactive';
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($category_name,$status);
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

    function get_category_option($sel=''){
        $opt = '<option value=' . "0" . ' >Main  Category' . '</option>';
        $data = sql::rows('news_category', 'status=' . '1 and parent_id=' . "0");
        foreach ($data as $val) {
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['category_name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['category_name'] . '</option>';
            }
        }
        return $opt;
    }

    function add_news_category(){
        $sql = "insert into news_category set
        parent_id={$this->db->escape($_POST['parent_id'])},
        category_name={$this->db->escape($_POST['category_name'])},
        status=1
        ";
        return $this->db->query($sql);
    }

    function update_news_category($id=''){
        $sql = "update news_category set
        parent_id={$this->db->escape($_POST['parent_id'])},
        category_name={$this->db->escape($_POST['category_name'])}
        where id=$id
        ";
        return $this->db->query($sql);
    }
/*------------------------------------------------------------------------------------------*/
    function get_all_news(){
        $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = " where news_category.status=1";
//        if ($_REQUEST['name'])
//            $con.=" and user_name like '%$_REQUEST[name]%' or first_name like '%$_REQUEST[name]%' or last_name like '%$_REQUEST[name]%'";
//        if ($_REQUEST['status']!="")
//            $con.=" and status='$_REQUEST[status]'";
        $sql = "select news.*, news_category.category_name,reporter.reporter_name,region.name from news
                left join news_category on news_category.id=news.category_id
                left join reporter on news.reporter_id=reporter.id
                left join region on news.region_id=region.id
                $con $sort";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $tmp = $this->db->query($sql);
        $count = count($tmp->result_array());
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
		$responce = new stdClass();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $status=$row['status']==1?'Active':'Inactive';
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['category_name'],$row['headline'],strip_tags($row['description']),$row['reporter_name'],$row['name'],$row['news_date'],$status);
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

   function sub_category_option($sel='') {
            $sub_cats = sql::rows('news_category', "status=1");
                foreach ($sub_cats as $category) {
                    if ($category['id'] == $sel) {
                        $opt.="<option value='{$category['id']}' selected='selected'>{$category['category_name']}</option>";
                    } else {
                        $opt.="<option value='{$category['id']}'>{$category['category_name']}</option>";
                    }
                }
         
        return $opt;
    }

    function get_reporter_name($sel=''){
        $opt = '<option value="" >Select Reporter' . '</option>';
        $data = sql::rows('reporter', 'status=1');
        foreach ($data as $val) {
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['reporter_name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['reporter_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_region_option($sel=''){
        $opt = '<option value="" >Select Region' . '</option>';
        $data = sql::rows('region', 'status=1');
        foreach ($data as $val) {
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_position_option($sel=''){
        $opt = '<option value="" >Select Image Position' . '</option>';
        $data = sql::rows('image_position', 'status=1');
        foreach ($data as $val) {
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['image_position'] .' ('.$val['image_size'] .')'. '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['image_position'] .' ('.$val['image_size'] .')'. '</option>';
            }
        }
        return $opt;
    }

    function add_news(){
        $file = 'image';
        $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }
       $sql = "insert into news set
        category_id={$this->db->escape($_POST['category_id'])},
        headline={$this->db->escape($_POST['headline'])},
        description={$this->db->escape($_POST['description'])},
        reporter_id={$this->db->escape($_POST['reporter_id'])},
        news_date={$this->db->escape($_POST['news_date'])},
        position_id={$this->db->escape($_POST['position_id'])},
        image='$image',
        status=1
        ";
        return $this->db->query($sql);
    }

    function add_image($file='', $pre_image=''){

        $param['dir'] = UPLOAD_PATH."news/";
        $param['type'] = IMG_EXT;

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'news/');
        } else {
            $this->load->library('zupload', $param);
        }

        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("thumb_" . $pre_image);
            $this->zupload->delFile("full_" . $pre_image);

        }
        
        $position_id=  $this->session->userdata('position_id');

        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();



        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }

        $this->zthumb->createThumb($img, "thumb_" . $img, $param['dir'], $param['dir'], 120, 70, false);
        $this->zthumb->createThumb($img, "full_" . $img, $param['dir'], $param['dir'], 305, 179, false);
        return $img;
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


    function update_news($id='',$image=''){
        $file = 'image';
       // $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }

       $sql = "update news set
        category_id={$this->db->escape($_POST['category_id'])},
        headline={$this->db->escape($_POST['headline'])},
        description={$this->db->escape($_POST['description'])},
        reporter_id={$this->db->escape($_POST['reporter_id'])},
        news_date={$this->db->escape($_POST['news_date'])},
        position_id={$this->db->escape($_POST['position_id'])},
        image='$image' where id=$id ";
        return $this->db->query($sql);
    }

    function get_news_type_option($sel=''){
        $opt = '<option value="" >Select News Type' . '</option>';
        $data = sql::rows('news_type', 'status=1');
        foreach ($data as $val) {
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['news_type_name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['news_type_name'] . '</option>';
            }
        }
        return $opt;
    }
}
?>
