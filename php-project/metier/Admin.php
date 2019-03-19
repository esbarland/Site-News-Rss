<?php

class Admin
{
    private $login;
    private $role;

    public function __construct(string $login, string $role)
    {
        $this->role = $role;
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

}