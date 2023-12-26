<?php
require "db.php";
try {
    //code...
if(isset($_POST['submit'])) {
    echo "Submit done successfully";
}

} catch (\Throwable $th) {
    echo $th;
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