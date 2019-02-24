<?php

namespace App\Security\User;

use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;

class CustomPasswordEncoder extends BasePasswordEncoder
{
    public function __construct()
    {
    }

    /**
     * Encodes the password submitted by the user, using the salt (md5 is just a simple example)
     * 
     * @param $raw The password submitted by the user
     * @param $salt The salt related to the user (extracted from a database)
     */
    public function encodePassword($raw, $salt)
    {
        return md5($raw);
    }

    /**
     * Compares the passwords
     * 
     * @param $raw The encoded password (extracted from a database)
     * @param $raw The password submitted by the user
     * @param $salt The salt related to the user (extracted from a database)
     */
    public function isPasswordValid($encoded, $raw, $salt)
    {
        return !$this->isPasswordTooLong($raw) && $this->comparePasswords($encoded, $this->encodePassword($raw, $salt));
    }
}