<div class='grid_area' style="width:880px;">
    <?php
    if ($msg != "") {
        echo "<div class='success'>$msg</div>";
    }
    ?>
    <div class="tooolbars">
        <button id="add" title="store_notice/add_notice"  class="jadd_button">Add</button>
        <button title="store_notice/edit_notice" class="jedit_button">Edit</button>
        <button title="store_notice/status_update/1" class="jstatus_button">Publish</button>
        <button title="store_notice/status_update/0" class="jstatus_button">Hide</button>
        <button title="store_notice/delete_notice" class="jdelete_button">Delete</button>
    </div>
    <?php echo $grid_data ?>
</div>
