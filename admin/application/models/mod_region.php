<?php
 class mod_region extends Model{
     public function __construct() {
         parent::Model();
     }
     function get_all_region(){
         $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "1";
        $sql = "select * from region where $con $sort ";
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
            $language=$row['language']==1?'Bangla':'English';
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['id'],$row['name'],$language,$status);
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

     function add_region(){
        $sql = "insert into region set
        name={$this->db->escape($_POST['name'])},
        language={$this->db->escape($_POST['language'])},
        status=1
        ";
        return $this->db->query($sql);
    }

    function update_region($id=''){
        $sql = "update region set
        name={$this->db->escape($_POST['name'])},
        language={$this->db->escape($_POST['language'])}
        where id=$id
        ";
        return $this->db->query($sql);
    }
 }
?>
