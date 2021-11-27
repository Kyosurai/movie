<?php
    define ('TITLE','Contact Us');
    require('header.php');
    echo "<div class='contact-container'>";

    echo "<h1>Contact Us</h1>";
    echo "<div class='some-text'>";
    echo "<p>We are experiencing longer than usual response times due to Covid-19. We appreciate your patience and apologize in advace for any delays in responding to your message. </p>";
    echo "<p>Please fill out the form below to reach out to us. </p>";
    echo "</div>";
    echo "<div class='contactus-form'>";
    echo "<center>";
    if (isset($_POST['submitted'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNo = $_POST['contactNo'];
        $feedback = $_POST['feedback'];

        $validName = false;
        $validEmail = false;
        $validcontactNo = false;
        $filledForm = false;
        
        //To check for errors
        if (!empty($name) && !preg_match("/^[A-Za-z ]", $name)) {
            echo "<p>Only letters and white spaces are allowed for name.</p>";
        }
        else {
            $validName = true;
        }

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Email address invalid.</p><br/>";
        }
        else {
            $validEmail = true;
        }

        if (!empty($contactNo)) { 
            if (!is_numeric($contactNo)){
                echo "<p>Contact number should only contain digits (0 - 9)</p><br/>";
            }
            elseif (strlen($contactNo)<10 || strlen($contactNo)>11){
                echo "<p>Contact number incorrect length:  </p>";
                echo "<p>Handphone number only contains 10 or 11 digits. </p><br/>";
            }
            else {
                $validcontactNo = true;
            }
        }
        //End check for individual errors

        //Check for empty spaces
        if (empty($name) && empty($email) && empty($contactNo) && empty($feedback)) {
            echo "<p>Please enter your name, email, contact number and feedback. </p>";
        }
        elseif (empty($name) && empty($email) && empty($contactNo)) {
            echo "<p>Please enter your name, email and contact number.</p>";
        }
        elseif (empty($name)&& empty($email) && empty($feedback)){
            echo "<p>Please enter your name, email and feedback.</p>";
        }
        elseif (empty($email) && empty($contactNo) && empty($feedback)) {
            echo "<p>Please enter your email, contact number and feedback.</p>";
        }
        elseif (empty($name) && empty($email)) {
            echo "<p>Please enter your name and email.</p>";
        }
        elseif (empty($name) && empty($contactNo)) {
            echo "<p>Please enter your name and contact number.</p>";
        }
        elseif (empty($name) && empty($feedback)) {
            echo "<p>Please enter your name and feedback.</p>";
        }
        elseif (empty($email) && empty($contactNo)) {
            echo "<p>Please enter your email and contact number.</p>";
        }
        elseif (empty($email) && empty($feedback)) {
            echo "<p>Please enter your email and feedback.</p>";
        }
        elseif (empty($contactNo) && empty($feedback)) {
            echo "<p>Please enter your contact number and feedback.</p>";
        }
        elseif (empty($name)){
            echo "<p>Please enter your name.</p>";
        }
        elseif (empty($email)){
            echo "<p>Please enter your email.</p>";
        }
        elseif (empty($contactNo)) {
            echo "<p>Please enter your contact number.</p>";
        }
        elseif (empty($feedback)) {
            echo "<p>Please enter your feedback.</p>";
        }
        else {
            $filledForm = true;
        }
        if ($validName == true && $validEmail == true && $validcontactNo == true && $filledForm == true) {
            echo "<p>Your form has been submitted successfully.<br/> Thank you for your feedback and we will get back to you soon!</p>";
        }
        echo "<p><a href='contactus.php'>Go Back</a></p>";
    }
    else {
        //Contact Us form
        echo "<form action='contactus.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td class='tablecolumn1'><label for='name'><b>Name</b>&nbsp;</label></td>";
        echo "<td class='tablecolumn2' rowspan='6'></td>";
        echo "<td class='tablecolumn3'><label for='subject'><b>Subject (Optional)</b>&nbsp;</label></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='tablecolumn1input'><input type='text' placeholder='Enter Your Name:' name='name'></td>";
        echo "<td class='tablecolumn3'><input type='text' placeholder='Enter a Subject:' name='subject'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='tablecolumn1'><label for='email'><b>Email Address</b>&nbsp;</label></td>";
        echo "<td class='tablecolumn3'><label for='feedback'><b>Feedback</b>&nbsp;</label></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='tablecolumn1input'><input type='text' placeholder='Enter Your Email Address' name='email'></td>";
        echo "<td class='tablecolumn3' rowspan='3'><textarea placeholder='Enter Your Feedback Here' name='feedback' rows='8' cols='35'></textarea></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='tablecolumn1'><label for='contactNo'><b>Contact Number</ba>&nbsp;</label></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='tablecolumn1input'><input type='text' placeholder='Enter Contact Number' name='contactNo'></td>";
        echo "</tr>";
        echo "</table>";
        echo "<br>";
        echo "<button type='submit'>Submit Form</button>";
        echo "<input type='hidden' name='submitted' value='true' />";
        echo "</form>";
        //End of form
    }
echo "</center>";
echo "</div>";



echo "</div>";
require ('footer.php');
?>