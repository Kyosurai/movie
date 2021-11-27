<?php
    define ('TITLE', 'Log Out');
    require ('header.php');

    unset($_SESSION);
    session_destroy();

    echo "<div class='main'>";
    echo "<p>Your account has been logged out successfully. </p>";
    // index.php as main page
    echo "<a href='index.php'> Back to Main Page</a>";
    //end
    echo "</div>";

    require ('footer.php');
?>