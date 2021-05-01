<?php

    declare(strict_types=1);

    class Produto{

        /**
         * @var PDO
         */
        private $conexao;

        public function __construct()
        {

            $host = 'localhost';
            $dbname = 'teste';
            $user = 'root';
            $pass = '';

            try
            {
                $this->conexao = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
            }catch(Exception $e)
            {
                $e->getMessage();
                die();
            }

            return $this->conexao;
        }

        public function list() : array
        {
            $sql = 'SELECT * FROM produtos ORDER BY id ASC';

            $produtos = [];

            foreach($this->conexao->query($sql) as $valor)
            {
                //return 'Id: '.$valor['id'].'<br> Descrição: '.$valor['descricao'].'<br><hr>';
                array_push($produtos, $valor);
            }

            return $produtos;
        }

        public function insert(string $descricao) : int
        {
            $sql = 'INSERT INTO produtos(descricao) VALUES(?)';

            $prepare = $this->conexao->prepare($sql);

            $prepare->bindParam(1, $descricao);
            $prepare->execute();

            return $prepare->rowCount();
        }

        public function update(string $descricao, int $id) : int
        {
            $sql = 'UPDATE produtos SET descricao = ? WHERE id = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $descricao);
            $prepare->bindParam(2, $id);
            $prepare->execute();

            return $prepare->rowCount();
        }

        public function delete(int $id) : int
        {
            $sql = 'DELETE FROM produtos WHERE id = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $id);
            $prepare->execute();

            return $prepare->rowCount();
        }

    }    

?>