<?php

    include 'db/init.php';


    if (empty($_POST) === false) {

        $meno = $_POST['meno'];
        $heslo = $_POST['heslo'];

        if (empty($meno) === true || empty($heslo) === true) {
            $errors[] = 'Zadajte meno & heslo';
        } else if (user_exists($meno) === false) {
            $errors[] = 'Uživateľ neexistuje';
        } else {
            $login = login($meno, $heslo);

            if($login == false) {
                $errors[] = 'Nesprávne meno alebo heslo';
            } else {
                $_SESSION['user_id'] = $login;
                header('Location: index.php?logged');
                exit();
            }
        }

        echo error_output($errors);

    }

?>