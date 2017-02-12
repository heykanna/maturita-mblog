<?php

require('db/connect.php');

if(isset($_POST['register'])) {

    $meno       = $_POST['meno'];
    $heslo      = $_POST['heslo'];
    $heslo_r    = $_POST['heslo_repeat'];
    $email      = $_POST['email'];

    $exists = 0;
    $result = $db->query("SELECT meno FROM users WHERE meno='{$meno}' LIMIT 1");
    if ($result->num_rows == 1) {
        $exists = 1;
    } else {
        $result = $db->query("SELECT email FROM users WHERE email='{$email}' LIMIT 1");
        if($result->num_rows ==1) $exists = 2;
    }

    if($heslo !== $heslo_r) $exists = 3;


    $heslo = md5($heslo);

    if($exists == 0) {
        $sql = "INSERT INTO `users` (`meno`, `email`, `heslo`) VALUES ('{$meno}', '{$email}', '{$heslo}')";
    } else {
        header("Location: index.php?regsiter_fail");
        exit();
    }

    if($db->query($sql)) {
        header("Location: index.php?register_success");
    } else {
        header("Location: index?php?register_query_fail");
    }




}

?>