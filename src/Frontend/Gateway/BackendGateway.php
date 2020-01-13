<?php


namespace App\Frontend\Gateway;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BackendGateway
{

    private HttpClientInterface $client;

    public function __construct()
    {

        $this->client = HttpClient::create([
            'base_uri' => 'http://selene.localhost/',
            'headers' => [
                'accept' => 'application/json'
            ]
        ]);
    }


    public function getUserByUsername(string $username): array
    {
        $response = $this->client->request('GET', 'api/user?username=' . $username);

        $content = $response->getContent();

        $jsonDecoded = json_decode($content, true);

        return $jsonDecoded[0];
    }

}