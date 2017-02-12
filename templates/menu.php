<nav class="topmenu">
    <ul>
        <li><a href="index.php" class="active">BLOG</a></li>

        <?php

        if (isset($_SESSION['id'])) {
            echo '<li><a class="logout-btn" href="logout.php">LOG OUT</a></li>';

        } else {
            echo '<li><a class="login-btn" href="#">LOGIN</a></li>';
        }



        ?>


        <li><img src="img/mlogowhite.png"></li>

        <?php

        if (isset($_SESSION['id'])) {
            echo "<li><a href='#'>PROFIL<div class='user'>";
            echo $_SESSION['meno'];
            echo "</div></a></li>";
        } else {
            echo "<li><a href='http://www.adlerka.sk'>ADLERKA</a></li>";
        }

        ?>
        <li><a href="#">INFO</a></li>


    </ul>
</nav>