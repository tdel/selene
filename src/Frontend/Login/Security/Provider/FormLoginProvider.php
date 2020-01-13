<?php

namespace App\Frontend\Login\Security\Provider;

use App\Frontend\Gateway\BackendGateway;
use App\Frontend\Login\Security\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class FormLoginProvider implements UserProviderInterface
{
    private BackendGateway $backendGateway;
    private LoggerInterface $logger;

    public function __construct(BackendGateway $backendGateway, LoggerInterface $logger)
    {
        $this->backendGateway = $backendGateway;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function loadUserByUsername(string $username): ?UserInterface
    {
        try {
            $userInfos = $this->backendGateway->getUserByUsername($username);
            if (!isset($userInfos['password'])) {
                $this->logger->info("A user tried to login but without password.");

                return null;
            }
        } catch (\Exception $e) {
            $this->logger->error("An error occurred during request to API", [
                'error_message' => $e->getMessage()
            ]);

            return null;
        }

        $roles = ['ROLE_USER'];

        return new User($userInfos['username'], $userInfos['password'], $roles);
    }

    /**
     * @inheritDoc
     */
    public function refreshUser(UserInterface $user)
    {
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function supportsClass(string $class)
    {
        return get_class($class) === User::class;
    }
}
