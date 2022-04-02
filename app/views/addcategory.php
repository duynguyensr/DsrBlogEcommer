

<form autocomplete="off" action="<?php echo BASE_URL?>/category/insertcategory" method="POST">
    <?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(isset($data['msg'])){
            echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>';
        }
    ?>
    <table>
        <tr>
            <td> <label for="title">Title</label></td>
            <td><input type="text" name="title" required /></td>
        </tr>
        <tr>
            <td><label for="desc">Desc</label></td>
            <td><input type="text" name="desc" required /></td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
        </tr>
    </table>
</form>
