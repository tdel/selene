<?php

namespace App\Backend\Consumer\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation as API;

/**
 * @API\ApiResource
 * @ORM\Entity
 */
class Consumer
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
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Backend\Consumer\Entity\ConsumerOAuth2", mappedBy="consumer")
     * @API\ApiSubresource()
     */
    private Collection $oauth2;

    public function __construct()
    {
        $this->oauth2 = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOAuth2(): Collection
    {
        return $this->oauth2;
    }

}
