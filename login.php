<?php include("includes/header.php"); ?>
<?php
session_start();
require "Db.php";
if(isset($_SESSION['user-id'])) {
    header('Location: Home.php');
} else {
    $mess = "";
    if(isset($_POST['submit'])) {
        $param = $_POST['email']; // Get email
        try {// Prevent errors or bad return
            $id = $connection->getId('users', $param, $_POST['password']);
        } catch(\Throwable $e) {
            $id="";
        }


        if($id == "null" or $id == "") {
            $mes = "Some field is wrong";
        } else {
            $_SESSION['user-id'] = $id;
            header("Location: Home.php");
        }
    }else {
        $mess = "Something was wrong";
    }
}

if(!empty($mes)): ?>
    <div class="tg tg-danger"> <?= $mes ?> </div>
<?php 
endif;
?>

<form class="form" action="login.php" method="post">
    <p class="form-title"> Login </p>
    <input class="form-control" type="email" name="email" placeholder="e-mail" required>
    <input class="form-control" type="password" name="password" placeholder="password" required>
    <input class="form-control" type="submit" name="submit">
</form>
<?php include("includes/footer.php"); ?>