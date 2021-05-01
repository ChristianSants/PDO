<?php

    declare(strict_types=1);

    $pdo = null;

    $host = 'localhost';
    $dbname = 'teste';
    $user = 'root';
    $pass = '';

    try{
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
    }catch(Exception $e){
        $e->getMessage();
        die();
    }

    return $pdo;

?>