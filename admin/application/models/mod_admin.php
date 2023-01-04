<?php
class mod_admin extends Model {
    function mod_admin() {
        parent::Model();
    }
    function get_adminGrid(){
        $sortname = common::getVar('sidx', 'user_name');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = " where 1 and user_name<>'admin'";
        if ($_REQUEST['name'])
            $con.=" and user_name like '%$_REQUEST[name]%' or first_name like '%$_REQUEST[name]%' or last_name like '%$_REQUEST[name]%'";
        if ($_REQUEST['status']!="")
            $con.=" and status='$_REQUEST[status]'";
        $sql = "select * from admin $con $sort";
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
            $responce->rows[$i]['id'] = $row['user_id'];
            $responce->rows[$i]['cell'] = array($row['first_name'], $row['last_name'], $row['user_name'], $row['email'],$status);
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

    function add_admin() {
        $sql = "insert into admin set
                first_name={$this->db->escape($_POST['first_name'])},
                last_name={$this->db->escape($_POST['last_name'])},
                user_name={$this->db->escape($_POST['user_name'])},
                password={$this->db->escape($_POST['password'])},
                email={$this->db->escape($_POST['email'])}";

        return $this->db->query($sql);
    }

    function get_admin_info() {
        $current_user = $_POST['user_name'];
        $sql = "select count(*) as num from admin where user_id='$current_user'";
        $sql_query = $this->db->query($sql);
        $row = $sql_query->row_array();
        return $row['num'];
    }
    function do_update_password() {
        $password=$_POST['new_password'];
        $admin_id=$this->session->userdata('user_id');
        $sql="update admin
                set password={$this->db->escape($password)}
                where user_id=$admin_id";
        return $this->db->query($sql);
    }
     function confirm_password() {
        $password=$_POST['old_password'];
        $admin_id=$this->session->userdata('admin_id');
        $sql = "SELECT * FROM admin WHERE user_id = ? AND password = ?";
        $query=$this->db->query($sql, array($admin_id, $password));
        if($query->num_rows()>0) {
            return true;
        }else {
            return false;
        }
    }

}
?>
