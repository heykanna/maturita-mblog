<?php

    session_start();

    require 'connect.php';
    require 'functions/users.php';
    require 'functions/functions.php';

    if (login_check() === true) {
        $session_user_id = $_SESSION['user_id'];
        $user_data = user_data($session_user_id, 'user_id', 'meno', 'heslo', 'email');
    }

    $errors = array();

?>