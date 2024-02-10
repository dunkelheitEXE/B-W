<?php include("includes/header.php"); ?>
<?php 
session_start();
require "Db.php";
if(isset($_SESSION['user-id'])) {
    header("Location: Home.php");
}
?>
<div class="title">BLACK AND WHITE</div>
<div class="subtitle">Just wear like a boss and bring to the world your own style</div>
<?php include("includes/footer.php"); ?>
