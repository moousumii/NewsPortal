<div class="form_content">
     <form action="<?=site_url('gallary')?>" method="post">
        <table>
            <tr>
                <th class="txt_right">Gallary Title</th>
				<td><input type="text" name="gallary_title" value="<?=$_REQUEST['gallary_title']?>" class="text ui-widget-content ui-corner-all width_160" /></td>
			</tr>
			<tr>
				<th>Created Between</th><td><input type="text" name="date_from" value="<?=$_REQUEST['date_from']?>" class="text ui-widget-content ui-corner-all date_picker width_80" />&nbsp;To&nbsp;<input type="text" name="date_to" value="<?=$_REQUEST['date_to']?>" class="text ui-widget-content ui-corner-all width_80 date_picker" /></td>
			</tr>
			<tr>
                <th>&nbsp;</th>
                <td align="left"><input type='submit' name='search' value='Search' class='button' /></td>
            </tr>
        </table>
    </form>
</div>
<div class='txt_center grid_area'>
    <div class="tooolbars">
        <button id="add"  title="gallary/new_gallary"  class="jadd_button">Add</button>
        <button title="gallary/edit_gallary"  class="jedit_button">Edit</button>
		<button title="gallary/view_image"  class="jedit_button">View Images</button>
        <button title="gallary/delete_gallary" class="jdelete_button">Delete</button>
        <button title="gallary/gallary_status/1" class="jedit_button">Activate</button>
        <button title="gallary/gallary_status/0" class="jedit_button">Deactivate</button>
    </div>
    <hr />
    <?php echo $grid_data ?>
</div>