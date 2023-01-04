<?php

class Home_mod extends CI_Model {
    
    //set up the condition for region in each query
    function get_home_recent_data(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=4 and language_id='$language' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_home_recent_headlines($id=''){
        $date=date('Y-m-d');
        $language= $this->session->userdata('language');
        $sql = "select * from news where id<>'$id' and  news_type_id=4
                and language_id='$language'
                order by id desc limit 0,10";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function get_others_recent_headlines($id){
        $date=date('Y-m-d');
        $language= $this->session->userdata('language');
        $sql = "select * from news where id!='$id' and  news_type_id=4
                and language_id='$language'
                order by id desc limit 0,8";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_sports_news(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=6 and language_id='$language' order by id desc limit 0,1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_sports_headline($cat_id=''){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=5 and language_id='$language'  and category_id='$cat_id' order by id desc limit 0,5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_entertainment_news(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=7 and language_id='$language'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function get_entertainment_headline($cat_id){
       $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=5 and language_id='$language' and category_id='$cat_id' order by id desc limit 0,5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_spot_light_news(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=2 and language_id='$language'  order by id desc limit 0,5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_feature_news(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where news_type_id=3 and language_id='$language'  order by id desc limit 0,4";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_breaking_news_data(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select* from news where 1  order by id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_three_breaking_news_data(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select* from news where 1  order by id desc limit 0,3";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	
	function get_six_news(){
        
        $sql = "select* from news where 1  order by id desc limit 5,6";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	
	function get_popular_news(){
        
        $sql = "select headline,id from news where 1  order by count_view desc limit 0,6";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function best_read_news(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where 1  order by count_view desc limit 0,10";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	function get_latest_news(){
        $date=date('Y-m-d');
        $language=  $this->session->userdata('language');
        $sql = "select * from news where 1  order by id desc limit 5,20";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	function get_news($cat_id='',$start,$limit){
       // echo $cat_id;exit;
		$date=date('Y-m-d');
        $sql = "select * from news where 1 and category_id='{$cat_id}'  order by id desc limit {$start},{$limit}";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
     function get_home_page_adds(){
        $sql = "select * from ads where ads_position='PL626' order by ads_id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	
	function get_top(){
        $date=date("Y-m-d");
	   $sql = "select ads_image,ads_url from ads where ads_position=2 and start_date>=$date and $date<=expire_date and status=1 order by ads_id desc limit 0,1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
	
	
	function get_home_inner(){
        $date=date("Y-m-d");
	   $sql = "select ads_image,ads_url from ads where ads_position=3 and start_date>=$date and $date<=expire_date and status=1 order by ads_id asc limit 0,2";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	
	function get_home_add(){
        $date=date("Y-m-d");
	   $sql = "select ads_image,ads_url from ads where ads_position=3 and start_date>=$date and $date<=expire_date and status=1 order by ads_id asc limit 2,2";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	
	function get_home_add3(){
        $date=date("Y-m-d");
	   $sql = "select ads_image,ads_url from ads where ads_position=3 and start_date>=$date and $date<=expire_date and status=1 order by ads_id asc limit 4,2";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function get_all_news_list($con='', $limit='',$id=''){

        // echo $limit;exit;
            $sql = "select * from news where $con and category_id=$id order by id desc $limit";
            $sql_query = $this->db->query($sql);
            $rows = $sql_query->result_array();
            //print_r($rows);exit;
            return $rows;
        }

    function get_all_news_desc($id=''){
        $this->db->query("update news set count_view=count_view+1 where id='{$id}'");
        $date=date('Y-m-d');
        $sql = "select * from news where 1 and id='$id' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    

}
?>