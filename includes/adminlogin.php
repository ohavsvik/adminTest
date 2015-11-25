<p>Please log in to access the admin content</p>
<p>(Username: admin, Password: password)</p>
<?php
    $previous = isset($_GET['referer']) ? htmlentities($_GET['referer']) : "";
    $usernamevalue = isset($_COOKIE['adminName']) ? "value='" . $_COOKIE['adminName'] . "'" : "";
?>
<form action="postprocess.php" method="post" autocomplete="on">
<table>
    <input type='hidden' name='referer' value=<?= $previous ?> />
    <tr>
        <td>Username: </td>
        <td><input type="name" name="username" <?= $usernamevalue ?> placeholder="Enter User"/></td>
    </tr>
    <tr>
        <td>Password: </td>
        <td><input type="password" name="password"  /></td>
        <td><input type="checkbox" name="rememberme" value="yes"/>Remember me!</td>
    </tr>
   <tr>
       <td><input type="submit" value="Access" name="form"/></td>
   </tr>
</label>
</table>
</form>
