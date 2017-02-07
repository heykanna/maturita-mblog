
<!DOCTYPE html>
<html>

<?php

    include 'db/init.php';

    include 'templates/head.php';

    if (isset($_GET['logged']) && empty($_GET['logged'])) {
        echo '<div class="message">Logged in :)</div>';
    }

?>


<body>



<?php include 'templates/register-form.php'; ?>
<?php include 'templates/menu.php'; ?>
<?php include 'templates/header.php'; ?>



<div class="benefits"></div>


<section class="articles-wrap">

    <div class="article">
        <div class="img-wrap">
            <img src="http://placehold.it/200x200">
        </div>

        <a href="#" class="article-nazov">Názov článku</a> <h2 class="article-hodnotenie">8.5 / 10</h2>
        <div class="info">
            <span class="autor">Marek Rieger</span> | <span class="datum">15. mája 2017</span> | <span class="komentare">10 komentárov</span>
        </div>

        <div class="obash">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nulla nulla purus, posuere a maximus nec, luctus ut diam.
                Nulla semper at mi in gravida. Suspendisse ornare vel sem ac posuere.
                Aliquam vehicula laoreet gravida. Sed scelerisque ullamcorper turpis,
                a consequat leo ultrices eu. Nam scelerisque, justo non ornare interdum,
                ex lectus auctor odio, sit amet cursus tortor ante nec nunc.
                Aliquam scelerisque tincidunt eros eget mollis. Ut vel leo condimentum,
                pellentesque odio in, luctus dui. Praesent nec viverra metus,
                id bibendum leo.


            </p>
        </div>
    </div>

    <?php

        $sql = "SELECT * FROM posts ORDER BY id DESC";

        $result = mysqli_query($db, $sql) or die (mysqli_error());

        $posts = "";

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];

                $admin = ""; // add edit/delete later

                $posts .= "<div class='article'>
                           <div class='img-wrap'><img src='http://placehold.it/200x200'></div>
                           <a class='article-nazov' href='view_post.php?pid=$id'>$title</a>
                           <div class='info'>
                           <span class='autor'>Marek Rieger</span> | <span class='datum'>$date</span>
                           </div>
                           <div class='obsah'><p>$content</p></div>
                           </div>";
            }
            echo $posts;
        } else {
            echo "Nenašli sa žiadne príspevky";
        }

    ?>



</section>


</body>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/main.js"></script>

<script>

</script>

</body>
</html>
