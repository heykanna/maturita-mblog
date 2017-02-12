<?php

    require ('db/connect.php');

    session_start();

    if(isset($_POST['login'])) {
        $meno  = $_POST['meno'];
        $heslo = $_POST['heslo'];
        $heslo = md5($heslo);

        $sql = "SELECT * from users WHERE meno LIKE '{$meno}' AND heslo LIKE '{$heslo}' LIMIT 1";
        $result = $db->query($sql);
        if (!$result->num_rows == 1) {
            header("Location: index.php?login_fail");
        } else {
            $row = $result->fetch_assoc();
            $id = $row['user_id'];
            $admin = $row['admin'];
            $email = $row['email'];
            $_SESSION['id'] = $id;
            $_SESSION['meno'] = $meno;
            $_SESSION['admin'] = $admin;
            $_SESSION['email'] = $email;
            header("Location: index.php?logged");
        }
    }

?>