<div class="form_content">
    <form id="valid_form" method='post' action='<?=site_url($action);?>' enctype="multipart/form-data">
       <div id="add_form">
        <table>
            <tbody>
                    <tr>
                        <th width=150>Name:<span class='req_mark'>*</span></th>
                        <td><input type='text' class="text ui-widget-content ui-corner-all width_200  required" name='name'  value="<?= set_value('name',$reporter_data['reporter_name']) ?>" /><?= form_error('reporter_name', '<span>', '</span>') ?></td>
                    </tr>

                  <tr>
                    <th>Language:<span class='req_mark'>*</span></th>
                    <td><select name="language"><?= common::get_language_option() ?></select><?= form_error('language', '<span>', '</span>') ?></td>
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
