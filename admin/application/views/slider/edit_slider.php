<div class='form_content'>
    <form id="valid_form" action='<?=site_url('slider/edit_slider/'.$slider_id)?>' method='post' enctype="multipart/form-data" >
        <table>
            <tr>
                <th>Title <span class='req_mark'>*</span></th>
                <td><input type='text' name='title' value='<?=$title?>' class='required text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
             <tr>
                <th>Description <span class='req_mark'>*</span></th>
                <td><textarea name="des" rows="3" cols="30" class="required text ui-widget-content ui-corner-all"><?=$des?></textarea></td>
            </tr>
            <tr>
                <th>Image <span class='req_mark'>*</span></th>
                <td><img src="<?= site_url(UPLOAD_PATH .'/'.'slider/'.$image)?>" width="100" /><br />
                    <input type="hidden" name="p_image" value="<?=$image?>" />
                    <input type='file' name='image' class='input_txt width_250' />[Note:Width X Height=960px X 210px]
                </td>
            </tr>
            <tr><th>&nbsp;</th><td><input type='submit' name='update' value='Update' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>