<?php

namespace App\Backend\Consumer\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation as API;

/**
 * @API\ApiResource(shortName="Consumer-oauth2")
 * @ORM\Entity
 */
class ConsumerOAuth2
{

    /**
     * @ORM\Id
     * @ORM\Column
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Backend\Consumer\Entity\Consumer", inversedBy="oauth2")
     * @ORM\JoinColumn(name="fk_consumer_id", referencedColumnName="id")
     */
    private Consumer $consumer;

    /**
     * @ORM\Column
     */
    private bool $active;

    /**
     * @ORM\Column
     */
    private int $accessTokenTTL;

    /**
     * @ORM\Column
     */
    private string $clientId;

    /**
     * @ORM\Column
     */
    private string $clientSecret;

    /**
     * @ORM\Column
     */
    private ?string $redirectUri;


    public function getId(): int
    {
        return $this->id;
    }

    public function getConsumer(): Consumer
    {
        return $this->consumer;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getAccessTokenTTL(): int
    {
        return $this->accessTokenTTL;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

}
