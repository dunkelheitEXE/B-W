<?php
require "db.php";
if(isset($_POST['submit'])) {
    $lis = array("papa" => "mama", "tepe"=>"tema");
    foreach ($lis as $key=>$value) {
        # code...
        echo $value;
    }
}
?>
<?php include("includes/header.php") ?>

<form action="signup.php" method="post">
    <input type="text" name="useremail" placeholder="e-mail" required>
    <input type="password" name="userpass" placeholder="password" required>
    <input type="password" name="confirmpass" placeholder="rewrite your password" required>
    <input type="text" name="username" placeholder="Nickname (not required)">
    <input type="submit" name="submit">
</form>

<?php include("includes/footer.php") ?>