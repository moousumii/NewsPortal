<html>
<head>

<style>

img {
    max-width:200px;
    max-height:200px;
    width:auto;
    height:auto;
}

</style>

</head>


</html>



<div class="form_content">
    <form action="<?=site_url('ads')?>" method="post">
    <table>
        <tr>
            <th>Search Field</th><td><select name="searchField"><?=$this->mod_ads->get_search_options($_REQUEST['searchField'])?></select></td>
            <th>Search Keyword</th><td><input type="text" name="searchValue" class="text ui-widget-content ui-corner-all width_160" value="<?=$_REQUEST['searchValue']?>" class="" /></td>
            <th>Status</th><td><select name="status"><?=common::get_status_options($_REQUEST['status'])?></select></td>
        </tr>
        <tr><th colspan="6"><input type="submit" name="apply_filter" value="Apply Filter" class="button" /></th></tr>
    </table>
    </form>
</div>
<div class='grid_area'>
    <?php
    if ($msg != "") {
        echo "<div class='success'>$msg</div>";
    }
    ?>
    <div class="tooolbars">
        <button id="add" title="ads/new_ads"  class="jadd_button"><?=lang('label_add')?></button>
        <button title="ads/edit_ads" class="jedit_button"><?=lang('label_edit')?></button>
        <button title="ads/delete_ads" class="jdelete_button"><?=lang('label_delete')?></button>
        <button title="ads/ads_status/enabled" class="jstatus_button"><?=lang('label_activate')?></button>
        <button title="ads/ads_status/disabled" class="jstatus_button"><?=lang('label_deactivate')?></button>
    </div>
    <hr />
<?php echo $grid_data ?>
</div>