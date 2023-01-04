<?php
 class mod_blog extends Model{
     public function __construct() {
         parent::Model();
     }
     function get_all_blog(){
         $sortname = common::getVar('sidx', 'blog_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "1";
        $sql="select * from blog order by blog_id desc";
//        $sql = "select user.user_username,user.user_id,blog.* from blog
//                join user on blog.user_id=user.user_id
//                where 1 limit 0,10";
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
            $status=$row['blog_status']==1?'Active':'Inactive';
            //$language=$row['language']==1?'Bangla':'English';
            $responce->rows[$i]['id'] = $row['blog_id'];
            $responce->rows[$i]['cell'] = array($row['blog_id'],$row['title'],$row['blog_description'],$status);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';

     }

     function add_blog(){
        $id=$this->session->userdata('user_id');
        $sql = "insert into blog set
        title={$this->db->escape($_POST['title'])},
        blog_description={$this->db->escape($_POST['description'])},
        language_id={$this->db->escape($_POST['language_id'])},
        date={$this->db->escape($_POST['blog_date'])},
        blog_status=1,
        user_id=$id
        ";
        return $this->db->query($sql);
    }

    function update_blog($blog_id=''){
        $sql = "update blog set
        title={$this->db->escape($_POST['title'])},
        blog_description={$this->db->escape($_POST['description'])},
        language_id={$this->db->escape($_POST['language_id'])},
        date={$this->db->escape($_POST['blog_date'])}
        where blog_id=$blog_id";
        return $this->db->query($sql);
    }
 }
?>
