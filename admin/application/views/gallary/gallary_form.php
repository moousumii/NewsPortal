<div class="form_content" style="width:850px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_gallary" action="<?= site_url($action) ?>" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Gallary Information</legend>
			<table>
				<tr>
					<th>Gallary Title <span class='req_mark'>*</span></th>
					<td><input type='text' name='gallary_title' value='<?= set_value('gallary_title', $gallary_title) ?>' class='text ui-widget-content ui-corner-all width_200' /><?= form_error('gallary_title', '<span>', '</span>') ?></td>
				</tr>
				<tr>
					<th>Date Added <span class='req_mark'>*</span></th>
					<td><input type='text' name='create_date' value='<?= set_value('create_date', $create_date) ?>' class='text ui-widget-content ui-corner-all width_80 date_picker' /><?= form_error('create_date', '<span>', '</span>') ?></td>
				</tr>
			</table>
		</fieldset>
		<br/>
			<fieldset>
				<legend>Gallary Image &nbsp;&nbsp;&nbsp;<span class="add" ><a style='color:#0099cc' href="javascript:void(0)">Add More</a></span></legend>
				 <table  cellpadding="3" id="image_table" cellspacing="3">
					<tr>
							<th>Image</th>
							<td><input type='file' name='upload_file_1' style="float:left"></td>
					</tr>
					<tr>
							<th>Image</th>
							<td><input type='file' name='upload_file_2' style="float:left"></td>
					</tr>
					<tr>
							<th>Image</th>
							<td><input type='file' name='upload_file_3' style="float:left"></td>
					</tr>
					 <input type="hidden" name="num_image" id="num_image"  value="3">
				</td>
			</tr>
			</table>
		</fieldset>
		<br/>
		<?php if(count($image)>0){?>
			<fieldset>
			<legend>Existing Images</legend>
				<table  cellpadding="3" cellspacing="3">
					<tr>
						<td>
							<div align="center" style="height: 270px;" id="photo">
							<?php foreach($image as $img){?>
							<div style="float:left;width:120px;border:#000000 1px solid;padding:5px;margin:5px" >
								<div align="center">
									<img height="90" width="120" src="<?=base_url().UPLOAD_PATH.'gallary/'.$gallary_id.'/thumb/160_140_'.$img['image_name']?>">
								</div>
								<?php if($img['image_name']==$gallary_profile_image){?>
									<div align="center" style="background-color: rgb(166, 201, 226); color: rgb(153, 51, 51); height: 22px; margin-top: 2px; width: 100%;">Profile Image</div>
								<?php }else{?>
								<div align="center" style="background-color: rgb(166, 201, 226); color: rgb(153, 51, 51); height: 22px; margin-top: 2px; width: 100%;"><input type="checkbox" value="<?=$img['image_id']?>"  name="del_photo[]">delete</div>
								<?php }?>
							</div>
							<?php } ?>
							</div>

						</td>
					</tr>
				</table>
			</fieldset>
			<?php }?>
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
    </form>
</div>