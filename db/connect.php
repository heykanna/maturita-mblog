<?php
    $db = new mysqli('localhost', 'root', '', 'mblog');
    if($db->connect_errno) {
        echo 'DB CONNECT ERROR';
        exit();
    }
?>