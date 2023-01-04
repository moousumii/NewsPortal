<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">
            <button id="add" title="reporter/add_reporter"  class="jadd_button">Add</button>
            <button title="reporter/edit_reporter" class="jedit_button">Edit</button>
            <button title="reporter/delete_reporter" class="jdelete_button">Delete</button>
            <button title="reporter/status_update/1" class="jstatus_button">Activate</button>
            <button title="reporter/status_update/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>
