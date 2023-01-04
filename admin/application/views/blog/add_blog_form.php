<div class="form_content">
    <form id="valid_form" method='post' action='<?=site_url($action);?>' enctype="multipart/form-data">
       <div id="add_form">
        <table>
            <tbody>              
                  <tr>
                    <th>Language:<span class='req_mark'>*</span></th>
                    <td><select name="language_id" class="width_200"><?= common::get_language_option(set_value('language_id',$blog_data['language_id'])) ?></select><?= form_error('language_id', '<span>', '</span>') ?></td>
                  </tr>

                    <tr>
                        <th width=150>Title<span class='req_mark'>*</span></th>
                        <td><input type='text' class="text ui-widget-content ui-corner-all" name='title' style="width:190px;" value="<?= set_value('title',$blog_data['title']) ?>" /><?= form_error('title', '<span>', '</span>') ?></td>
                    </tr>

                    <tr>
                        <th>Description:<span class='req_mark'>*</span></th>
                        <td><textarea name="description" rows="6" cols="50" id="content_<?=$i+1?>" class="text ui-widget-content ui-corner-all"><?= set_value('description',$blog_data['blog_description']) ?></textarea></td>
                    </tr>

                    <tr>
                    <th>News Date:<span class='req_mark'>*</span></th>
                     <td><input type="text" name="blog_date"  class="text ui-widget-content ui-corner-all date_picker" value="<?= $_REQUEST['date']?$_REQUEST['date']:date('Y-m-d');?>" size="10"><?= form_error('blog_date', '<span>', '</span>') ?></td>
                    </tr>
                   <tr>
                       <th>&nbsp;</th>
                       <td><input type='submit' name='save' value='Save' class="button" /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></td>
                   </tr>

            </tbody>
        </table>

       </div>
    </form>
</div>
