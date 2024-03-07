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

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;

    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    public function getCreatedata(): string
    {
        return $this->createdata;
    }

    public function setCreatedata($createdata): void
    {
        $this->createdata = $createdata;
    }
}