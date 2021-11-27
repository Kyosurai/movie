<?php
    define ('TITLE', 'Main');
    require ('header.php');

    //Main
    echo "<h4>Click the image below to start booking!</h4>";
    if (isset($_SESSION['email'])) {
        echo "<a href='movie.php'><img src='pictures/home.jpg'</a>";
    }
    else {
        echo "<a href='login.php'><img src='pictures/home.jpg'</a>";
    }
    echo "</div>";
    echo "</div>";

    require('footer.php');
?>