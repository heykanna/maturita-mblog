<!DOCTYPE html>
<html>

<?php

session_start();

include 'templates/head.php';
require 'db/connect.php';
require 'db/functions.php';

$pid = $_GET['pid'];


?>


<body>


<?php include 'templates/register-form.php'; ?>
<?php include 'templates/menu.php'; ?>

<section class="articles-wrap">


<?php


$sql = "SELECT * FROM posts WHERE id=$pid LIMIT 1";

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

        $posts .= "<div class='article view'>
                           
                           <a class='article-nazov' href='view_post.php?pid=$id'>$title</a>
                           <div class='info'>
                           <span class='autor'>Marek Rieger</span> | <span class='datum'>$date</span></div>
                           $admin
                           <div class='obsah'><p>$content</p></div></div>";
    }
    echo $posts;
} else {
    echo "CHYBA";
}


?>

</section>

<section class="comments">

    <h2>Komentáre</h2>
    
    <?php

    if (isset($_SESSION['id'])) {

        echo "<form method='post' action='comment.php?pid=$pid'>
        <textarea placeholder='Vyjadrite svoju názor' name='content'></textarea>
        <input type='submit' name='comment' value='ODOSLAŤ'>
        </form>";
    } else {
        echo "<br>Pre pridávanie komentárov musíš byť prihlásený<br><br>";
    }
    ?>

<?php

$sql_com = "SELECT * FROM comments WHERE pid=$pid ORDER BY id DESC";

$result_com = $db->query($sql_com);
$comments = "";

if($result_com->num_rows > 0) {
    while($row = $result_com->fetch_assoc()) {

        $id = $row['id'];
        $name = $row['name'];
        $content = $row['content'];
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            $admin = "<a class='del_comment' href='comment_delete.php?id=$id&pid=$pid'>x</a>";
        }

        $comments .= "<div class='comment_wrap'><span class='comment_meno'>$name</span> <p class='comment_body'>$content</p> $admin </div>";

    } echo $comments;

} else {
    echo "Tento článok neobsahuje žiadne komentáre.";
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
