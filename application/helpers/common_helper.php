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

    public static function change_status($table, $con, $status) {
        $CI = & get_instance();
        $sql = "update $table set status=$status where $con";
        return $CI->db->query($sql);
    }

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
    public static function sending_mail($from_name, $from_email, $to_email, $subject, $msg_content) {
        $CI = & get_instance();
        $CI->load->library('email');
        //$config['protocol'] = 'smtp';
         $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $CI->email->initialize($config);
        $CI->email->from('info@bdlive24.com', $from_name);
        $CI->email->to($to_email);
        $CI->email->subject($subject);
        $CI->email->message($msg_content);
       // $CI->email->send();
        //echo $CI->email->print_debugger();
    }

//    function sending_mail($from, $from_name, $to, $subject, $msg) {
//        $date = date("Y-m-d");
//        $sql = "insert into contact_us set name='$_REQUEST[name]',email='$_REQUEST[email]',phone='$_REQUEST[phone]',address='$_REQUEST[address]',subject='$_REQUEST[subject]',message='$_REQUEST[message]',date='$date'";
//        $this->db->query($sql);
//        $this->load->library('email');
//        $config['protocol'] = 'sendmail';
//        $config['mailpath'] = '/usr/sbin/sendmail';
//        $config['charset'] = 'utf-8';
//        $config['wordwrap'] = TRUE;
//        $config['mailtype'] = 'html';
//        $this->email->initialize($config);
//
//        $this->email->from($from, $from_name);
//        $this->email->to($to);
//        //$CI->email->cc('another@another-example.com');
//        $this->email->subject($subject);
//        $this->email->message($msg);
//        $this->email->send();
//    }

    public static function view_permit() {
        $CI = & get_instance();
        $permit = $CI->session->userdata('permission');

        if ($permit == 1 || $permit == 3 || $permit == 5 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    public static function add_permit($permit='') {
        $CI = & get_instance();
        if ($permit == '') {
            $permit = $CI->session->userdata('permission');
        }
        if ($permit == 2 || $permit == 3 || $permit == 6 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    public static function update_permit($permit='') {
        $CI = & get_instance();
        if ($permit == '') {
            $permit = $CI->session->userdata('permission');
        }
        if ($permit == 4 || $permit == 5 || $permit == 6 || $permit == 7) {
            return true;
        } else {
            return false;
        }
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

    public static function get_service_category($sel='') {
        $rows = sql::rows('service_category');
        $opt = "<option value=''>-----Select----</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {

                if ($sel == $row['id']) {
                    $opt.="<option value='$row[id]' selected='selected'>$row[title]</option>";
                } else {
                    $opt.="<option value='$row[id]'>$row[title]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_controller_name($sel='') {

        $rows = sql::rows('seo');
        $opt = "<option value=''>-----Select-----</option>";
        if (count($rows) > 0) {

            foreach ($rows as $row) {
                if ($sel == $row['id']) {

                    $opt.="<option value='$row[controller_name]' selected='selected'>$row[controller_name]</option>";
                } else {
                    $opt.="<option value='$row[controller_name]' selected='selected'>$row[controller_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_status($sel='') {
        $rows = sql::rows('product');
        $opt = "<option value=''>-----Select----</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {

                if ($sel == $row['id']) {
                    $opt.="<option value='$row[status]' selected='selected'>$row[status]</option>";
                } else {
                    $opt.="<option value='$row[status]'>$row[status]</option>";
                }
            }
        }
        return $opt;
    }

     public static function get_all_meta_data() {
        $c_name = $this->uri->segment(1);
        $CI = & get_instance();
        if ($c_name == "" || !common::check_controller_data($c_name))
            $c_name = "home";
        $q = $CI->db->query("select title,meta_tag,meta_keyword,meta_description from seo where controller_name='$c_name'");
        return $q->row_array();
    }

     public static function check_controller_data($c_name) {
        $CI = & get_instance();
        $q = $CI->db->query("select title,meta_tag,meta_keyword,meta_description from seo where controller_name='$c_name'");
        return $q->num_rows();
    }

    public static function all_news_category() {
        $CI = & get_instance();
        if (!$CI->session->userdata('language')) {
            $language = $CI->session->set_userdata('language', 1);
        } else {
            $language = $CI->session->userdata('language');
        }
        $sql = "select * from news_category where parent_id=0 ";
        $query = $CI->db->query($sql);
        return $query->result_array();
    }


    public static function all_news_category_footer($start, $limit) {
        $CI = & get_instance();
        if (!$CI->session->userdata('language')) {
            $language = $CI->session->set_userdata('language', 1);
        } else {
            $language = $CI->session->userdata('language');
        }
        $sql = "select * from news_category limit {$start},{$limit} ";
        $query = $CI->db->query($sql);
        return $query->result_array();
    }


    public static function get_news_category_name($id) {
        $CI = & get_instance();
        if (!$CI->session->userdata('language')) {
            $language = $CI->session->set_userdata('language', 1);
        } else {
            $language = $CI->session->userdata('language');
        }
        $sql = "select * from news_category where id={$id} ";
        $query = $CI->db->query($sql);
        return $query->row_array();
    }

    public static function get_child_news_category($id) {
        $CI = & get_instance();
        if (!$CI->session->userdata('language')) {
            $language = $CI->session->set_userdata('language', 1);
        } else {
            $language = $CI->session->userdata('language');
        }
        $sql = "select * from news_category where parent_id=$id ";
        $query = $CI->db->query($sql);
        return $query->result_array();
    }

    /* Added by holy October 26 2011 */

     public static function get_site_language() {

        $CI = & get_instance();
        $la = $CI->session->userdata('language');
        switch ($la) {
            case 1:
                $CI->lang->load("bangla");
                break;
            case 2:
                $CI->lang->load("english");
                break;
        }
    }

     public static function get_language_option($sel='') {
        $opt = '<option value=' . '' . ' >Select language' . '</option>';
        $data = sql::rows('language', 'status=1');
        foreach ($data as $val) {
            if ($val['id'] == $sel) {
                $opt.='<option value=' . $val['id'] . ' selected">' . $val['language_name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['language_name'] . '</option>';
            }
        }
        return $opt;
    }

    // by rajib

     public static function blog_header_image() {
        $sql = "select * from blog_header_image where status='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

     public static function blog_data() {
        $sql = "select * from blog order by blog_id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

     public static function user_account_activation($email='', $user_name='') {

        $CI = & get_instance();
        if ($email != '') {
            //$site = common::get_settings_data();
            $activation_key = md5(date("F j, Y, g:i a"));
            $sql = "update user set user_activation_key='$activation_key' where user_email='$email'";
            $CI->db->query($sql);
            $base_url = base_url();
            $msg_content = "Hi<br>
            Thanks for your interest in live bd 24<br>
            ";
            $msg_content.= "<br /><br />Please click on the link below to activate your account.
                        <br /><br />
                        Account Activation URL: <a href='" . site_url('login/account_activation/' . $activation_key) . "'>" . site_url('login/account_activation/' . $activation_key) . "</a>";

            if ($user_name == '') {
                $user_name = $email;
            }

            $from = "Admin";
            $from_name = 'bdlive24.com';
            $to = $email;
            $subject = "Account Activation";
            common::sending_mail($from_name, 'rajib@flammabd.com', $to, $subject, $msg_content);
        }
    }

    public static function get_country($sel='') {
        $country_list = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombi", "Comoros", "Congo (Brazzaville)", "Congo", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor Timur)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia, The", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepa", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
        $opt.="<option value='' >--Select Country--</option>";
        for ($i = 0; $i < count($country_list); $i++) {
            if ($country_list[$i] == $sel) {
                $opt.="<option value='$country_list[$i]' selected='selected'>$country_list[$i]</option>";
            } else {
                
                    $opt.="<option value='$country_list[$i]'>$country_list[$i]</option>";
            }
        }
        return $opt;
    }
	public static function GetWeather($state,$country,$langauge,$waetherIcons){
// auf der Basis von http://www.web-spirit.de/webdesign-tutorial/9/Wetter-auf-eigener-Website-mit-Google-Weather-API
        $api = simplexml_load_string(utf8_encode(file_get_contents("http://www.google.com/ig/api?weather=".$state."-".$country."&hl=".$langauge)));
        // $trans = array("Ã¤" => "ä", "Ã„" => "Ä", "Ã¼" => "ü", "Ãœ" => "Ü", "Ã¶" => "ö", "Ã–" => "Ö", "ÃŸ" => "ß");
        $trans = array("ü" => "ü", "ö" => "ö", "ä" => "ä", "ß" => "ß");
        $weather = array();
        $i = 1;
        foreach($api->weather->forecast_conditions as $GoogleWeather){
                $waetherIcons = $GoogleIcons = "/ig/images/weather/";
                $weather[$i]['zustand']                         = strtr(strtolower($GoogleWeather->condition->attributes()->data), $trans);
                $weather[$i]['tiefsttemperatur']        = $GoogleWeather->low->attributes()->data;
                $weather[$i]['hoechsttemperatur']       = $GoogleWeather->high->attributes()->data;
                $weather[$i]['icon']                            = str_replace($GoogleIcons, $waetherIcons, $GoogleWeather->icon->attributes()->data);
                $i++;
        }
        return $weather;
}
public static function getBanglaDate($date){
	 $engArray = array(
	 1,2,3,4,5,6,7,8,9,0,
	 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
	 'am', 'pm','Saturday','Sunday','Monday','Tuesday','Wednessday','Thursday','Friday'
	 );
	 $bangArray = array(
	 '১','২','৩','৪','৫','৬','৭','৮','৯','০',
	 'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
	 'সকাল', 'দুপুর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার'
	 );
 $converted = str_replace($engArray, $bangArray, $date);
 return $converted;
}






public static function get_top_add() {
        $CI = & get_instance();
        $date=date("Y-m-d");
        $sql = "select ads_image,ads_url from ads where ads_position=1 and start_date>=$date and $date<=expire_date and status=1 order by ads_id desc limit 0,1";
        $query = $CI->db->query($sql);
        return $query->row_array();
    }
	
	
	public static function get_inner_add() {
        $CI = & get_instance();
        $date=date("Y-m-d");
        $sql = "select ads_image,ads_url from ads where ads_position=6 and start_date>=$date and $date<=expire_date and status=1 order by ads_id desc ";
        $query = $CI->db->query($sql);
        return $query->result_array();
    }
	
	public static function get_footer_add() {
        $CI = & get_instance();
        $date=date("Y-m-d");
        $sql = "select ads_image,ads_url from ads where ads_position=7 and start_date>=$date and $date<=expire_date and status=1 order by ads_id desc limit 0,4 ";
        $query = $CI->db->query($sql);
        return $query->result_array();
    }
	
	
	

}
?>