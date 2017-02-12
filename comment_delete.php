<?php

session_start();
include_once('db/connect.php');

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $pid = $_GET['pid'];
        $sql = "DELETE from comments WHERE id=$id";
        mysqli_query($db, $sql);
        header("Location: view_post.php?pid=$pid");
    }
} else {
    header("Location: index.php?denied");
}

?>