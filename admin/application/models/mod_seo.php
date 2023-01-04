<?php

class mod_seo extends Model{

    public function __construct() {
        parent::Model();
    }


   function get_all_seo(){
        $sortname = common::getVar('sidx', 'controller_name');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "1";

        $sql = "select * from seo where $con $sort ";
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
            //$status=$row['status']==1?'Active':'Inactive';
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['controller_name'],$row['title'],$row['meta_tag'],$row['meta_keyword'],$row['meta_description']);
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

    function add_seo(){
         
        $data = array(
            'controller_name'=>$_POST['controller_name'],
            'title'=>$_POST['title'],
            'meta_tag'=>$_POST['meta_tag'],
            'meta_keyword'=>$_POST['meta_keyword'],
            'meta_description'=>$_POST['meta_description']
          
        );

        $this->db->insert("seo", $data);
        return true;


    
    }

    function update_seo(){
        $id = $this->session->userdata('edit_seo_id');
        //$bd=sql::row('album',"album_id='$album_id'");

        $data = array(
            'controller_name'=> $_POST['controller_name'],
            'title'=>$_POST['title'],
            'meta_tag'=>$_POST['meta_tag'],
            'meta_keyword'=>$_POST['meta_keyword'],
            'meta_description'=>$_POST['meta_description']

        );

        $this->db->update("seo", $data, array("id" => $id));
        return true; 

    }

   function delete_seo($id) {
        $sql = "delete from seo where id=$id";
        return $this->db->query($sql);
    }

}

?>
