<?php include("includes/header.php");?>
<?php
require "Db.php";
$mes = "";
if (isset($_POST['submit'])) {
    if($_POST['confirm'] != $_POST['password']) {
        $mes = "Password has not been confirmed";
    } else {
        //$mes = $con->insert("users", "useremail, userpassword, username, userphoto", ":useremail, :userpassword, :username, :userphoto", "email, password, nickname, profilephoto");
        $mes = $connection->insert("users", "useremail, userpassword, username, userphoto", ":useremail, :userpassword, :username, :userphoto", "email, password, nickname, profilephoto");
    }
}

if(!empty($mes)) {
    echo $mes;
}
?>
<form action="signup.php" method="post">
    <input type="email" name="email" placeholder="e-mail" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="password" name="confirm" placeholder="rewrite your password" required>
    <input type="text" name="nickname" placeholder="Nickname (not required)">
    <input type="text" name="profilephoto" placeholder="photo">
    <input type="submit" name="submit">
</form>

<?php include("includes/footer.php");?>