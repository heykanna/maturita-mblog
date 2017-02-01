<?php
    include 'register.php';

    if (isset($_GET['success']) && empty($_GET['success'])) {
        echo '<div class="message">Registrácia prebehla úspešne ! :)</div>';
    }

    if (empty($_POST) === false && empty($errors) === true) {

        $register_data = array(
            'meno'  => $_POST['meno'],
            'email' => $_POST['email'],
            'heslo' => $_POST['heslo']
        );

        register_user($register_data);

        header('Location: index.php?success');
        exit();

    } else if (empty($errors) === false) {
        echo error_output($errors);
    }
?>

<form class="register-form" action="" method="post">

    <a href="#" class="close-btn">X</a>

    <ul>

        <li>
            <label for="user">meno</label>
            <input type="text" name="meno" placeholder="Zadajte Vaše meno">
        </li>

        <li>
            <label for="email">e-mail</label>
            <input type="text" name="email" placeholder="Zadajte emailovú adresu">
        </li>

        <li>
            <label for="heslo">heslo</label>
            <input type="password" name="heslo" placeholder="Zadajte heslo">
        </li>

        <li>
            <label for="heslo_repeat">zopakuj heslo</label>
            <input type="password" name="heslo_repeat" placeholder="Ešte raz">
        </li>

        <li class="login-li">
            <input type="submit" value="REGISTRUJ MA">
        </li>


    </ul>

</form>

<div class="dark-bg"></div>