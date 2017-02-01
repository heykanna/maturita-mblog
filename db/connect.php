<?php

    $connect_error = 'DB ERROR';
    mysql_connect('localhost', 'root', '') or die($connect_error); // delete die when page is live
    mysql_select_db('mblog');

?>