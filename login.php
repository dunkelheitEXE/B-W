<?php include("includes/header.php"); ?>
<?php
session_start();
require "Db.php";
if(isset($_SESSION['user-id'])) {
    header('Location: Home.php');
} else {
    $mess = "";
    if(isset($_POST['submit'])) {
        $post = $_POST['email'];
        $id = $connection->getId('users', 'useremail', $post, 'userpassword');
        if($id == "null" or $id == "") {
            echo "Some field is wrong";
        } else {
            $_SESSION['user-id'] = $id;
            header("Location: Home.php");
        }
    }else {
        $mess = "Something was wrong";
    }
}

?>

<form action="login.php" method="post">
    <input type="email" name="email" placeholder="e-mail" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="submit" name="submit">
</form>
<?php include("includes/footer.php"); ?>