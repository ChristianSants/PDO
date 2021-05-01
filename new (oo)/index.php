<?php

    include_once('produto.php');
    $usuario = new Produto();

    switch($_GET['operacao'])
    {
        case 'list':
            
            echo '<h3> Produtos: </h3>';

            foreach($usuario->list() as $valor)
            {
                echo 'Id: '.$valor['id'].'<br> Descrição: '.$valor['descricao'].'<br><hr>';
            }

        break;

        case 'insert':

            $status = $usuario->insert('Testando CASE INSERT');

            if(!$status)
            {
                echo 'Erro, tente novamente!';
                die();
            }
            else
            {
                echo 'Cadastrado com sucesso!';
            }

        break;

        case 'update':

            $num = rand('1', '9999');
            $status = $usuario->update('Alterando com CASE UPDATE número '.$num, 5);

            if(!$status)
            {
                echo 'Erro, tente novamente!';
                die();
            }
            else
            {
                echo 'Alterado com sucesso!';
            }

        break;

        case 'delete':

            $status = $usuario->delete(8);

            if(!$status)
            {
                echo 'Erro, tente novamente!';
                die();
            }
            else
            {
                echo 'Deletado com sucesso!';
            }

        break;

    }   
?>