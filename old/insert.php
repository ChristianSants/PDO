<?php

    declare(strict_types=1);

    $pdo = require 'connect.php';

    // Comentários para entender a ordem
    //$sql = 'INSERT INTO produtos(id, descricao) VALUES(?, ?)';

    $sql = 'INSERT INTO produtos(descricao) VALUES(?)';

    $prepare = $pdo->prepare($sql);  // Este fica

    //$prepare->bindParam(1, $_POST['id']);
    //$prepare->bindParam(2, $_POST['descricao']);

    $prepare->bindParam(1, $_GET['descricao']);
    $prepare->execute();

    echo $prepare->rowCount();

?>