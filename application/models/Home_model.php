<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	public function get_products(){
		//$q=$this->db->get('product')->result();
		$q=$this->db->get('products')->result();
		/*foreach($q as &$result){
			if($result->option_values){
				$result->option_values=explode(',',$result->option_values);
			}
		}*/
		return $q;
	}
	public function get_product($product_id){
        $q=$this->db
            ->select('*')
            //->from('product')
            ->from('products')
            ->where('product_id',$product_id)
            ->get()->row();
			
			/*if($q->option_values){
				$q->option_values=explode(',',$q->option_values);
		}*/
		return $q;
	}
		
	public function get_main_categories(){
        return $this->db
            ->select('*')
            ->from('category')
			->where('depth',1)
            ->get()->result();
    }
	public function get_2nd_categories(){
        return $this->db
            ->select('*')
            ->from('category')
			->where('depth',2)
            ->get()->result();
    }
	
	public function store_registration_info($data,$address){
		$this->db->insert('user_info', $data );
		$address['user_info_user_id']= $this->db->insert_id();
		$this->db->insert('address_info',$address);
		return $address['user_info_user_id'];
	}
	
	function get_search_products($search){
	
	  $this->db->select('product_name')
			   ->from('products')
               ->where("product_name LIKE '%$search%'");
	 // $this->db->where('product_name',$search);
	  //$this->db->from('products');
	  $query = $this->db->get();
	  return $query->result();
	}
	public function customer_login($email,$password)
	{
		//$this->load->database();
		$q=$this->db->where(['user_email'=>$email,'user_password'=>$password])
				->get('user_info');
		if($q->num_rows()==1){
			return $q->row_array();
		}
		else{
			return FALSE;
		}
	}
	function get_customer_info_by_email($email){
	
	  $q=$this->db->select('user_info.user_email')
			   ->from('user_info')
               ->where('user_email',$email)
			   ->get();
		if($q->num_rows()>0){			
			return false;
		}else{
			return true;
		}
	}
	public function get_customer_by_id($user_id){
		$q=$this->db->select('user_info.*,address_info.address,address_info.contact')
				 ->from('user_info')
				 ->join('address_info','user_info.user_id=address_info.user_info_user_id')
				 ->where('user_id',$user_id)
				 ->where('default_status',1)
				 ->where('address_status',1)
				 ->get();
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_default_address_by_id($user_id){
		$q=$this->db->select('*')
				 ->from('address_info')
				 ->where('user_info_user_id',$user_id)
				 ->where('default_status',1)
				 ->where('address_status',1)
				 ->get();
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function get_address_by_id($user_id){
		$q=$this->db->select('*')
				 ->from('address_info')
				 ->where('user_info_user_id',$user_id)
				 ->where('default_status',0)
				 ->where('address_status',1)
				 ->get();
		if($q->num_rows()>0){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_address_by_id($user_id){
		$q=$this->db->select('*')
				 ->from('address_info')
				 ->where('user_info_user_id',$user_id)
				 ->where('address_status',1)
				 ->get();
		if($q->num_rows()>0){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	
	public function get_address_by_address_id($address_id){
		$q=$this->db->select('*')
				 ->from('address_info')
				 //->join('user_info','address_info.user_info_user_id=user_info.user_id')
				 ->where('adr_id',$address_id)
				 ->get();
		if($q->num_rows()==1){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}

	public function get_most_sale_item($category,$count,$start){

		if($category <= 0){

			$q=$this->db->select('product_name,product_image,product_id,product_price,product_quantity,vat,discount_status,product_unit,discount_info_discount_id,category_category_id,unit_name,discount_percent,discount_amount,discount_start_date,discount_end_date')
				 ->from('products')
				 ->join('parent_product','parent_product.parent_id=products.parent_product_parent_id')
				 ->join('product_unit','product_unit.unit_id=products.product_unit_unit_id')
				 ->join('discount_info','discount_info.discount_id=products.discount_info_discount_id')
				 ->where('product_quantity > ',0)
				 ->where('product_status',1)
				 ->limit($count,$start)
				 ->order_by('sale_counter desc')
				 ->get();
				 
		}else{

			$q=$this->db->select('product_name,product_image,product_id,product_price,product_quantity,vat,discount_status,product_unit,discount_info_discount_id,category_category_id,unit_name,discount_percent,discount_amount,discount_start_date,discount_end_date')
				 ->from("products")
				 ->join('parent_product','parent_product.parent_id=products.parent_product_parent_id')
			 	->join('product_unit','product_unit.unit_id=products.product_unit_unit_id')
			 	->join('discount_info','discount_info.discount_id=products.discount_info_discount_id')
				 ->where('product_quantity > ',0)
				 ->where('parent_id','parent_product_parent_id')
				 ->where('category_category_id',$category)
				 ->where('product_status',1)
				 ->limit($count,$start)
				 ->order_by('sale_counter desc')
				 ->get();

				//echo $q;
				exit();

		}

		if($q->num_rows()){
			//echo $category."  ".$count."  ".$start;
			return $q->result();
		}
		else{
			return FALSE;
		}

		
	}

	public function get_product_details($product_id){


		$q=$this->db->select('product_name,product_image,product_id,product_price,product_quantity,vat,discount_status,product_unit,discount_info_discount_id,category_category_id,unit_name,discount_percent,discount_amount,discount_start_date,discount_end_date,parent_product_details')
			 ->from('products')
			 ->join('parent_product','parent_product.parent_id=products. 	parent_product_parent_id')
			 ->join('product_unit','product_unit.unit_id=products.product_unit_unit_id')
			 ->join('discount_info','discount_info.discount_id=products.discount_info_discount_id')
			 ->where('product_id',$product_id)			 
			 ->get();



		if($q->num_rows()){			
			return $q->row();
		}else{
			return FALSE;
		}
		
	}
	public function update_password($data,$user_id){
		return $this->db
			        ->where('user_id',$user_id)
				    ->update('user_info',$data);
	}
	public function update_default_address($adr_id,$data){
		return $this->db
			        ->where('adr_id',$adr_id)
				    ->update('address_info',$data);
	}
	public function update_address($data,$adr_id){
		return $this->db
			        ->where('adr_id',$adr_id)
				    ->update('address_info',$data);
	}
	
	public function add_address($data){
		return $this->db->insert('address_info', $data );
	}

	public function get_category_product($category_id,$count,$start){

		$q=$this->db->select('product_name,product_image,product_id,product_price,product_quantity,vat,discount_status,product_unit,discount_info_discount_id,category_category_id,unit_name,discount_percent,discount_amount,discount_start_date,discount_end_date')
			 ->from('products')
			 ->join('parent_product','parent_product.parent_id=products.parent_product_parent_id')
			 ->join('product_unit','product_unit.unit_id=products.product_unit_unit_id')
			 ->join('discount_info','discount_info.discount_id=products.discount_info_discount_id')
			 ->where('parent_product.category_category_id',$category_id)
			 ->where('product_quantity > ',0)
			 ->where('product_status',1)
			  ->limit($count,$start)
			 ->get();

		if($q->num_rows()){			
			return $q->result();
		}else{
			return FALSE;
		}
		
	}

	public function get_related_product($product_id,$count,$start){

		$q=$this->db->select('product_name,product_image,product_id,product_price,vat,product_quantity,discount_status,product_unit,discount_info_discount_id,category_category_id,unit_name,discount_percent,discount_amount,discount_start_date,discount_end_date')
			 ->from('products')
			 ->join('parent_product','parent_product.parent_id=products.parent_product_parent_id')
			 ->join('product_unit','product_unit.unit_id=products.product_unit_unit_id')
			 ->join('discount_info','discount_info.discount_id=products.discount_info_discount_id')
			 ->join('related_product_info','related_product_info.related_product_id=products.product_id')
			 ->where('related_product_info.products_product_id',$product_id)
			  ->limit($count,$start)
			 ->get();

		if($q->num_rows()){			
			return $q->result();
		}else{
			return FALSE;
		}
		
	}
	
	public function store_order($data,$cart){
		$this->db->insert('order_info', $data );
		$order_id= $this->db->insert_id();
		foreach ($cart as $product) {

            /*if($product==null){
                contiune;
            }*/

            $data=array(
                'product_product_id'=>$product['id'],
                'quantity'=>$product['qty'],
                'sale_price'=>$product['price']-$product['discount'],
                'main_price'=>$product['price'],
                'order_info_order_id'=>$order_id

            );
            //print_r($data); exit;

            $this->db->insert('order_details', $data );
        }
		if($order_id)
		{
			return true;
		}
		else return false;
	}
	public function get_user_all_orders($user_id){
		$q=$this->db->select('*')
					->from('order_info')
					->join('order_type','order_info.order_type=order_type.type_id')
					->where('user_info_user_id',$user_id)	
					->order_by('order_date','desc')
					->get();
		if($q->num_rows()>0){			
			return $q->result();
		}else{
			return FALSE;
		}
	}
	
	public function get_order_details($order_id){
		$q=$this->db->select('*')
					->from('order_details')
					//->join('order_info','order_info.order_id=order_details.order_info_order_id')
					//->join('order_type','order_info.order_type=order_type.type_id')
					->join('products','products.product_id=order_details.product_product_id')
					//->join('address_info','address_info.adr_id=order_info.shipping_address_id')
					//->join('address_info','address_info.adr_id=order_info.billing_address_id')
					->where('order_details.order_info_order_id',$order_id)
					->get();
		if($q->num_rows()>0){			
			return $q->result();
		}else{
			return FALSE;
		}
	}
	public function get_order_by_id($order_id){
		$q=$this->db->select('*')
					->from('order_info')
					->join('order_type','order_info.order_type=order_type.type_id')
					->join('address_info','address_info.adr_id=order_info.shipping_address_id')
					->where('order_id',$order_id)			 
					->get();
		if($q->num_rows()==1){			
			return $q->row();
		}else{
			return FALSE;
		}
	}
	public function get_shipping_address_by_id($order_id){
		$q=$this->db->select('order_info.billing_address_id,address_info.*')
					->from('order_info')
					->join('address_info','address_info.adr_id=order_info.billing_address_id')
					->where('order_id',$order_id)			 
					->get();
		if($q->num_rows()==1){			
			return $q->row();
		}else{
			return FALSE;
		}
	}
	public function get_billing_address_by_id($order_id){
		$q=$this->db->select('order_info.billing_address_id,address_info.*')
					->from('order_info')
					->join('address_info','address_info.adr_id=order_info.billing_address_id')
					->where('order_id',$order_id)			 
					->get();
		if($q->num_rows()==1){			
			return $q->row();
		}else{
			return FALSE;
		}
	}
}