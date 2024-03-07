<?php
require_once 'banco.php';
require_once 'setPHP.php';
require_once 'crud.php';
use pdo_poo\Database;


class JogadorMapper {

    public function criarJogador(jogador $jogador) {
        $db = Database::getInstance();


        $name = $jogador->getName();
        $username = $jogador->getUsername();
        $email = $jogador->getEmail();
        $senha = $jogador->getSenha();
        $data_cadastro = $jogador->getCreatedata();

        $stmt = $db->prepare ("INSERT INTO jogador (name,username,email,senha,data_cadastro)
                    VALUES (:name,:username,:email,:senha,:data_cadastro)");

        $stmt -> bindParam(':name',$name);
        $stmt -> bindParam(':username',$username);
        $stmt -> bindParam(':email',$email);
        $stmt -> bindParam(':senha',$senha);
        $stmt -> bindParam(':data_cadastro',$data_cadastro);

        $stmt->execute();
        echo '<button><a href="index.html">Voltar</a></button>';
    }

        public function listaJogadores()
        {
            $db = Database::getInstance();

            $stmt = $db->prepare('Select * from jogador');
            $stmt ->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }


        public function updateJogador(jogador $jogador) {
            $db = Database::getInstance();

            $id = $jogador->getId();
            $name = $jogador->getName();
            $username = $jogador->getUsername();
            $email = $jogador->getEmail();
            $senha = $jogador->getSenha();
            $data_cadastro = $jogador->getCreatedata();

            $stmt = $db->prepare("UPDATE jogador SET name = :name ,username = :username ,email = :email, senha = :senha, data_cadastro =:data_cadastro
                    WHERE id = :id");

            $stmt -> bindParam(':id',$id);
            $stmt -> bindParam(':name',$name);
            $stmt -> bindParam(':username',$username);
            $stmt -> bindParam(':email',$email);
            $stmt -> bindParam(':senha',$senha);
            $stmt -> bindParam(':data_cadastro',$data_cadastro);

            $stmt ->execute();
            echo '<button><a href="visualizar.html">Voltar</a></button>';
        }

        public function geterID($id)
        {
            $db = Database::getInstance();
            //bindParam troca a os parametros '' pela variavel neste caso;
            $stmt = $db->prepare('Select * from jogador where id =:id');
            $stmt ->bindParam('id',$id);
            $stmt ->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result){
                $jogador = new jogador();
                $jogador -> setId($result['id']);
                $jogador -> setName($result['name']);
                $jogador -> setUsername($result['username']);
                $jogador -> setEmail($result['email']);
                $jogador -> setSenha($result['senha']);
                $jogador -> setCreatedata($result['data_cadastro']);
                return $jogador;
            }
            return null;

        }
        public function excluirUsuario(jogador $jogador)
        {
            $db = Database::getInstance();

            $id = $jogador->getId();

            $stmt = $db->prepare("delete from jogador where id = :id");
            $stmt ->bindParam('id',$id);
            $stmt ->execute();
            echo '<button><a href="index.html">Voltar</a></button>';

        }
}