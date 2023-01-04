<div class="form_content">
    <form action="<?= site_url('gallary/view_image/' . $gallary_id) ?>" method="post">
        <table border="0">
            <tr>
                <th  style="text-align:left"><b>Gallary Title:</b></th>
                <td align='left'><?php echo $gallary_title; ?></td>
            </tr>
            <tr>
                <td colspan="2"><a href="<?php echo site_url('gallary'); ?>">Back</a> to Gallary Page </td>
            </tr>
            <tr>
                <td colspan="2">
                    <fieldset>
                        <legend>Images</legend>
                        <br/>There are  <b><?= count($image) ?></b> Images(s) found on this gallary </b>
                        <div align="center" id="photo" style="height: 270px;">
                            <?php foreach ($image as $img) {
                            ?>
                                <div style="float: left; width: 170px; border: 1px solid rgb(0, 0, 0); padding: 5px; margin: 5px;">
                                    <div align="center">
                                        <a href="<?php echo base_url() . UPLOAD_PATH . 'gallary/' . $gallary_id . '/600_500_' . $img['image_name'] ?>" target="_blank"><img height="140" width="160" src="<?php echo base_url() . UPLOAD_PATH . 'gallary/' . $gallary_id . '/thumb/160_140_' . $img['image_name'] ?>"></a>
                                    </div>
                                    <div align="center" style="background-color: rgb(166, 201, 226); color: rgb(153, 51, 51); height: 22px; margin-top: 2px; width: 95%;"><input type="radio" value="<?= $img['image_id'] ?>" <?php if ($gallary_profile_image == $img['image_name']) { ?> checked="checked" disabled<?php } ?> name="profile_photo"><?php if ($gallary_profile_image == $img['image_name']) { ?>Profile Image<?php } else { ?>Set as Profile<?php } ?></div>
                                </div>
                            <?php } ?>
                    </fieldset>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="save" value="Set Profile Image" class="button"/></td>
            </tr>
        </table>
    </form>
</div>