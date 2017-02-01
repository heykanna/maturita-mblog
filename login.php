
<!DOCTYPE html>
<html>

<?php

include 'db/init.php';

include 'templates/head.php';

?>


<body>



<?php include 'templates/menu.php'; ?>
<?php include 'templates/header.php'; ?>

<section class="login-form">

    <?php

        if (login_check() === true) {
            echo 'LOGGED IN';
        } else {
            include 'templates/login.php';
        }

    ?>

</section>



</body>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/main.js"></script>

<script>

</script>

</body>
</html>
