
<!DOCTYPE html>
<html>

<?php

include 'templates/head.php';
require_once 'db/connect.php';
require_once 'db/functions.php';



if (isset($_POST['post'])) {

    $title = sanitize($_POST['title']);
    $content = sanitize($_POST['content']);

    $title = mysqli_real_escape_string($db, $title);
    $content = mysqli_real_escape_string($db, $content);

    $date = date('j F Y');

    $sql = "INSERT into posts (title, content, date) VALUES ('$title', '$content', '$date')";

    if($title == '' || $content == '') {

        echo "Chýba meno alebo obsah článku";
        return;
    }

    mysqli_query($db, $sql);

    header("Location: index.php");

}

?>


<body>



<?php include 'templates/register-form.php'; ?>
<?php include 'templates/menu.php'; ?>

<form class="article_edit" action="post.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="meno clanku" name="title" autofocus> <br>
    <textarea name="content" placeholder="obsah clanku" rows="20" cols="40"></textarea> <br>
    <input type="submit" name="post" value="POST">
</form>




</body>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/main.js"></script>

<script>

</script>

</body>
</html>
