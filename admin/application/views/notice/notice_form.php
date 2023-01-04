<div class='form_content'>

    <h3><?=$page_title?></h3>
    <form id="seo" action='<?=site_url($action)?>' method='post' enctype="multipart/form-data">
        <table>


            <tr>
                <th>Title:<span class='req_mark'>*</span></th>
                <td><input type='text' name='title' value='<?=set_value('title',$title)?>' class='text ui-widget-content ui-corner-all required width_200' />
                  <?=form_error('title','<span>','</span>')?>
                </td>
            </tr>

           <tr>
                <th>Description:<span class='req_mark'>*</span></th>
                <td>
                    <textarea name='description' class='ui-widget-content ui-corner-all' style="width:300px; height:70px;"><?=set_value('description',$description)?></textarea>
                    <?=form_error('description','<span>','</span>')?>
                </td>
            </tr>


            <tr><th>&nbsp;</th><td><input type='submit' name='save' value="Save" class='button' /> <input type='button' name='cancel' value="Cancel" class='cancel' onclick="window.history.back(-1)" /></td></tr>
        </table>
    </form>

</div>

