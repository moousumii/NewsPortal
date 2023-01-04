var validator={
    init:function(){
        $j("#valid_login").validate({
            rules:{
                user_name:"required",
                password:"required"
            },
            messages:{
                user_name:"Please Enter User Name!",
                password:"Please Enter Password!"
            }
        });

        $j("#valid_user").validate({
            rules:{
                user_name:"required",
                first_name:"required",
                last_name:"required",
                password:"required",
                confirm_password:{
                    required:true,
                    equalTo:$j("#password")
                }
            },
            messages:{
                user_name:"Please Enter User Name",
                first_name:"Please Enter First Name",
                last_name:"Please Enter Last Name",
                password:"Please Enter Password",
                confirm_password:{
                    required:"Please Enter Confirm Password",
                    equalTo:"Confirm Password is not Matched"
                }
            }
        });
        $j("#valid_stone_type").validate({
            rules:{
                parent_id:"required",
                type_name:"required"
            },
            messages:{
                parent_id:"Please Select Stone Category!",
                type_name:"Please Enter Type Name!"
            }
        });
    }
}