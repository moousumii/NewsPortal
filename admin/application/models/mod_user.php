<?php

class mod_user extends Model {

    function __construct() {
        parent::Model();
    }

    function get_user_grid() {
        $sortname = common::getVar('sidx', 'user_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";

        $searchField = common::getVar('searchField');
        $searchValue = common::getVar('searchValue');

        $con = "user_name!='admin'";
        if ($searchField != '' && $searchValue != '') {
            $con.=" and $searchField like '%$searchValue%'";
        }

        $sql = "select * from user where  $con $sort";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');

        $count = sql::count("user");
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
            $responce->rows[$i]['id'] = ID_GENERATE + $row['user_id'];
            $responce->rows[$i]['cell'] = array($row['user_name'], $row['first_name'] . ' ' . $row['last_name'], $row['email'], $status);
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

    function get_search_options($sel='') {
        $arr = array(
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'user_name' => 'User Name',
            'email' => 'Email Address'
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

    function get_user_details($id) {
        $sql = $this->db->query("select * from user where user_id = $id");
        return $sql->row_array();
    }

    function save_user() {
        $password = $_POST['password'];

        $permit = 0;
        foreach ($_POST['permission'] as $per) {
            $permit+=$per;
        }

        $sql = "insert into user set
                user_name={$this->db->escape($_POST['user_name'])},
                password={$this->db->escape($password)},
                email={$this->db->escape($_POST['email'])},
                first_name={$this->db->escape($_POST['first_name'])},
                last_name={$this->db->escape($_POST['last_name'])},
                address={$this->db->escape($_POST['address'])},
                permission='$permit',
                date={$this->db->escape(date('Y-m-d'))}";
        return $this->db->query($sql);
    }

    function update_user() {
        $user_id = $this->session->userdata('edit_user_id');
        $password = $_POST['password'];
        $permit = 0;
        foreach ($_POST['permission'] as $per) {
            $permit+=$per;
        }

        $sql = "update user set
                user_name={$this->db->escape($_POST['user_name'])},
                password={$this->db->escape($password)},
                email={$this->db->escape($_POST['email'])},
                first_name={$this->db->escape($_POST['first_name'])},
                last_name={$this->db->escape($_POST['last_name'])},
                address={$this->db->escape($_POST['address'])},
                permission='$permit'
                where user_id=$user_id";
        return $this->db->query($sql);
    }

    function delete_user($user_id) {
        $sql = "delete from user where user_id=$user_id";
        return $this->db->query($sql);
    }

}
?>