<?php
/**
 * Description of mod_store_notice
 *
 * @author HOLY
 */
class mod_store_notice extends Model{

    public function __construct() {
        parent::Model();
    }

    function load_all_notice(){
        $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
        $sql = "select* from notice order by id desc";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count("notice");
        if ($count > 0) {
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
        foreach ($rows as $row) {
            $status=$row['status'] == 1 ? 'Active' : 'Inactive';
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['title'],$row['description'],$status);
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

    function add_notice(){
        $sql = "insert into notice set
        title={$this->db->escape($_POST['title'])},
        description={$this->db->escape($_POST['description'])},
        status=1";
        $flag = $this->db->query($sql);
        return $flag;
    }
    
    function update_notice(){
        $id=$this->session->userdata('notice_id');
        $sql = "update notice set
        title={$this->db->escape($_POST['title'])},
        description={$this->db->escape($_POST['description'])}
        where id=$id";
        $flag = $this->db->query($sql);
        return $flag;
    }

    }
?>
