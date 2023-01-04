<div class="bdr">
    <div class='login_bg'>
        <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" style="padding:10px;"><span class="ui-jqdialog-title" style="float: left;">Forgot Password</span></div>
        <div class='login_box'>
            <div class="table">
                <form id="valid_form" action='<?=site_url('login/reset_password/'.$verify_code)?>' method='post'>
                    <table>
                        <tr><th><?=lang('label_password')?></th><td><input type='password' name='new_password' value='<?=set_value('new_password')?>' class='text ui-widget-content ui-corner-all required width_200'  /><?=form_error('new_password','<span>','</span>')?></td></tr>
                        <tr><th><?=lang('label_conf_password')?></th><td><input type='password' name='conf_password' value='<?=set_value('conf_password')?>' class='text ui-widget-content ui-corner-all required width_200'  /><?=form_error('conf_password','<span>','</span>')?></td></tr>
                        <tr><td></td><td><input type='submit' name='change_password' value='Change Password' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' onclick="window.history.back(-1)" /></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>