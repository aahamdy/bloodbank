<?php 

    $dsn    = 'mysql:host=localhost;dbname=Blood-Banks';
    $user   = 'root';
    $pass   = 'admin';
    $option = array (
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    try {
        $con    = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
        echo 'FAILD TO CONNECT' . $e->getMessage();

    }
