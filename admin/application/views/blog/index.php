<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">
            <button id="add" title="blog/add_blog"  class="jadd_button">Add</button>
            <button title="blog/edit_blog" class="jedit_button">Edit</button>
            <button title="blog/delete_blog" class="jdelete_button">Delete</button>
            <button title="blog/status_update/1" class="jstatus_button">Activate</button>
            <button title="blog/status_update/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>
