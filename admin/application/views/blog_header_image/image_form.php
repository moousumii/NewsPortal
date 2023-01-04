<div class="form_content">
    <form id="valid_form" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <div id="add_form">
            <table id="add_image">
                <tbody>
                    <tr>
                        <th>Project Image:</th>
                        <? if ($project_data['image'] != '') {?>
                            <td><img src="../uploads/blog/<?= $blog_data['image'] ?>" alt="<?= $blog_data['image'] ?>" style="width:100px;height:64px;" />

                        </td>
                        <? } ?>
                        <td><input type='file' name='image'/></td><td>(500px*130px)</td>
                    </tr>

                    <tr>
                        <th width=150>&nbsp;</th>
                        <td>
                            <input type='submit' name='save' value='Save' class="button" />
                            <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" />
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </form>
</div>
