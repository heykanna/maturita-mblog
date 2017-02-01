<?php



    if (empty($_POST) === false) {

        $register_info = array('meno', 'email', 'heslo', 'heslo_repeat');

        foreach($_POST as $key=>$value) {
            if(empty($value) && in_array($key, $register_info) === true) { // ak je jeden z itemov prazdny

                $errors[] = 'VYPLNTE VŠETKY ÚDAJE';
                break 1;

            }
        }

        // validácia údajov
        if(empty($errors) === true) {
            if (user_exists($_POST['meno']) === true) {
                $errors[] = 'Toto meno je už obsadené.';
            }
            if (preg_match("/\\s/", $_POST['meno']) == true) {
                $errors[] = 'Meno nesmie obsahovať medzery.';
            }
            if (strlen($_POST['heslo']) < 6) {
                $errors[] = 'Heslo musí mať aspoň 6 znakov.';
            }
            if ($_POST['heslo'] !== $_POST['heslo_repeat']) {
                $errors[] = 'Heslá sa musia zhodovať.';
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'Zadajte správnu emailovú adresu.';
            }
            if (email_exists($_POST['email']) === true) {
                $errors[] = 'Uživateľ s touto emailovou adresou už existuje';
            }

        }
    }



?>