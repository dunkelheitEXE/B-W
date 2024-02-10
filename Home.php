<?php include("includes/header.php"); ?>
<?php
require "Db.php" ;
if(isset($_SESSION['user-id'])) {
    header("Location: index.php");
}
?>
<a href="Logout.php">LOGOUT</a>
<?php include("includes/footer.php"); ?>