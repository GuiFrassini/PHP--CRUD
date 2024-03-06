<?php
require_once 'crud.php';
require_once 'JogadorMapper.php';
require_once 'banco.php';

use pdo_poo\Database;

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? '';

if ($requestMethod === 'POST'){
    $JogadorMapper = new JogadorMapper();
    $action = $_POST['action'];
}
    switch ($action){

        case 'cadastrar':
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $createdata = date('Y-m-d');

        $JogadorMapper = new JogadorMapper();

        $jogador = new jogador();

        $jogador -> setName($name);
        $jogador -> setUsername($username);
        $jogador -> setEmail($email);
        $jogador -> setSenha($senha);
        $jogador -> setCreatedata($createdata);

        $JogadorMapper -> criarJogador($jogador);
        break;

        case 'editar':





            break;



        case 'listar':
            $result = $JogadorMapper->listaJogadores();

            $linhasDeUsuarios = '';

            foreach ($result as $item) {
                $linhasDeUsuarios .= '<tr>';
                $linhasDeUsuarios .= '<td>' . $item['id'] . '</td>';
                $linhasDeUsuarios .= '<td>' . $item['name'] . '</td>';
                $linhasDeUsuarios .= '<td>' . $item['username'] . '</td>';
                $linhasDeUsuarios .= '<td>' . $item['email'] . '</td>';
                $linhasDeUsuarios .= '<td>' . $item['senha'] . '</td>';
                $linhasDeUsuarios .= '<td>' . $item['data_cadastro'] . '</td>';
            }

            $template = file_get_contents(__DIR__ .'/visualizar.html');
            $template = str_ireplace('<!--AQUI_VEM_AS_LINHAS-->', $linhasDeUsuarios,$template);
            echo $template;
            break;

        case 'excluir':

            break;

         }