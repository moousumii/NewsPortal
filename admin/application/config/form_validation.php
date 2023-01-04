<?php

$config = array(
    'valid_login' => array(
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required')
    ),
    
   'valid_admin' => array(
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'),
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email')
    ),
    
    'valid_change_password' => array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required'),
        array('field' => 'new_password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[new_password]')
    ),
    
    'valid_user' => array(
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'),
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'email', 'label' => 'Email', 'rules' => ''),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[password]')
    ),
    
    'valid_forgot_password' => array(
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_user'),
    ),
    
    'valid_type' => array(
        array('field' => 'type_name', 'label' => 'Type Name', 'rules' => 'required'),
        array('field' => 'type_for', 'label' => 'Type For', 'rules' => 'required')
    ),
    'add_product_category'=>array(
        array('field' => 'parent_id', 'label' => 'Parent Category', 'rules' => 'required'),
        array('field' => 'category_name', 'label' => 'Category Name', 'rules' => 'required')
    ),
    'add_product'=>array(
        array('field' => 'category_id', 'label' => 'Category', 'rules' => 'required'),
        array('field' => 'product_name', 'label' => 'Product Name', 'rules' => 'required'),
        array('field' => 'product_desc', 'label' => 'Product Description', 'rules' => 'required'),
        array('field' => 'price', 'label' => 'Price', 'rules' => 'required'),
        array('field' => 'product_code', 'label' => 'Product Code', 'rules' => 'required'),
        array('field' => 'stock', 'label' => 'stock', 'rules' => 'required'),
      
    ),
    'valid_attribute'=>array(
       array('field' => 'attribute_name', 'label' => 'Attribute Name', 'rules' => 'required')
    ),

    'valid_options'=>array(
        array('field' => 'attribute_id', 'label' => 'Attribute', 'rules' => 'required'),
        array('field' => 'option_name', 'label' => 'Option Name', 'rules' => 'required')
    ),

    

    'valid_user' => array(
        array('field' => 'user_username', 'label' => 'User Name', 'rules' => 'trim|required|max_length[20]|callback_user_name_check'),
        array('field' => 'user_first_name', 'label' => 'First Name', 'rules' => 'trim|required|max_length[20]'),
        array('field' => 'user_last_name', 'label' => 'Last Name', 'rules' => 'trim|required|max_length[20]'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|matches[conf_email]|callback_user_email_check'),
        array('field' => 'conf_email', 'label' => 'Confirm Email', 'rules' => 'required|valid_email|callback_user_email_check'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required|min_length[6]|matches[conf_password]'),
        array('field' => 'conf_password', 'label' => 'Confirm Password', 'rules' => 'trim|required|min_length[6]'),
        array('field'=>'phone_no', 'label'=>'Phone No.', 'rules'=>'required'),
        array('field'=>'address', 'label'=>'Address', 'rules'=>'required'),
        array('field'=>'post_code', 'label'=>'Post Code', 'rules'=>'required'),
        array('field'=>'country', 'label'=>'Country', 'rules'=>'required'),

    ),
    'valid_admin_email'=>array(
       array('field' => 'email', 'label' => 'Admin Email', 'rules' => 'required')
    ),

    'valid_ads'=>array(
        array('field'=>'ads_title','label'=>'Ads Title','rules'=>'required'),
        array('field'=>'ads_url','label'=>'Category Name','rules'=>''),
        array('field'=>'ads_position','label'=>'Ads Position','rules'=>'required'),
        array('field'=>'ads_type','label'=>'Ads Type','rules'=>'required'),
        array('field'=>'ads_code','label'=>'Short Description','rules'=>''),
		array('field'=>'image','label'=>'Image','rules'=>'callback_ad_image_check'),
        array('field'=>'start_date','label'=>'Start date','rules'=>'required'),
        array('field'=>'expire_date','label'=>'Expire date','rules'=>'required'),
		
    ),

	
	'edit_ads'=>array(
        array('field'=>'ads_title','label'=>'Ads Title','rules'=>'required'),
        array('field'=>'ads_url','label'=>'Category Name','rules'=>''),
        array('field'=>'ads_position','label'=>'Ads Position','rules'=>'required'),
       // array('field'=>'ads_type','label'=>'Ads Type','rules'=>'required'),
       // array('field'=>'ads_code','label'=>'Short Description','rules'=>''),
		array('field'=>'image','label'=>'Image','rules'=>'callback_ad_image_check'),
        array('field'=>'start_date','label'=>'Start date','rules'=>'required'),
        array('field'=>'expire_date','label'=>'Expire date','rules'=>'required'),
		
    ),
	
	
    'valid_category'=>array(
        array('field' => 'parent_id', 'label' => 'Parent Category', 'rules' => 'required'),
        array('field' => 'category_name', 'label' => 'Category Name', 'rules' => 'required')
    ),

    'valid_news'=>array(
       array('field' => 'category_id', 'label' => 'Category', 'rules' => 'required'),
       array('field' => 'headline', 'label' => 'Headline', 'rules' => 'required'),
       array('field' => 'description', 'label' => 'Description', 'rules' => 'required'),
       array('field' => 'reporter_id', 'label' => 'Reporter Name', 'rules' => 'required'),
       array('field' => 'news_date', 'label' => 'News Date', 'rules' => 'required'),
       array('field' => 'position_id', 'label' => 'Position Id', 'rules' => 'callback_image_position_check')
    ),
    
    'valid_region'=>array(
        array('field' =>'name', 'label' =>'name','rules' =>'required'),
        array('field' =>'language', 'label' =>'language','rules' =>'required')
    ),
    
    'valid_reporter'=>array(
        array('field' =>'name', 'label' =>'reporter_name','rules' =>'required'),
        array('field' =>'language', 'label' =>'language','rules' =>'required')
    ),
    'valid_gallary' => array(
        array('field' => 'gallary_title', 'label' => 'Gallry Title', 'rules' => 'required'),
        array('field' => 'create_date', 'label' => 'Post Date', 'rules' => 'required')
    ),

   'valid_video'=>array(
       array('field'=>'language_id','label'=>'Language','rules'=>'required'),
       array('field'=>'title','label'=>'Title','rules'=>'required'),
       array('field'=>'add_date','label'=>'Add Date', 'rules'=>'required')
     
   ),
    'valid_blog'=>array(
       array('field' => 'language_id', 'label' => 'Language', 'rules' => 'required'),
       array('field' => 'title', 'label' => 'title', 'rules' => 'required'),
       array('field' => 'description', 'label' => 'Description', 'rules' => 'required'),
        array('field' => 'blog_date', 'label' => 'blog_date', 'rules' => 'required'),
    )
);
?>
