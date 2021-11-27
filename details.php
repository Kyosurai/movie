<?php

$json = file_get_contents('movies.json');
$json = json_decode($json,true);


define ('TITLE', $json['moviename']);
require ('header.php');






require ('footer.php');
?>