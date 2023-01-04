<?php 
$config = array(
      'login_form' => array(
            array(
			   'field' => 'email',
               'label' => 'User Email',
               'rules' => 'required' 
            ),
            array(
               'field' => 'password',
               'label' => 'Password',
               'rules' => 'required|md5', 
            )
               
		),
		'add_user' => array(
            array(
			   'field' => 'adminName',
               'label' => 'Full Name',
               'rules' => 'required' 
            ),
            array(
               'field' => 'adminPassword',
               'label' => 'Password',
               'rules' => 'required|min_length[8]|md5', 
            ),
			array(
               'field' => 'confirmPass',
               'label' => 'Confirm Password',
               'rules' => 'required|min_length[8]|md5|matches[adminPassword]', 
            ),
            array(
               'field' => 'adminContact',
               'label' => 'Contact',
               'rules' => 'required', 
            ),
			array(
               'field' => 'adminUserID',
               'label' => 'User ID',
               'rules' => 'required|is_unique[admin_info.adminUserID]', 
            ),
			array(
               'field' => 'admin_role_roleID',
               'label' => 'User Type',
               'rules' => 'required', 
            ),
		),
		'update_user' => array(
            array(
			   'field' => 'adminName',
               'label' => 'Full Name',
               'rules' => 'required' 
            ),
			
            array(
               'field' => 'adminContact',
               'label' => 'Contact',
               'rules' => 'required', 
            ),
			
		),
		
		'update_password' => array(
            array(
               'field' => 'adminPasswordOld',
               'label' => 'Old Password',
               'rules' => 'required|min_length[8]|md5', 
            ),
			array(
               'field' => 'adminPasswordNew',
               'label' => 'New Password',
               'rules' => 'required|min_length[8]|md5', 
            ),
			array(
               'field' => 'adminPasswordConfirm',
               'label' => 'Retype New Password',
               'rules' => 'required|min_length[8]|md5|matches[adminPasswordNew]', 
            ),
		),
	
      'updateAdmin' => array(
            
         array(
               'field' => 'adminUserID',
               'label' => 'User Name',
               'rules' => 'required|is_unique[product_info.productName]', 
            ),    
         array(
               'field' => 'adminPassword',
               'label' => 'Password',
               'rules' => 'required|md5', 
            ),    
          array(
               'field' => 'adminPasswordOld',
               'label' => 'Password',
               'rules' => 'md5', 
            ),    
          array(
               'field' => 'adminPasswordNew',
               'label' => 'Password',
               'rules' => 'md5', 
            ),    
          array(
               'field' => 'adminPasswordConfirm',
               'label' => 'Password',
               'rules' => 'md5|matches[adminPasswordConfirm]', 
            ),    
          
      ),

      /*Start*/
      'addExpenseField' => array(
            array(
               'field' => 'expenseFieldName',
               'label' => 'Expense Field',
               'rules' => 'required' 
            ),
         
            array(
               'field' => 'expenseFieldDetails',
               'label' => 'Details',
               'rules' => 'required', 
            ),
         
      ),

      'addExpense' => array(
            array(
               'field' => 'expense_field_info_expenseFieldID',
               'label' => 'Expense Field',
               'rules' => 'required' 
            ),
         
            array(
               'field' => 'expenseAmount',
               'label' => 'Amount',
               'rules' => 'required', 
            ),

            array(
               'field' => 'expenseDetails',
               'label' => 'Details',
               'rules' => 'required', 
            ),
         
      ),

      'addBill' => array(
            array(
               'field' => 'client_info_supplierId',
               'label' => 'Client',
               'rules' => 'required' 
            ),
         
            array(
               'field' => 'billAmount',
               'label' => 'Amount',
               'rules' => 'required', 
            ),

            array(
               'field' => 'billDetails',
               'label' => 'Details',
               'rules' => 'required', 
            ),
            
            array(
               'field' => 'billNote',
               'label' => 'Note',
               'rules' => 'required', 
            ),
         
      ),

      'addNewClient' => array(
            array(
               'field' => 'clientContactName',
               'label' => 'Client Name',
               'rules' => 'required' 
            ),
         
            array(
               'field' => 'clientContactNumber',
               'label' => 'Client Phone Number',
               'rules' => 'required', 
            ),

            array(
               'field' => 'businessStartedSince',
               'label' => 'Client Since',
               'rules' => 'required', 
            ),
            
            array(
               'field' => 'clientAddress',
               'label' => 'Client Address',
               'rules' => 'required', 
            ),
         
      ),

      'addProductType' => array(
            array(
               'field' => 'productTypeName',
               'label' => 'Product Type / Group',
               'rules' => 'required' 
            ),
         
            array(
               'field' => 'quality_price_info_qualityId',
               'label' => 'Pricing Unit',
               'rules' => 'required', 
            ),
         
      ),

      'addProduct' => array(
            array(
               'field' => 'productName',
               'label' => 'Product Name',
               'rules' => 'required' 
            ),
         
            array(
               'field' => 'product_type_info_productTypeID',
               'label' => 'Product Type / Group',
               'rules' => 'required', 
            ),

            array(
               'field' => 'productWeight',
               'label' => 'Weight',
               'rules' => 'required', 
            ),

            array(
               'field' => 'productAdditionalCost',
               'label' => 'Additional Cost',
               'rules' => 'required', 
            ),
             array(
               'field' => 'product_status_info_productStatusId',
               'label' => 'Product Status',
               'rules' => 'required', 
            ),
         
      ),

	);
	
	
	
?>	
	