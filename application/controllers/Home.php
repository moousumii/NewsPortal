<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('home_model');
		$this->load->Model("home_mod");
	}
	
	public function index()
	{
		
		$data['national_slide']=$this->home_mod->get_news(21,0,3);
		$data['national']=$this->home_mod->get_news(21,1,10);
		
	    $data['politics_slide']=$this->home_mod->get_news(23,0,3);
	    $data['politics']=$this->home_mod->get_news(23,1,10);
	
		$data['commerce_slide']=$this->home_mod->get_news(24,0,3);
		$data['commerce']=$this->home_mod->get_news(24,1,10);
		$data['education']=$this->home_mod->get_news(29,0,8);
		$data['culture']=$this->home_mod->get_news(27,0,8);
		$data['technology']=$this->home_mod->get_news(26,0,8);
		$data['sport_slide']=$this->home_mod->get_news(30,0,3);
		$data['sport']=$this->home_mod->get_news(30,2,6);
		$data['binudon_slide']=$this->home_mod->get_news(25,0,3);
		$data['binudon']=$this->home_mod->get_news(25,2,8);
		$data['international_slide']=$this->home_mod->get_news(22,0,3);
		$data['international']=$this->home_mod->get_news(22,2,10);
        $data['three_breaking_news']=  $this->home_mod->get_three_breaking_news_data();
        $data['breaking_news']=  $this->home_mod->get_breaking_news_data();
        $data['home_recent'] = $this->home_mod->get_home_recent_data();
	    $data['top_six']=$this->home_mod->get_six_news();
	    $data['popular']=$this->home_mod->get_popular_news();
		$this->load->view('home/home',$data);
	}

	public function details($id)
	{	
	   $data['news_desc']=  $this->home_mod->get_all_news_desc($id);
       $cat_id=$data['news_desc']['category_id'];
	   $data['cat']=sql::row("news_category","id='{$cat_id}'");
       $data['cat_name']=sql::row("news_category","id='{$cat_id}'");
	   $data['popular']=sql::rows("news","category_id=".$cat_id." order by count_view desc limit 0,10");
	   $data['others_current']=$this->home_mod->get_others_recent_headlines($id);
	   $this->load->view('home/details',$data);
	}

	public function category($id)
	{
		$date=date("Y-m-d");
        $data['cat']=sql::row("news_category","id=$id","category_name");
        $data['latest_news']=sql::row("news"," category_id=$id order by id desc limit 0,1");
        $data['last_nine']=sql::rows("news"," category_id=$id order by id desc limit 1,10");
        $data['first_six']=sql::rows("news","category_id=$id order by id desc limit 1,6");
        $data['popular']=sql::rows("news","category_id=".$id." order by count_view desc limit 0,6");
        $data['days_news']=sql::rows("news","news_date='$date' and category_id=".$id." limit 0,10");
	    $data['others_current']=$this->home_mod->get_others_recent_headlines($id);
		$data['cat_id']=$id;
        $data['title'] = $data['cat']['category_name'];
        $data['dir'] = 'news';
        //print_r($data['others_current']); exit;
		$this->load->view('home/category',$data);
	}

	public function more($id)
	{	
		/*$this->load->library('pagination');
        $start = $this->uri->segment(4);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('home/more/'.$id);
         $config['per_page'] = 30;
        $config['total_rows'] = count($this->home_mod->get_all_news_list($con, "limit $start,{$config['per_page']}",$id));
       

        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_news'] = $this->home_mod->get_all_news_list($con, "limit $start,{$config['per_page']}",$id); //Don't Change
		
        if (count($data['all_news']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_news']);
        $data['total'] = $config['total_rows'];*/
        $data['all_news']=sql::rows("news"," category_id=$id order by id desc limit 0,50");
        $data['cat']=sql::row("news_category","id=".$id,"category_name");
        $data['title'] = 'All News';
        $data['cat_id']=$id;
        $data['dir'] = 'home';
        $data['page'] = 'more';

        $data['others_current']=$this->home_mod->get_home_recent_headlines();
		$data['popular']=$this->home_mod->get_popular_news();
		$data['breaking_news']=  $this->home_mod->get_breaking_news_data();
		$this->load->view('home/more',$data);
	}
}

