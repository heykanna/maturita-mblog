<nav class="topmenu">
    <ul>
        <li><a href="index.php" class="active">BLOG</a></li>

        <?php

        if (login_check() === true) {
            echo '<li><a class="logout-btn" href="logout.php">LOG OUT</a></li>';
        } else {
            echo '<li><a class="login-btn" href="#">LOGIN</a></li>';
        }

        ?>


        <li><img src="img/mlogowhite.png"></li>
        <li><a href="#">KONTAKT</a></li>
        <li><a href="#">ADLERKA</a></li>
    </ul>
</nav>