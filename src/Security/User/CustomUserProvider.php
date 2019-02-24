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
        // Query the database to get the encoded password and salt of the user and populate the password and salt
        // in the array below with this data.
        // The custom password encoder in App\Security\User\CustomPasswordEncoder is used to encode the raw submitted
        // password from the login form using the salt and compare it with this encoded value.
        $userData = array(
            'username' => 'admin',
            'password' => '21232f297a57a5a743894a0e4a801fc3',
            'salt' => '',
            'roles' => array('ROLE_ADMIN')
        );

        return new CustomUser($userData['username'], $userData['password'], $userData['salt'], $userData['roles']);

        //throw new UsernameNotFoundException(
        //    sprintf('Username "%s" does not exist.', $username)
        //);
    }
}
