<?php include("includes/header.php"); ?>
<?php
require "Db.php" ;
if(isset($_SESSION['user-id'])) {
    header("Location: index.php");
}
?>
<style>
    .user-tag {
        position: absolute;
        display: flex;
        top: 0;
        right: 0;
        background-color: var(--color-dark);
    }

    .user-tag-img {
        width: 25px;
        height: auto;
        
    }

    .user-tag-img img {
        width: 25px;
        height: auto;
        border-radius: 50%;
    }

    .user-tag-name {
        color: white;
        text-decoration: none;
    }

    .user-tag-name:hover {
        color: var(--color-dark);
    }

    .logout-btn {
        color: white;
        text-decoration: none;
        font-weight: 700;
    }

    .logout-btn:hover {
        color: var(--color-dark);
    }

    .profile-btn {
        background-color: var(--color-dark);
        padding: 10px;
        align-items: center;
        justify-content: center;
    }

    .profile-btn:hover {
        background-color: white;
    }
</style>
<div class="user-tag">
    <a href="#" class="user-tag-img profile-btn"><img src="https://imgs.search.brave.com/FOFn85Dhuk49-Y3ioj-_HdI4pjVISIrfdwgO1nOan5w/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pY29u/cy52ZXJ5aWNvbi5j/b20vcG5nL28vaW50/ZXJuZXQtLXdlYi9w/cmVqdWRpY2UvdXNl/ci0xMjgucG5n" alt=""></a>
    <a href="#" class="user-tag-name profile-btn">Alan</a>
    <a href="Logout.php" class="logout-btn profile-btn">LOGOUT</a>
</div>

<?php include("includes/footer.php"); ?>