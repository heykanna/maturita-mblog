<?php

require "db/connect.php";

session_start();

$postid = $_GET['pid'];

if (isset($_POST['comment'])) {

    $meno = $_SESSION['meno'];
    $content = $_POST['content'];
    $sql = "INSERT into comments (name, content, pid) VALUES ('$meno', '$content', '$postid')";

    if($result = $db->query($sql)) {
        header("Location: view_post.php?pid=$postid");
    } else {
        echo "sql2";
    }
} else {
    echo "sql";
}

?>