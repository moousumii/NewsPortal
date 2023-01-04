<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">
            <button id="add" title="region/add_region"  class="jadd_button">Add</button>
            <button title="region/edit_region" class="jedit_button">Edit</button>
            <button title="region/delete_region" class="jdelete_button">Delete</button>
            <button title="region/status_update/1" class="jstatus_button">Activate</button>
            <button title="region/status_update/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>
