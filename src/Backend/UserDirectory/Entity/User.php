<?php

namespace App\Backend\UserDirectory\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation as API;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @API\ApiResource
 * @ORM\Entity
 * @API\ApiFilter(SearchFilter::class, properties={"username": "partial"})
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\Column
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column
     */
    private string $username;

    /**
     * @ORM\Column
     */
    private string $email;

    /**
     * @ORM\Column
     */
    private ?string $password;


    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

}
