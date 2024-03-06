<?php

class jogador
{
    private int $id;
    private string $name;
    private string $username;
    private string $email;
    private string $senha;
    private string $createdata;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;

    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getCreatedata(): string
    {
        return $this->createdata;
    }

    public function setCreatedata($createdata)
    {
        $this->createdata = $createdata;
    }
}