

<form autocomplete="off" action="<?php echo BASE_URL?>/login/authentication_login" method="POST">
    <?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(isset($data['msg'])){
            echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>';
        }
    ?>
    <table>
        <tr>
            <td> <label for="title">Username</label></td>
            <td><input type="text" name="username" required /></td>
        </tr>
        <tr>
            <td><label for="desc">Password</label></td>
            <td><input type="password" name="password" required /></td>
        </tr>
        <tr>
            <td><button type="submit" name='login'>Login</button></td>
        </tr>
    </table>
</form>
