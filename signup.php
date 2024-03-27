<?php include("includes/header.php");?>
<?php
session_start();
require "Db.php";
$mes = "";
if (isset($_POST['submit'])) {
    if($_POST['confirm'] != $_POST['password']) {
        $mes = "Password has not been confirmed";
    } else {
        //$mes = $con->insert("users", "useremail, userpassword, username, userphoto", ":useremail, :userpassword, :username, :userphoto", "email, password, nickname, profilephoto");
        $mes = $connection->insert("users", "useremail, userpassword, username, userphoto", ":useremail, :userpassword, :username, :userphoto", "email, password, nickname, userphoto");
        
    }
}

if(!empty($mes)) {
    echo $mes;
}
?>
<form class="form" action="signup.php" method="post" enctype="multipart/form-data">
    <p class="form-title">Sign up</p>
    <input class="form-control" type="email" name="email" placeholder="e-mail" required>
    <input class="form-control" type="password" name="password" placeholder="password" required>
    <input class="form-control" type="password" name="confirm" placeholder="rewrite your password" required>
    <input class="form-control" type="text" name="nickname" placeholder="Nickname (not required)">
    <input class="form-control" type="file" name="userphoto" placeholder="photo">
    <input class="form-control" type="submit" name="submit">
</form>

<?php include("includes/footer.php");?>