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
    }

        public function listaJogadores()
        {
            $db = Database::getInstance();

            $stmt = $db->prepare('Select * from jogador');
            $stmt ->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function update(jogador $jogador) {
            $db = Database::getInstance();

            $stmt = $db->prepare ("UPDATE products SET name = ., price = ? WHERE id = ?");
        }
/*
        public function delete(Jogador $jogador) {
            $query = "DELETE FROM jogadores WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $jogador->getId());
            return $stmt->execute();
        }
        */
}