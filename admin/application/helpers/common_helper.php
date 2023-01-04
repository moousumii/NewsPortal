<?php

class common {

    public static function redirect() {
        $CI = & get_instance();
        $uri = $CI->session->userdata('cur_uri');
        redirect($uri);
    }

    public static function track_uri() {
        $CI = & get_instance();
        $uri = $CI->uri->uri_string();
        $CI->session->set_userdata('cur_uri', $uri);
    }
    public static function is_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    public static function is_admin() {
        
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            common::redirect();
        }
    }
    public static function is_admin_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('admin_logged_in')) {
            return true;
        } else {
            return false;
        }
    }


    public static function is_admin_logged() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function is_admin_user() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_type') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function is_logged() {
        $CI = & get_instance();
        if (!$CI->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public static function nav_menu_link($nav_array) {
        $link = "<div class='nav_menu'>";
        if (is_array($nav_array)) {
            $link.="<a href='" . site_url('home') . "'>Home</a> &raquo; ";
            foreach ($nav_array as $nav) {
                if ($nav[url] != '') {
                    $link.="<a href='" . $nav[url] . "'>$nav[title]</a> &raquo; ";
                } else {
                    $link.="<span class='b'>$nav[title]</span>";
                }
            }
        }
        $link.="</div>";
        return $link;
    }

    public static function status($status='') {
        if ($status == 1) {
            return 'Active';
        } else {
            return 'Inactive';
        }
    }

//    public static function change_status($table, $con, $status) {
//        $CI = & get_instance();
//        $sql = "update $table set status=$status where $con";
//        return $CI->db->query($sql);
//    }

//    public static function mail_sending($from_name, $from_email, $to_email, $subject, $msg_content) {
//        $CI = & get_instance();
//        $CI->load->library('email');
//        $config['protocol'] = 'sendmail';
//        $config['mailpath'] = '/usr/sbin/sendmail';
//        $config['charset'] = 'utf-8';
//        $config['wordwrap'] = TRUE;
//        $config['mailtype'] = 'html';
//
//        $CI->email->initialize($config);
//
//        $CI->email->from($from_email, $from_name);
//        $CI->email->to($to_email);
//        $CI->email->subject($subject);
//        $CI->email->message($msg_content);
//        $CI->email->send();
//        //echo $CI->email->print_debugger();
//    }


    public static function sending_mail($from,$from_name,$to,$subject,$msg) {
        $date=date("Y-m-d");
        $sql="insert into dg_contact_us set name='$_REQUEST[name]',email='$_REQUEST[email]',phone='$_REQUEST[phone]',address='$_REQUEST[address]',subject='$_REQUEST[subject]',message='$_REQUEST[message]',date='$date'";
        $this->db->query($sql);
        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype']='html';
        $this->email->initialize($config);

        $this->email->from($from, $from_name);
        $this->email->to($to);
        //$CI->email->cc('another@another-example.com');
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();

    }

 
    public static function getVar($var, $default='') {
        if (isset($_REQUEST[$var]) && !empty($_REQUEST[$var]))
            return $_REQUEST[$var];
        elseif (!empty($default)) {
            return $default;
        }
        else
            return "";
    }

    
    public static function get_controller_name($sel=''){
        
       $rows= sql::rows('seo');
       $opt="<option value=''>-----Select-----</option>";
       if(count($rows)>0){

           foreach ($rows as $row){
               if($sel==$row['id']){

                   $opt.="<option value='$row[controller_name]' selected='selected'>$row[controller_name]</option>";

               }else{
                $opt.="<option value='$row[controller_name]' selected='selected'>$row[controller_name]</option>";
                   
               }
                
           }

       }
       return $opt;

    }

    /*Added for Newspaper ads module from welated*/

    public static function get_status_options($sel='') {
        $arr = array('1' => 'Active', '00' => 'Inactive');
        $opt = '<option value="">All</option>';
        foreach ($arr as $key => $value) {
            if ($sel == $key) {
                $opt.="<option value='$key' selected='selected'>$value</option>";
            } else {
                $opt.="<option value='$key'>$value</option>";
            }
        }
        return $opt;
    }

    public static function change_status($table, $con, $status){
        $CI = & get_instance();
        if ($status == 'enabled'){
            $sta = 1;
        } else{
            $sta = 0;
        }
        $sql = "update $table set status='$sta' where $con";
        return $CI->db->query($sql);
    }

    public static function get_language_option($sel=''){
        $opt = '<option value="" >Select Language' . '</option>';
        $data = sql::rows('language', 'status=1');
        foreach ($data as $val){
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['language_name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['language_name'] . '</option>';
            }
        }
        return $opt;
        
    }

    


}
?>