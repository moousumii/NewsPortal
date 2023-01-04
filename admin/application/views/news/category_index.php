<div class='grid_area' style="width:880px;">
        <?php
        if ($msg != "") {
            echo "<div class='success'>$msg</div>";
        }
        ?>
        <div class="tooolbars">
            <button id="add" title="news/add_news_category"  class="jadd_button">Add</button>
            <button title="news/edit_news_category" class="jedit_button">Edit</button>
            <button title="news/status_update/1" class="jedit_button">Activate</button>
            <button title="news/status_update/0" class="jedit_button">Deactivate</button>
            <button title="news/delete_news_category" class="jdelete_button">Delete</button>
        </div>
        <?php echo $grid_data ?>
    </div>