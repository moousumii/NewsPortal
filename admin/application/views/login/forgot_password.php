<div class="bdr">
    <div class='login_bg'>
		<div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" style="padding:10px;"><span class="ui-jqdialog-title" style="float: left;">Forgot Password</span></div>
        <div class='login_box'>
            <div class="table">
                <form action='<?=site_url('login/forgot_password')?>' method='post'>
                    <?php if($msg!='') {
    echo "<div class='error'>".$msg."</div>";
}?>
                    <table>
                        <tr><th>Email:</th><td><input type='text' name='email' value='<?=set_value('email')?>' class='text ui-widget-content ui-corner-all email required width_200' /><?=form_error('email','<span>','</span>')?></td></tr>
                        <tr><td></td><td><input type='submit' name='send' value='Send' class='button' /> <input type='button' name='cancel' value="Cancel" class='cancel' onclick="window.history.back(-1)"/></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>