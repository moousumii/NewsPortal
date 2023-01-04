<div class='form_content'>
    <h3><?=$page_title
?></h3>
<?php if ($error_msg != "") {
    echo "<div class='error'>$error_msg</div>";
} ?>
    <form action='<?=site_url('ads/edit_ads/' . $ads_id) ?>' method='post' enctype="multipart/form-data">
        <table cellspacing='1' cellpadding='2' width='100%'>
            <tr>
                <th>Title <span class='req_mark'>*</span></th>
                <td><input type='text' name='ads_title' value='<?=$ads_title ?>' class='text ui-widget-content ui-corner-all required width_200' /><?=form_error('ads_title', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>URL</th>
                <td><input type='text' name='ads_url' value='<?=$ads_url ?>' class='text ui-widget-content ui-corner-all required width_200' /><?=form_error('ads_url', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                    <th>Start date<span class='req_mark'>*</span></th>
                     <td><input type="text" readonly name="start_date"  class="text ui-widget-content ui-corner-all date_picker" value="<?=$start_date?>" size="10"><?= form_error('start_date', '<span>', '</span>') ?></td>
                    </tr>
					<tr>
                    <th>Expire date<span class='req_mark'>*</span></th>
                     <td><input type="text" readonly name="expire_date"  class="text ui-widget-content ui-corner-all date_picker" value="<?=$expire_date?>" size="10"><?= form_error('expire_date', '<span>', '</span>') ?></td>
                    </tr>
					

            <tr>
			
			
			            <tr>
                <th>Adds Position <span class='req_mark'>*</span></th>
                <td><select name="ads_position">
					<option value="<?php echo $position_id; ?>"> <?php echo $position_name; ?></option>
					<option value="">[All]</option>
					<option value="1">
						Top Ad
					</option>
					<optgroup label="Home Page Ad">
						<option value="2">
							Top 
						</option>
						<option value="3">
							Inner 
						</option>
						<option value="4">
							Bottom 
						</option>
					</optgroup>
					<optgroup label="Right Page Ad">
						<option value="5">
							Top 
						</option>
						<option value="6">
							Inner 
						</option>
					</optgroup>
					<option value="7">
						Footer Ad
					</option>
					
				</select>
				<?=form_error('ads_position', '<span>', '</span>') ?></td>
            </tr>
			
			
			
			
            <tr>
                <th>Image <span class='req_mark'>*</span></th>
                <td>
                    <input type='file' name='ads_image' />
					<?= form_error('image', '<span>', '</span>') ?>
                </td>
            </tr>
      

            <tr><th>&nbsp;</th><td><input type='submit' name='update' value='Update' class='button' />  <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>