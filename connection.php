<?php
    $db = "mysql:host=localhost;dbname=shopping;charset=utf8";
    $nm = "root";
    $pa = "";
    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    try {
        $conn = new PDO($db,$nm,$pa);
    } catch (PDOException $e) {
        "the error is " . $e->getMessage();
    }    

?>