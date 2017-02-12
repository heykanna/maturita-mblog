
<!DOCTYPE html>
<html>

<?php

    session_start();

    include 'db/connect.php';
    include 'templates/head.php';

    // zobrazovanie informácií na základe GET-ov

    if (isset($_GET['logged'])) {
        echo '<div class="message">Prihlásený</div>';
    }
    if (isset($_GET['denied'])) {
        echo '<div class="message">Prístup zamietnutý</div>';
    }
    if (isset($_GET['logged_out'])) {
        echo '<div class="message">Odhlásený</div>';
    }
    if (isset($_GET['updated'])) {
        echo '<div class="message">Príspevok updatnutý</div>';
    }
    if (isset($_GET['login_fail'])) {
        echo '<div class="message">Nesprávne meno alebo heslo</div>';
    }

?>


<body>



<?php include 'templates/register-form.php'; ?>
<?php include 'templates/menu.php'; ?>
<?php include 'templates/header.php'; ?>

<?php

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) echo "<a href='post.php' class='post-btn'>POST</a>";


?>

<section class="articles-wrap">


    <?php

        $sql = "SELECT * FROM posts ORDER BY id DESC";

        $result = $db->query($sql);

        $posts = "";

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];
                $admin = "";

                if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                    $admin = "<div class='post del'><a href='post_delete.php?pid=$id'>VYMAZAŤ</a></div><div class='post edit'><a href='post_edit.php?pid=$id'>UPRAVIŤ</a></div>";
                }

                $posts .= "<div class='article'>
                           <div class='img-wrap'><img src='http://placehold.it/200x200'></div>
                           <a class='article-nazov' href='view_post.php?pid=$id'>$title</a>
                           <div class='info'>
                           <span class='autor'>Marek Rieger</span> | <span class='datum'>$date</span></div>
                           $admin
                           <div class='obsah'><p>$content</p></div></div>";
            }
            echo $posts;
        } else {
            echo "Nenašli sa žiadne príspevky";
        }

    ?>



</section>


</body>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/main.js"></script>

<script>

</script>

</body>
</html>
