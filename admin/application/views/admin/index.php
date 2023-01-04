
       <div class="form_content">
           <form action="<?= site_url('user') ?>" method="post">
               <table>
                   <tr>
                       <th>Search Field</th><td><select name="searchField"><?= $this->mod_user->get_search_options($_REQUEST['searchField']) ?></select></td>
                       <th>Search Keyword</th><td><input type="text" name="searchValue" class="text ui-widget-content ui-corner-all width_160" value="<?= $_REQUEST['searchValue'] ?>" class="" /></td>
                   </tr>
                   <tr><th colspan="4"><input type="submit" name="apply_filter" value="Apply Filter" class="button" /></th></tr>
               </table>
           </form>
       </div>

<div class='grid_area' style="width:880px;">
    <?php
    if ($msg != "") {
        echo "<div class='success'>$msg</div>";
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
