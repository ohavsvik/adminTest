<p>Please log in to access the admin content</p>
<p>(Username: admin, Password: password)</p>
<?php
    $previous = isset($_GET['referer']) ? htmlentities($_GET['referer'], ENT_COMPAT, "UTF-8") : "";
?>
<form action="postprocess.php" method="post">
<table>
    <input type='hidden' name='referer' value=<?= $previous ?> />
    <tr>
        <td>Username: </td>
        <td><input type="name" name="username" placeholder="Enter User"></td>
    </tr>
    <tr>
        <td>Password: </td>
        <td><input type="password" name="password" placeholder="Enter Password"></td>
    </tr>
   <tr>
       <td><input type="submit" value="Access" name="form"></td>
   </tr>
</label>
</table>
</form>
