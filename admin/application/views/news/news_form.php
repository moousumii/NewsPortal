<div class="form_content">
    <form id="valid_form" method='post' action='<?=site_url($action);?>' enctype="multipart/form-data">
       <div id="add_form">
        <table>
            <tbody>

                    <tr>
                        <th>Category:<span class='req_mark'>*</span></th>
                         <td><select name="category_id" class="width_200"><?= $sub_category_option ?></select><?= form_error('category_id', '<span>', '</span>') ?></td>
                    </tr>
                  
               

                    <tr>
                        <th width=150>Headline:<span class='req_mark'>*</span></th>
                        <td><input style="width:400px" type='text' class="text ui-widget-content ui-corner-all" name='headline' style="width:190px;" value="<?= set_value('headline',$news_data['headline']) ?>" /><?= form_error('headline', '<span>', '</span>') ?></td>
                    </tr>

                    <tr>
                        <th>Description:<span class='req_mark'>*</span></th>
                        <td><textarea name="description" rows="6" cols="50"  class="text ui-widget-content ui-corner-all"><?= set_value('description',$news_data['description']) ?></textarea></td>
                    </tr>

                    <tr>
                      <th>Reporter Name:<span class='req_mark'>*</span></th>
                      <td><select name="reporter_id" class="width_200"><?= $reporter_option ?></select><?= form_error('reporter_id', '<span>', '</span>') ?></td>
                    </tr>

                    <tr>
                    <th>News Date:<span class='req_mark'>*</span></th>
                     <td><input type="text" name="news_date"  class="text ui-widget-content ui-corner-all date_picker" value="<?= $_REQUEST['date']?$_REQUEST['date']:date('Y-m-d');?>" size="10"><?= form_error('news_date', '<span>', '</span>') ?></td>
                    </tr>

                   
                    <tr>
                      <th>Image Position:</th>
                      <td>
                         <select name="position_id" class="width_200"><?=$position_option ?></select>
                          <?=form_error('position_id', '<span>', '</span>') ?>
                      </td>
                     
                    </tr>

                    <tr>
                        <th>Image:</th>
                        <td>
                            <?php if($news_data['image']!=''){?>
                            <img src="<?=  base_url().'../uploads/news/thumb_'.$news_data['image']?>" alt="alt"/>
                            <?php }?>
                            <input type="file" name="image">
                             <?= form_error('image', '<span>', '</span>') ?>
                        </td>
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
