<?php

    session_start();
 
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>
    <?php
    if (defined('TITLE')) {
        print TITLE;
    }
    else {
print 'Bookerino Movies';
    }
    ?>
</title>



<style>
    <?php
        echo ".header, .footer, .tab {background-color: '#525252'}";
        echo ".tab .active, .contact-form, .perks {background-color: '#bfbfbf'}";
        echo ".header-subrow li a:hover, .tab li a:hover {";
        echo "background-color: #707070";
        echo "}";

    ?>
</style>
<link href="StyleSheet.css" rel="stylesheet">
<script src = "https://kit.fontawesome.com/a076d05399.js">
        </script>

</head>
<body>
    <?php
        echo "<div class = 'page-container'>";
        echo "<div class = 'content-wrap'>";
        
        //Start of Header
        echo "<div class ='header'>";
        echo "<div class ='header-row1'>";
        
        //Login/Register
        if (!isset($_SESSION['email'])){

            echo "<a href='login.php'>Sign In</a>";
            echo "&nbsp; | &nbsp;";
            echo "<a href='registration.php'>Register</a>";

        }
        else {
            print $_SESSION['email'];
            echo " | <a href='logout.php'>Log Out</a>";
        }
        echo "</div>";

        echo "<div class='header-row2'>";
        echo "<div class='header-column1'>";

        //Logo
        echo "<div class ='header-subrow1'>";
        echo "<a href='index.php'><img src='pictures/logo.png' width='275'></a>";
        echo "<input type='text' placeholder='Search'><button type='button'><i class='fa fa-search'></i></button>";
        echo "</div>";

        //Navigation Bar
        echo "<div class='header-subrow2'>";
        echo "<ul>";
        echo "<li><a href='movie.php'>All Movies</a></li>";
        echo "<li><a href='#'>Action</a></li>";
        echo "<li><a href='#'>Comedy</a></li>";
        echo "<li><a href='#'>Drama</a></li>";
        echo "<li><a href='#'>Horror</a></li>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";

        //Cart icon
        echo "<div class='header-column2'>";
        echo "<a href='#'><i class='fa fa-shopping-cart fa_custom fa-2x'></i></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        //End of Header

    ?>
