
<!DOCTYPE html>
<html>

<?php


include 'templates/head.php';
require 'db/connect.php';
require 'db/functions.php';

session_start();

$pid = $_GET['pid'];

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {


    if (isset($_POST['update'])) {

        $title = sanitize($_POST['title']);
        $content = sanitize($_POST['content']);

        $title = mysqli_real_escape_string($db, $title);
        $content = mysqli_real_escape_string($db, $content);

        $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$pid";

        if ($title == '' || $content == '') {

            echo "Chýba meno alebo obsah článku";
            return;
        }

        mysqli_query($db, $sql);

        header("Location: index.php?updated");

    }

}
?>


<body>


<?php include 'templates/register-form.php'; ?>
<?php include 'templates/menu.php'; ?>


<?php

$sql_get = "SELECT * FROM posts WHERE id=$pid LIMIT 1";

if ($result = $db->query($sql_get)) {


    while ($row = $result->fetch_assoc()) {

        $title = $row['title'];
        $content = $row['content'];
        $content = sanitize($content);

        echo "<form class='article_edit' action='post_edit.php?pid=$pid' method='post' enctype='multipart/form-data'>";
        echo "<input type='text' value='$title' placeholder='meno clanku' name='title' autofocus> <br>";
        echo "<textarea name='content' placeholder='obsah clanku'>$content</textarea> <br>";
        echo "<input type='submit' name='update' value='UPRAVIŤ'></form>";

    }

}

?>






</body>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/main.js"></script>

<script>

</script>

</body>
</html>
