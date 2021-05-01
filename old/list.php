<?php

    declare(strict_types=1);

    $pdo = require 'connect.php';
    $sql = 'SELECT * FROM produtos';

    echo '<h3> Produtos: </h3>';

    foreach($pdo->query($sql) as $valor){
        echo 'Id: '.$valor['id'].'<br> Descrição: '.$valor['descricao'].'<br><hr>';
    }

?>