<?php
require "db.php";
$message="";
if(isset($_POST['submit'])){
    if($_POST['userpass'] != $_POST['confirmpass']) {
        $message = "Password has not been confirmed";
    } else {
        $status = true;
        $verifying = $connection->prepare("SELECT * FROM users");
        $verifying->execute();
        while($results = $verifying->fetch()) {
            if($_POST['useremail'] == $results['useremail']) {
                $status = false;
                $message = "This user has already been loged up";
                break;
            }
        }
        if($status == true) {
            $query = $connection->prepare("INSERT INTO users(useremail, userpass, username) VALUES(:useremail, :userpass, :username)");
            $query->bindParam(':useremail', $_POST['useremail']);
            $userpass = password_hash($_POST['userpass'], PASSWORD_BCRYPT);
            $query->bindParam(':userpass', $userpass);
            $query->bindParam(':username', $_POST['username']);

            if($query->execute()) {
                $message = "User has been loged successfully!";
            }
        }
    }
}
?>
<?php include("includes/header.php") ?>
<?php if(!empty($message) or $message != ""):?>
<?php if($status == true): ?>
    <div class="tg tg-success"><?= $message ?></div>
<?php else:?>
    <div class="tg tg-danger"><?= $message ?></div>
<?php endif;?>
<?php endif;?>

<form action="signup.php" method="post">
    <input type="email" name="useremail" placeholder="e-mail" required>
    <input type="password" name="userpass" placeholder="password" required>
    <input type="password" name="confirmpass" placeholder="rewrite your password" required>
    <input type="text" name="username" placeholder="Nickname (not required)">
    <input type="submit" name="submit">
</form>

<?php include("includes/footer.php") ?>