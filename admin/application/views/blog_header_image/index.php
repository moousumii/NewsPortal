<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">
            <button id="add" title="blog_header_image/add_image"  class="jadd_button">Add</button>
            <button title="blog_header_image/edit_image" class="jedit_button">Edit</button>
            <button title="blog_header_image/delete_image" class="jdelete_button">Delete</button>
            <button title="blog_header_image/update_status/1" class="jstatus_button">Activate</button>
            <button title="blog_header_image/update_status/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>
