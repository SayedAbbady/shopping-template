<?php

    if (@$_GET['box'] == 'delete') {
        $idd = intval($_GET["id"]); 
        $sqldelet = "DELETE FROM post where id=$idd";
        // $conn->query($sqldelet);
        $stmt = $conn->prepare($sqldelet);
        $stmt->execute();
        // header('location:regester.php');
        
    }
    header('location:profile.php');
    ?>