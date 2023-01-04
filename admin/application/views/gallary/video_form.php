<div class="form_content" style="width:850px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_gallary" action="<?= site_url($action) ?>" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Video Information</legend>
			<table>
                                <tr>
                                    <th>Language:<span class='req_mark'>*</span></th>
                                    <td><select name="language_id" class="width_200"><?= common::get_language_option(set_value('language_id', $news_data['language_id'])) ?></select><?= form_error('language_id', '<span>', '</span>') ?></td>
                                </tr>
				<tr>
					<th>Video Title <span class='req_mark'>*</span></th>
					<td><input type='text' name='title' value='<?= set_value('title', $video_info['title']) ?>' class='text ui-widget-content ui-corner-all width_200' /><?= form_error('title', '<span>', '</span>') ?></td>
				</tr>
                                
                                <tr>
					<th>Video Description</th>
					<td><textarea name="description" rows="6" cols="50" id="content_1" class="text ui-widget-content ui-corner-all"><?= set_value('description',$video_info['description']) ?></textarea></td>
				</tr>

				<tr>
					<th>Date Added<span class='req_mark'>*</span></th>
					<td><input type='text' name='add_date' value='<?= set_value('add_date', $video_info['add_date']) ?>' class='text ui-widget-content ui-corner-all width_80 date_picker' /><?= form_error('add_date', '<span>', '</span>') ?></td>
				</tr>

                                <tr>
                                    <th>Upload Video:</th>
                                    <td>
                                        <?php if ($video_info['video_name'] != '') {?>
                                            <img src="<?= base_url() . 'video/thumb/112_63_' . $video_info['video_name'] ?>" alt="alt"/>
                                        <?php } ?>
                                        <input type="file" name="video_name">
                                        <?= form_error('video_name', '<span>', '</span>') ?>
                                    </td>
                                </tr>
                                
			</table>
		</fieldset>
	
			
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
    </form>
</div>
