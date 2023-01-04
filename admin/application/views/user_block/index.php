<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">
<!--            <button id="add" title="user_block/add_user"  class="jadd_button">Add</button>-->
<!--            <button title="user_block/edit_user" class="jedit_button">Edit</button>-->
            <button title="user_block/delete_user" class="jdelete_button">Delete</button>
            <button title="user_block/status_update/1" class="jstatus_button">Activate</button>
            <button title="user_block/status_update/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>
