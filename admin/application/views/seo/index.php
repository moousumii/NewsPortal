<div class='grid_area' style="width:880px;">
    <?php
    if ($msg != "") {
        echo "<div class='success'>$msg</div>";
    }
    ?>
    <div class="tooolbars">
        <button id="add" title="seo/add_seo"  class="jadd_button">Add</button>
        <button title="seo/edit_seo" class="jedit_button">Edit</button>
        <button title="seo/delete_seo" class="jdelete_button">Delete</button>
    </div>
    <?php echo $grid_data ?>
</div>

