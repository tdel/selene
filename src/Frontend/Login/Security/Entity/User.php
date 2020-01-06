<?php


namespace App\Frontend\Login\Security\Entity;


use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

    private string $username;
    private string $password;
    private string $salt;
    private array $roles;

    public function __construct(string $username, string $password, string $salt, array $roles = [])
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
    }

    /** @inheritDoc */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /** @inheritDoc */
    public function getPassword(): string
    {
        return $this->password;
    }

    /** @inheritDoc */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /** @inheritDoc */
    public function getUsername(): string
    {
        return $this->username;
    }

    /** @inheritDoc */
    public function eraseCredentials(): bool
    {
        return false;
    }
}