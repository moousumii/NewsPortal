<div class="tooolbars">
        <button id="add" title="slider/new_slider"  class="jadd_button">Add</button>
</div>

<?php if($msg!=""){echo "<div class='success'>$msg</div>";}?>
<div class='table_content'>
    <table cellpadding="1" cellspacing="1">
        <tr class='title'>
            <th>Title</th>
             <th>Description</th>
            <th>Image</th>
            <th>Task</th>
        </tr>
        <?php if(count($rows)>0){
            $inc=1;
            foreach($rows as $row):?>
        <tr <?php if($inc%2==0){echo "class='even'";}else{echo "class='odd'";}?>>
            <td><?=$row['title']?></td>
             <td><?=$row['des']?></td>
            <td><img src="<?= site_url(UPLOAD_PATH .'/'.'slider/'.$row['image'])?>" width="60" /></td>
            <td class='view_links'>
                <!--<a href='<?=site_url('slider/slider_status/'.$row['slider_id'].'/'.$row['status'])?>' class="status_link" title="<?=common::status($row['status'])?>"></a>-->
                <a href='<?=site_url('slider/edit_slider/'.$row['slider_id'])?>' class="edit_link" title="Change"></a>
                <a href='<?=site_url('slider/delete_slider/'.$row['slider_id'])?>' onclick='javascript: return confirm("Are you sure you want to delete?");' class="delete_link" title="Delete"></a>
            </td>
        </tr>
        <?php $inc++; endforeach;
    }else{
        echo "<tr><td colspan='3'>No Content Found!!!</td></tr>";
    }  ?></table>
</div>