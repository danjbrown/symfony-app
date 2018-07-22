<?php
namespace App\Security\User;

use App\Security\User\CustomUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class CustomUserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        return $this->fetchUser($username);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof CustomUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->fetchUser($user->getUsername());
    }

    public function supportsClass($class)
    {
        return CustomUser::class === $class;
    }

    private function fetchUser($username)
    {
        // Make a request to the custom user service here, retrieving the user's encrypted password and roles.
        // The password submitted by the user in the login form is encrypted by Symfony using the encoder type specified
        // in security.yml, and then checked internally by Symfony against the encrypted value returned by the service.
        // This example uses a plaintext password.

        // Data as returned by the user service; if no user exists returns false
        $userData = array('username' => 'admin', 'password' => 'admin', 'salt' => '', 'roles' => array('ROLE_ADMIN'));
        
        // if valid, the user is authenticated
        if ($userData) {
            return new CustomUser($userData['username'], $userData['password'], $userData['salt'], $userData['roles']);
        }

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }
}
