 
<div class="form_content">
	 <?php if($msg!=''){echo "<div class='success'>".$msg."</div>";}?>
    <form action="<?=site_url('admin/change_password')?>" method="post">
        <table>
           
            <tr>
                <th>Old Password <span class='required'>*</span></th>
                <td><input type='password' name='old_password' value=''  class="text ui-widget-content ui-corner-all width_200" /><?=form_error('old_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>New Password <span class='required'>*</span></th>
                <td><input type='password' name='new_password' value=''  class="text ui-widget-content ui-corner-all width_200" /><?=form_error('new_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>Confirm Password <span class='required'>*</span></th>
                <td><input type='password' name='confirm_password' value=''  class="text ui-widget-content ui-corner-all width_200" /><?=form_error('confirm_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td>
                    <input type='submit' name='change_password' value='Change Password' class='button' />
                    <input type='button' name='cancel' value='Cancel' class='cancel' onclick="window.history.back(-1)" />
                </td>
            </tr>
        </table>
    </form>
</div>
