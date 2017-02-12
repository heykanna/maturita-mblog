<?php

session_start();
include_once('db/connect.php');

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {


    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $sql = "DELETE from posts WHERE id=$pid";
        mysqli_query($db, $sql);
        header("Location: index.php");
    }
} else {
    header("Location: index.php?denied");
}

?>