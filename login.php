<?php
    define ('TITLE', 'Sign In');
    require ('header.php');

    require_once "dbcon.php";

    echo "<div class='main'>";

    if (isset($_POST['submitted'])) {
        $email = $_POST['email'];
        $pw = $_POST['pw'];

        $validemail = false;
        $filledform = false;

        //Check for email 
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Invalid email address</p>";
        }
        else {
            $validemail = true;
        }

        //Check if any space is empty
        if (empty($email) && empty($pw)) {
            echo "<p>Please enter your email and password. </p>";
        }
        elseif (empty($email)) {
            echo "<p>Please enter your email. </p>";
        }
        elseif (empty($pw)){
            echo "<p>Please enter your password. </p>";
        }
        else {
            $filledform = true;
        }

        if ($filledform == true && $validemail == true) {
            $_SESSION['email'] = $email;
            echo "<a href='index.php'>Back to Main Page. </a>";
        }
    }

    
    else {
        //Login Form
        echo "<div class='login-container'>";
        echo "<center>";
        echo "<h2>Sign In</h2>";
        echo "<br>";
        echo "<table>";
        echo "<tr>";
        echo "<td><label for='email'><b>Email</b>&nbsp;</label><br><br></td>";
        echo "<td><input type='text' placeholder= 'Enter Email Address.' name='email'><br><br></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label for='pw'><b>Password</b>&nbsp;</label></td>";
        echo "<td><input type='password' placeholder='Enter your password.' name='pw'></td>";
        echo "</tr>";
        echo "</table>";
        echo "<br><br>";
        echo "<button type='submit'>Login</button>";
        echo "<br><br>";
        echo "<div class='login-extra'>";
        echo "<label>";
        echo "<input type='checkbox' checked='checked' name='rememberme'>Remember Me?";
        echo "</label>";
        echo "<br><br><br><br>";
        echo "<a href='#'>Forgot your password?</a>";
        echo "<br><br>";
        echo "<a href='registration.php'>Register a new account.</a>";
        echo "</div>";
        echo "<input type='hidden' name='submitted' value='true' />";
        echo "</form>";
        echo "</center>";
        echo "</div>";
        //End of form
    }

    echo "</div>";
    require ('footer.php');

?>