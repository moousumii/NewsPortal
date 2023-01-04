<?php
 class mod_user_block extends Model{
     public function __construct() {
         parent::Model();
     }
     function get_all_user(){
        $sortname = common::getVar('sidx', 'blog_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "1";
        $sql="select * from user order by user_id desc";
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
            $status=$row['user_status']==1?'Active':'Inactive';
            //$language=$row['language']==1?'Bangla':'English';
            $responce->rows[$i]['id'] = $row['user_id'];
            $responce->rows[$i]['cell'] = array($row['user_id'],$row['user_username'],$status);
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
 }
?>
