<?php include("includes/header.php"); ?>
<?php 
$a = "1, 2";
$aa = explode(', ', $a);
foreach($aa as $vv) {
    if($vv == "2") {
        echo "b";
    }else {
        echo "a";
    }
}
?>
<div class="title">BLACK AND WHITE</div>
<div class="subtitle">Just wear like a boss and bring to the world your own style</div>
<?php include("includes/footer.php"); ?>
