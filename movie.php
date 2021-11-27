<?php  
    define ('TITLE', 'All Movies');
    require ('header.php');

    $jsondata = file_get_contents('movies.json'); 
    $json = json_decode($jsondata,true);


    foreach ($json as $row){
        echo "<tr>";
        echo "<td><li>".$row['moviename']."</li></td>";
        echo "<td><a href='details.php'><img src='".$row['image']."'/></a><br><br/></td>";
        echo "</tr>";
    }






    require ('footer.php');
?>




