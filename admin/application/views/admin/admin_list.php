    <div class="form_content">
            <form action="<?=site_url('admin')?>" method="post">
                   <table width="50%" border="0" cellpadding="2" cellspacing="2" align="center">
                        <tr>
                            <th valign="top">Name Keyword:</th>
                            <td>
                                <input type="text" name="name" value="<?=$_REQUEST['name']?>" class="text ui-widget-content ui-corner-all width_150" />
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td valign="top" >
                                <input type='radio' name='status' <?=$_REQUEST['status']==''?'checked':''?> value=""/><font color="#2E6E9E"><b>All</b></font>
                               <input type='radio' name='status'  value="1" <?=$_REQUEST['status']==1?'checked':''?>/><font color="#2E6E9E"><b>Active</b></font>
                                <input type='radio' name='status'  value="0" <?=$_REQUEST['status']=='0'?'checked':''?>/><font color="#2E6E9E"><b>Inactive</b></font>

                            </td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td><input type='submit' name='search_admin' value='Search' class='button' /></td>
                        </tr>
                   </table>
            </form>
   </div>

    <div class='grid_area' style="width:880px;">
        <?php
        if ($msg != "") {
            echo "$msg";
        }
        ?>
        <div class="tooolbars">
            <button id="add" title="admin/add_admin"  class="jadd_button">Add</button>
            <button title="admin/edit_admin" class="jedit_button">Edit</button>
            <button title="admin/status_update/1" class="jedit_button">Activate</button>
            <button title="admin/status_update/0" class="jedit_button">Deactivate</button>
            <button title="admin/delete_admin" class="jdelete_button">Delete</button>
        </div>
        <?php echo $grid_data ?>
    </div>