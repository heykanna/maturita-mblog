<?php


    function user_data($user_id) {

        $data = array();
        $user_id = (int)$user_id;

        $args_num = func_num_args();
        $args = func_get_args();

        if ($args_num > 1) {

            unset($args[0]);

            $fields = '`' . implode('`, `', $args) . '`';
            $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));

            print_r($data);
        }

    }

    function login_check() {
        return (isset($_SESSION['user_id'])) ? true : false;
    }

    function user_exists($meno) {

        $meno = sanitize($meno);
        return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `meno` = '$meno' "), 0) == 1) ? true : false;

    }

    function get_id($meno) {
        $meno = sanitize($meno);
        return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `meno` = '$meno'"), 0, 'user_id');
    }

    function login($meno, $heslo) {
        $user_id = get_id($meno);

        $meno = sanitize($meno);
        $heslo = md5($heslo);

        return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `meno` = '$meno' AND `heslo` = '$heslo'"), 0) == 1) ? $user_id : false;
    }

?>