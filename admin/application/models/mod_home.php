<?php 
class mod_home extends Model{
	function __construct(){
		parent::Model();
	}
	function get_cash_links($year='',$month=''){
		if($month=='' || $year==''){
			$date=date('Y-m');
		}else{
			$date=$year.'-'.$month;
		}
		$link=array();
		$res=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
		foreach($res as $da){
			$link[(int)$da]=site_url('home/cash_feed_chicks/'.$year.'/'.$month.'/'.$da);
		}
		return $link;
	}
}
?>